<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaSalida;
use Illuminate\Http\Request;
use App\Models\Empleado;

class AsistenciaSalidaController extends Controller
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
            'idEmpleado' => $empleado_id,  // Usamos el id recibido del formulario
            'hora_salida' => $horaActual,
            'estado' => $estado,
        ]);

        // Retornar un mensaje descriptivo según el estado
        $mensaje = $estado === 'Después de la hora' 
            ? 'Salida registrada: Después de la hora.' 
            : 'Salida registrada: Antes de la hora.';

        return redirect()->route('empleadoUser.dashboard')->with('success', $mensaje);
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
}
