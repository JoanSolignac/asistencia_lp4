<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Rol;
use App\Models\EmpleadoUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    // Mostrar el formulario para agregar empleado
    public function create()
    {
        // Obtener los roles disponibles para asignar al empleado
        $roles = Rol::all();
        return view('empleados.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:empleados',
            'fecha_nacimiento' => 'required|date', // Aseguramos que sea una fecha válida
            'telefono' => 'required|string|max:30|unique:empleados',
            'direccion' => 'required|string|max:255',
            'idRol' => 'required|exists:roles,id',
            'estado' => 'required|string|max:50',
            'hora_entrada' => 'required|date_format:H:i', // Aseguramos formato de hora
            'hora_salida' => 'required|date_format:H:i',
            'correo' => 'required|email|max:255|unique:empleados_users,correo,' . ($empleado->empleadoUser->id ?? 'null'),
        ]);
    
        // Parsear la fecha de nacimiento al formato Y-m-d
        $fechaNacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d');
    
        // Parsear las horas de entrada y salida al formato H:i:s
        $horaEntrada = Carbon::parse($request->hora_entrada)->format('H:i:s');
        $horaSalida = Carbon::parse($request->hora_salida)->format('H:i:s');
    
        // Crear el empleado
        $empleado = Empleado::create([
            'nombre_apellido' => $request->nombre_apellido,
            'dni' => $request->dni,
            'fecha_nacimiento' => $fechaNacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'idRol' => $request->idRol,
            'estado' => $request->estado,
            'hora_entrada' => $horaEntrada,
            'hora_salida' => $horaSalida,
        ]);
    
            // Crear el usuario relacionado
        EmpleadoUser::create([
            'idEmpleado' => $empleado->id,
            'correo' => $request->correo,
            'password' => bcrypt($request->dni), // Contraseña hasheada
        ]);


            // Mostrar notificación antes de redirigir
        notify()->success('Empleado agregado correctamente');

        // Redirigir con mensaje de éxito
        return redirect()->route('empleados.index');
    }
    
    // Mostrar la lista de empleados
    public function index()
    {
        $empleados = Empleado::paginate(10); // Paginamos los resultados
        return view('empleados.index', compact('empleados'));
    }

    // Mostrar el formulario para editar un empleado
    public function edit(Empleado $empleado)
    {
        $roles = Rol::all();

        // Asegúrate de que las horas estén en formato H:i (sin segundos)
        $empleado->hora_entrada = Carbon::parse($empleado->hora_entrada)->format('H:i');
        $empleado->hora_salida = Carbon::parse($empleado->hora_salida)->format('H:i');
        
        return view('empleados.edit', compact('empleado', 'roles'));
    }

    // Actualizar la información de un empleado

    public function update(Request $request, Empleado $empleado)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre_apellido' => 'required|string|max:255',
            'dni' => 'required|digits:8',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|digits_between:6,15',
            'direccion' => 'required|string|max:255',
            'idRol' => 'required|exists:roles,id',
            'estado' => 'required|string',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida' => 'required|date_format:H:i',
        ]);

        // Parsear las fechas y horas a los formatos correctos
        $validated['fecha_nacimiento'] = Carbon::parse($validated['fecha_nacimiento'])->format('Y-m-d');
        $validated['hora_entrada'] = Carbon::parse($validated['hora_entrada'])->format('H:i:s');
        $validated['hora_salida'] = Carbon::parse($validated['hora_salida'])->format('H:i:s');

        // Actualizar el empleado
        $empleado->update($validated);

        // Redirigir con mensaje de éxito
        session()->flash('success', 'Empleado actualizado exitosamente.');

        return redirect()->route('empleados.index');
    }


    // Eliminar un empleado
    public function destroy(Empleado $empleado)
    {
        // Eliminar el usuario relacionado
        $empleadoUser = EmpleadoUser::where('idEmpleado', $empleado->id)->first();
        if ($empleadoUser) {
            $empleadoUser->delete();
        }

        // Eliminar el empleado
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }

}