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
        $nombre = $request->input('nombre');
        $fecha = $request->input('fecha');

        
        // Consulta base con relaciones cargadas
        $query = AsistenciaEntrada::with('empleado');
    
        // Filtrar por nombre del empleado si está presente
        if ($nombre) {
            $query->whereHas('empleado', function ($q) use ($nombre) {
                $q->where('nombre_apellido', 'like','%' . $nombre . '%');
            });
        }
    
        // Filtrar por fecha si está presente utilizando 'created_at' para obtener la fecha de entrada
        if ($fecha) {
            $query->whereDate('created_at', $fecha);  // Aseguramos que se utilice 'created_at' para filtrar por la fecha completa
        }
    
        // Obtener resultados paginados de las entradas
        $entradas = $query->paginate(10);

    
        // Retornar la vista con las entradas, sin que se combinen las fechas de entrada
        return view('asistencia.entradas', compact('entradas'));
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
             ->whereDate('created_at', $fechaHoy)
             ->first();
     
         if ($asistenciaHoy) {
             return redirect()->route('empleadoUser.dashboard')
                 ->with([
                     'alert' => [
                         'type' => 'error',
                         'title' => 'Ya registrado',
                         'text' => 'Ya has registrado tu entrada para el día de hoy.',
                     ],
                 ]);
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
     
         // Mensaje de éxito con estado
         return redirect()->route('empleadoUser.dashboard')
             ->with([
                 'alert' => [
                     'type' => 'success',
                     'title' => '¡Asistencia Registrada!',
                     'text' => "Se ha registrado tu asistencia el día de hoy como: \"{$estado}\".",
                 ],
             ]);
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

    public function generarReporteEntrada(Request $request)
{
    // Capturar los parámetros de búsqueda (si los hay)
    $nombre = $request->input('nombre');
    $fecha = $request->input('fecha');

    // Consulta base con relaciones
    $query = AsistenciaEntrada::with('empleado');

    // Filtrar por nombre si se proporciona
    if ($nombre) {
        $query->whereHas('empleado', function ($q) use ($nombre) {
            $q->where('nombre_apellido', 'like', '%' . $nombre . '%');
        });
    }

    // Filtrar por fecha si se proporciona
    if ($fecha) {
        $query->whereDate('hora_entrada', $fecha);
    }

    // Obtener los resultados de la consulta
    $entradas = $query->get();

    // Generar el PDF a partir de la vista 'asistencia.reporteentrada'
    $pdf = Pdf::loadView('asistencia.reporteentrada', compact('entradas'));

    // Retornar el PDF como respuesta para descarga
    return $pdf->download('reporte_entradas.pdf');
}


}
