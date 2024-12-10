<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaEntrada;
use Illuminate\Http\Request;
use App\Models\Empleado;

class AsistenciaEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        // Obtener la fecha actual
        $fechaHoy = now()->toDateString();
    
        // Verificar si ya existe una entrada registrada para el día de hoy
        $asistenciaHoy = AsistenciaEntrada::where('idEmpleado', $empleado_id)
            ->whereDate('hora_entrada', $fechaHoy)
            ->first();
    
        if ($asistenciaHoy) {
            // Ya se registró la entrada, mostrar mensaje de error
            return redirect()->route('empleadoUser.dashboard')
                ->with('error', 'Ya has registrado tu entrada para el día de hoy.');
        }
    
        // Obtener la hora actual
        $horaActual = now();
    
        // Determinar si es tardanza
        $estado = $horaActual->greaterThan($empleado->hora_entrada) ? 'Tardanza' : 'En hora';
    
        // Registrar la entrada con el estado correspondiente
        AsistenciaEntrada::create([
            'idEmpleado' => $empleado_id,  // Usamos el id recibido del formulario
            'hora_entrada' => $horaActual,
            'estado' => $estado,
        ]);
    
        // Notificación de éxito
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
}
