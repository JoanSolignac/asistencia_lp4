<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Mostrar el formulario para agregar un rol
    public function create()
    {
        return view('roles.create');
    }

    // Almacenar un nuevo rol
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:roles,nombre',
            'descripcion' => 'required|string|max:500', // Validación de la descripción
        ]);

        // Crear el rol
        Rol::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'], // Almacenar descripción
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol agregado correctamente.');
    }

    // Listar roles
    public function index(Request $request)
    {
        $query = Rol::query();

        if ($request->has('role-search') && !empty($request->input('role-search'))) {
            $query->where('nombre', 'like', $request->input('role-search') . '%');
        }

        $roles = $query->paginate(10);
        return view('roles.index', compact('roles'));
    }


    // Mostrar el formulario para editar un rol
    public function edit($id)
    {
        $rol = Rol::findOrFail($id);  // Buscar el rol por su ID
        return view('roles.edit', compact('rol'));  // Pasar el rol a la vista
    }


    // Actualizar un rol
    // Actualizar un rol
public function update(Request $request, $id)
{
    // Validación de datos
    $validated = $request->validate([
        'nombre' => 'required|string|max:255|unique:roles,nombre,' . $id,
        'descripcion' => 'required|string|max:500',
    ]);

    // Buscar el rol por su ID y actualizar los campos
    $rol = Rol::findOrFail($id);
    $rol->update([
        'nombre' => $validated['nombre'],
        'descripcion' => $validated['descripcion'],
    ]);

    // Redirigir a la lista de roles con un mensaje de éxito
    return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
}


    // Eliminar un rol
    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);

        // Eliminar el rol
        $rol->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}
