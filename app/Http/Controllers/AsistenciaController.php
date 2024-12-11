<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaEntrada;
use App\Models\AsistenciaSalida;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AsistenciaController extends Controller
{
    /**
     * Display the combined list of AsistenciaEntrada and AsistenciaSalida.
     */
    public function index(Request $request)
    {
        $nombreEmpleado = $request->input('nombre');
        $fecha = $request->input('fecha');

        // Consultar las entradas, filtrando por nombre y fecha si se proporcionan
        $entradasQuery = AsistenciaEntrada::with('empleado');

        if ($nombreEmpleado) {
            $entradasQuery->whereHas('empleado', function ($query) use ($nombreEmpleado) {
                $query->where('nombre_apellido', 'LIKE', "%{$nombreEmpleado}%");
            });
        }

        if ($fecha) {
            $entradasQuery->whereDate('created_at', $fecha);
        }

        $entradas = $entradasQuery->paginate(10);

        // Obtener todas las salidas relacionadas con las entradas encontradas
        $salidas = AsistenciaSalida::with('empleado')->get();

        // Crear un arreglo para combinar las entradas y salidas
        $asistencias = [];
        foreach ($entradas as $entrada) {
            $salida = $salidas->firstWhere('idEmpleado', $entrada->idEmpleado);
            $asistencias[] = [
                'idAsistencia' => $entrada->id,
                'idEmpleado' => $entrada->idEmpleado,
                'empleadoNombre' => $entrada->empleado->nombre_apellido ?? 'No registrado',
                'horaEntrada' => $entrada->hora_entrada,
                'estadoEntrada' => $entrada->estado,
                'horaSalida' => $salida ? $salida->hora_salida : 'No registrada',
                'estadoSalida' => $salida ? $salida->estado : 'No registrada',
                'fechaEntrada' => $entrada->created_at->format('d/m/Y'),
                'fechaSalida' => $salida ? $salida->created_at->format('d/m/Y') : 'No registrada',
            ];
        }

        return view('asistencia.index', compact('asistencias', 'entradas', 'nombreEmpleado', 'fecha'));
    }

    // Método para generar el PDF
    public function generarReporte(Request $request)
    {
        // Filtrar por nombre y fecha
        $nombre = $request->input('nombre');
        $fecha = $request->input('fecha');

        // Consultar las entradas de asistencia
        $entradasQuery = AsistenciaEntrada::query()->with('empleado');
        
        if ($nombre) {
            $entradasQuery->whereHas('empleado', function ($q) use ($nombre) {
                $q->where('nombre_apellido', 'like', '%' . $nombre . '%');
            });
        }

        if ($fecha) {
            $entradasQuery->whereDate('hora_entrada', $fecha);
        }

        $entradas = $entradasQuery->get();

        // Consultar las salidas de asistencia
        $salidasQuery = AsistenciaSalida::query()->with('empleado');
        
        if ($nombre) {
            $salidasQuery->whereHas('empleado', function ($q) use ($nombre) {
                $q->where('nombre_apellido', 'like', '%' . $nombre . '%');
            });
        }

        if ($fecha) {
            $salidasQuery->whereDate('hora_salida', $fecha);
        }

        $salidas = $salidasQuery->get();

        // Combinar las entradas y salidas por empleado
        $asistencias = $entradas->map(function ($entrada) use ($salidas) {
            $salida = $salidas->firstWhere('idEmpleado', $entrada->idEmpleado);
            return [
                'idAsistencia' => $entrada->id,
                'empleadoNombre' => $entrada->empleado->nombre_apellido,
                'horaEntrada' => $entrada->hora_entrada,
                'estadoEntrada' => $entrada->estado,
                'fechaEntrada' => $entrada->hora_entrada->format('Y-m-d'),
                'horaSalida' => $salida ? $salida->hora_salida : null,
                'estadoSalida' => $salida ? $salida->estado : null,
                'fechaSalida' => $salida ? $salida->hora_salida->format('Y-m-d') : null
            ];
        });

        // Generar el PDF
        $pdf = Pdf::loadView('asistencia.reporte', ['asistencias' => $asistencias]);

        // Descargar el archivo
        return $pdf->download('reporte_asistencias.pdf');
    }



}


