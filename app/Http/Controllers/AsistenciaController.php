<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaEntrada;
use App\Models\AsistenciaSalida;
use Illuminate\Http\Request;


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

}


