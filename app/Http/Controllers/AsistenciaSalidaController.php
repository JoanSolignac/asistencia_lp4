<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaSalida;
use App\Models\AsistenciaEntrada;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;

class AsistenciaSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Capturar los parámetros de búsqueda
        $nombre = $request->input('nombre');
        $fecha = $request->input('fecha');

        // Consulta base con relaciones
        $query = AsistenciaSalida::with('empleado');

        // Filtrar por nombre si se proporciona
        if ($nombre) {
            $query->whereHas('empleado', function ($q) use ($nombre) {
                $q->where('nombre_apellido', 'like', '%' . $nombre . '%');
            });
        }

        // Filtrar por fecha si se proporciona
        if ($fecha) {
            $query->whereDate('created_at', $fecha);
        }

        // Obtener las salidas paginadas con los filtros aplicados
        $salidas = $query->paginate(10);

        // Retornar la vista con las salidas filtradas
        return view('asistencia.salidas', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener el id del empleado desde el formulario
        $empleado_id = $request->input('empleado_id');
    
        // Buscar los datos del empleado
        $empleado = Empleado::findOrFail($empleado_id);
    
        // Obtener la fecha de hoy
        $fechaHoy = now()->toDateString(); // Solo la fecha sin hora
    
        // Verificar si ya existe una salida registrada para el empleado el día de hoy
        $salidaHoy = AsistenciaSalida::where('idEmpleado', $empleado_id)
            ->whereDate('created_at', $fechaHoy) // Comparar solo la fecha
            ->first();
    
        // Si ya existe una salida para el día de hoy
        if ($salidaHoy) {
            return redirect()->route('empleadoUser.dashboard')
                ->with([
                    'alert' => [
                        'type' => 'error',
                        'title' => 'Ya registrada',
                        'text' => 'Ya has registrado tu salida para el día de hoy.',
                    ],
                ]);
        }
    
        // Verificar si ya existe una entrada registrada para el empleado el día de hoy
        $entradaHoy = AsistenciaEntrada::where('idEmpleado', $empleado_id)
            ->whereDate('created_at', $fechaHoy) // Comparar solo la fecha
            ->first();
    
        // Si no existe entrada para el día de hoy, no permitir registrar la salida
        if (!$entradaHoy) {
            return redirect()->route('empleadoUser.dashboard')
                ->with([
                    'alert' => [
                        'type' => 'error',
                        'title' => 'Error',
                        'text' => 'No se puede registrar la salida porque no se ha registrado una entrada hoy.',
                    ],
                ]);
        }
    
        // Obtener la hora actual
        $horaActual = now();
    
        // Determinar si la salida fue antes o después de la hora de salida esperada
        if ($horaActual->greaterThan($empleado->hora_salida)) {
            $estado = 'Después de la hora';
        } else {
            $estado = 'Antes de la hora';
        }
    
        // Registrar la salida con el estado correspondiente
        AsistenciaSalida::create([
            'idEmpleado' => $empleado_id,
            'hora_salida' => $horaActual,
            'estado' => $estado,
        ]);
    
        // Mensaje de éxito con estado
        return redirect()->route('empleadoUser.dashboard')
            ->with([
                'alert' => [
                    'type' => 'success',
                    'title' => '¡Salida Registrada!',
                    'text' => "Se ha registrado tu salida del día de hoy como: \"{$estado}\".",
                ],
            ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(AsistenciaSalida $asistenciaSalida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsistenciaSalida $asistenciaSalida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsistenciaSalida $asistenciaSalida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsistenciaSalida $asistenciaSalida)
    {
        //
    }

    public function generarReporteSalida(Request $request)
    {
        // Capturar los parámetros de búsqueda (si los hay)
        $nombre = $request->input('nombre');
        $fecha = $request->input('fecha');

        // Consulta base con relaciones
        $query = AsistenciaSalida::with('empleado');

        // Filtrar por nombre si se proporciona
        if ($nombre) {
            $query->whereHas('empleado', function ($q) use ($nombre) {
                $q->where('nombre_apellido', 'like', '%' . $nombre . '%');
            });
        }

        // Filtrar por fecha si se proporciona
        if ($fecha) {
            $query->whereDate('hora_salida', $fecha);
        }

        // Obtener los resultados de la consulta
        $salidas = $query->get();

        // Generar el PDF a partir de la vista 'reportesalida'
        $pdf = Pdf::loadView('asistencia.reportesalida', compact('salidas'));

        // Retornar el PDF como respuesta para descarga
        return $pdf->download('reporte_salidas.pdf');
    }
}
