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
            // Filtrar las salidas que coinciden con el mismo empleado y la misma fecha
            $salida = $salidas->firstWhere(function ($salida) use ($entrada) {
                return $salida->idEmpleado == $entrada->idEmpleado && $salida->created_at->isSameDay($entrada->created_at);
            });

            $asistencias[] = [
                'idAsistencia' => $entrada->id,
                'idEmpleado' => $entrada->idEmpleado,
                'empleadoNombre' => $entrada->empleado->nombre_apellido ?? 'No registrado',
                'horaEntrada' => $entrada->hora_entrada,
                'estadoEntrada' => $entrada->estado,
                'horaSalida' => $salida ? $salida->hora_salida : null,  // Use null instead of "No registrada"
                'estadoSalida' => $salida ? $salida->estado : null,      // Use null instead of "No registrada"
                'fechaEntrada' => $entrada->created_at->format('d/m/Y'),
                'fechaSalida' => $salida ? $salida->created_at->format('d/m/Y') : null, // Use null instead of "No registrada"
            ];
        }

        return view('asistencia.index', compact('asistencias', 'entradas', 'nombreEmpleado', 'fecha'));
    }

    // Método para generar el PDF// Método para generar el PDF
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
            $entradasQuery->whereDate('created_at', $fecha);
        }
    
        $entradas = $entradasQuery->get();
    
        // Obtener todas las salidas relacionadas con las entradas encontradas
        $salidas = AsistenciaSalida::with('empleado')->get();
    
        // Crear un arreglo para combinar las entradas y salidas correctamente por fecha
        $asistencias = [];
    
        foreach ($entradas as $entrada) {
            // Filtrar las salidas que coinciden con el mismo empleado y la misma fecha
            $salida = $salidas->filter(function ($salida) use ($entrada) {
                return $salida->idEmpleado == $entrada->idEmpleado && $salida->created_at->isSameDay($entrada->created_at);
            })->first(); // Obtener la primera salida de ese empleado y ese día
    
            $asistencias[] = [
                'idAsistencia' => $entrada->id,
                'idEmpleado' => $entrada->idEmpleado,
                'empleadoNombre' => $entrada->empleado->nombre_apellido ?? 'No registrado',
                'horaEntrada' => $entrada->hora_entrada,
                'estadoEntrada' => $entrada->estado,
                'horaSalida' => $salida ? $salida->hora_salida : null,  // Use null if no salida
                'estadoSalida' => $salida ? $salida->estado : null,      // Use null if no salida
                'fechaEntrada' => $entrada->created_at->format('d/m/Y'),
                'fechaSalida' => $salida ? $salida->created_at->format('d/m/Y') : null, // Use null if no salida
            ];
        }
    
        // Generar el PDF
        $pdf = Pdf::loadView('asistencia.reporte', ['asistencias' => $asistencias]);
    
        // Descargar el archivo
        return $pdf->download('reporte_asistencias.pdf');
    }
    

}


