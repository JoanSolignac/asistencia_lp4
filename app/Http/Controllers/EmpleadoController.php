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
            'correo' => 'required|email|max:255|unique:empleados_users,correo',
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
    
        // Crear el usuario relacionado, asegurándose de pasar 'idEmpleado'
        EmpleadoUser::create([
            'idEmpleado' => $empleado->id, // Aquí se pasa el id del empleado
            'correo' => $request->correo,
            'password' => bcrypt($request->dni), // Se utiliza bcrypt para cifrar la contraseña
        ]);
    
        //Por ahora que me mande a Inicio
        return redirect()->route('dashboard')->with('success', 'Empleado agregado correctamente');
    }
    
    // Mostrar la lista de empleados
    public function index()
    {
        $empleados = Empleado::paginate(10); // Paginamos los resultados
        return view('empleados.index', compact('empleados'));
    }

    // Mostrar el formulario para editar un empleado
    public function edit($id)
    {
        // Obtener el empleado por su ID
        $empleado = Empleado::findOrFail($id);
        
        // Obtener todos los roles disponibles para asignar al empleado
        $roles = Rol::all();
        
        return view('empleados.edit', compact('empleado', 'roles'));
    }

    // Actualizar la información de un empleado
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:empleados,dni,' . $id,
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:30|unique:empleados,telefono,' . $id,
            'direccion' => 'required|string|max:255',
            'idRol' => 'required|exists:roles,id',
            'estado' => 'required|string|max:50',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida' => 'required|date_format:H:i',
            'correo' => 'required|email|max:255|unique:empleados_users,correo,' . $id,
        ]);

        // Obtener el empleado a editar
        $empleado = Empleado::findOrFail($id);

        // Parsear la fecha de nacimiento y las horas
        $fechaNacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d');
        $horaEntrada = Carbon::parse($request->hora_entrada)->format('H:i:s');
        $horaSalida = Carbon::parse($request->hora_salida)->format('H:i:s');

        // Actualizar la información del empleado
        $empleado->update([
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

        

        // Si es necesario, también actualizar el usuario relacionado
        $empleadoUser = EmpleadoUser::where('idEmpleado', $id)->first();
        if ($empleadoUser) {
            $empleadoUser->update([
                'correo' => $request->correo,
                'password' => bcrypt($request->dni), // Actualizar la contraseña si es necesario
            ]);
        }

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    

    // Eliminar un empleado
    public function destroy($id)
    {
        // Obtener el empleado a eliminar
        $empleado = Empleado::findOrFail($id);

        // Eliminar el empleado
        $empleado->delete();

        // Eliminar el usuario relacionado
        $empleadoUser = EmpleadoUser::where('idEmpleado', $id)->first();
        if ($empleadoUser) {
            $empleadoUser->delete();
        }

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }

    


}