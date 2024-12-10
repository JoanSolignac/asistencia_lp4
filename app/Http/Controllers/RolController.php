<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Mostrar el formulario de agregar rol
    public function create()
    {
        return view('roles.create');
    }

    // Almacenar el rol
    public function store(Request $request)
    {
        // Validación del rol
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:roles,nombre',
            'descripcion' => 'required|string|max:500',  // Validación para la descripción
        ]);

        // Crear el nuevo rol con descripción
        Rol::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'], // Almacenando la descripción
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol agregado correctamente.');
    }

    // Listar todos los roles
    public function index()
{
    // Obtener los roles paginados (10 por página)
    $roles = Rol::paginate(10);

    // Retornar la vista con los roles paginados
    return view('roles.index', compact('roles'));
}

}
