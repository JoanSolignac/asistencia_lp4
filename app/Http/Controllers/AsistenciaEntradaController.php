<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaEntrada;
use App\Models\AsistenciaSalida;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;

class AsistenciaEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener filtros de búsqueda
        $nombreEmpleado = $request->input('nombre');
        $fecha = $request->input('fecha');

        // Consulta base con relaciones cargadas
        $query = AsistenciaEntrada::with('empleado');

        // Filtrar por nombre del empleado si está presente
        if (!empty($nombreEmpleado)) {
            $query->whereHas('empleado', function ($q) use ($nombreEmpleado) {
                $q->where('nombre_apellido', 'like', "%$nombreEmpleado%");
            });
        }

        // Filtrar por fecha si está presente
        if (!empty($fecha)) {
            $query->whereDate('hora_entrada', $fecha);
        }

        // Obtener resultados paginados
        $entradas = $query->paginate(10);

        // Retornar la vista con las entradas
        return view('asistencia.entradas', compact('entradas', 'nombreEmpleado', 'fecha'));
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
        // Validar el formulario
        $validated = $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        $empleado_id = $validated['empleado_id'];
        $empleado = Empleado::findOrFail($empleado_id);
        $fechaHoy = now()->toDateString();

        // Verificar si ya existe una entrada para el día
        $asistenciaHoy = AsistenciaEntrada::where('idEmpleado', $empleado_id)
            ->whereDate('hora_entrada', $fechaHoy)
            ->first();

        if ($asistenciaHoy) {
            return redirect()->route('empleadoUser.dashboard')
                ->with('error', 'Ya has registrado tu entrada para el día de hoy.');
        }

        // Determinar el estado (Tardanza o En hora)
        $horaActual = now();
        $estado = $horaActual->greaterThan($empleado->hora_entrada) ? 'Tardanza' : 'En hora';

        // Registrar la entrada
        AsistenciaEntrada::create([
            'idEmpleado' => $empleado_id,
            'hora_entrada' => $horaActual,
            'estado' => $estado,
        ]);

        return redirect()->route('empleadoUser.dashboard')
            ->with('success', 'Entrada registrada correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(AsistenciaEntrada $asistenciaEntrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsistenciaEntrada $asistenciaEntrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsistenciaEntrada $asistenciaEntrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsistenciaEntrada $asistenciaEntrada)
    {
        //
    }



    
    // Método para generar el reporte PDF
    public function generarReporteEntrada(Request $request)
{
    // Filtrar por nombre y fecha
    $nombreEmpleado = $request->input('nombre');
    $fecha = $request->input('fecha');
    
    // Consultar las entradas de asistencia
    $entradasQuery = AsistenciaEntrada::query()->with('empleado');

    if ($nombreEmpleado) {
        $entradasQuery->whereHas('empleado', function ($q) use ($nombreEmpleado) {
            $q->where('nombre_apellido', 'like', '%' . $nombreEmpleado . '%');
        });
    }

    if ($fecha) {
        $entradasQuery->whereDate('hora_entrada', $fecha);
    }

    $entradas = $entradasQuery->get();

    // Consultar las salidas de asistencia (si es necesario para incluir en el reporte)
    $salidasQuery = AsistenciaSalida::query()->with('empleado');
    
    if ($nombreEmpleado) {
        $salidasQuery->whereHas('empleado', function ($q) use ($nombreEmpleado) {
            $q->where('nombre_apellido', 'like', '%' . $nombreEmpleado . '%');
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
            'idEntrada' => $entrada->id,
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
    $pdf = Pdf::loadView('asistencia.reporteentrada', ['asistencias' => $asistencias]);

    // Descargar el archivo
    return $pdf->download('reporte_entradas.pdf');
}

}
