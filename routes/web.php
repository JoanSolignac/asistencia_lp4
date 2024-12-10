<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EmpleadoAuthController;
use App\Http\Controllers\Auth\EmpleadoSessionController;
use Illuminate\Support\Facades\Auth;


//Welcome
Route::get('/', function () {
    return view('welcome');
});
//Fin de Welcome


// Empleado Auth
Route::middleware(['auth:empleado'])->group(function () {
    // Ruta para el dashboard del empleado
    Route::get('/empleado/dashboard', function () {
        $empleadoUser = Auth::guard('empleado')->user(); // Usuario autenticado
        $empleado = $empleadoUser->empleado; // Relación con el modelo Empleado

        return view('empleadoUser.dashboard', compact('empleado')); // Pasa los datos del empleado a la vista
    })->name('empleadoUser.dashboard');
});


//Logear los empleado
Route::get('empleado/login', [EmpleadoSessionController::class, 'create'])->name('empleados.login');
Route::post('empleado/login', [EmpleadoSessionController::class, 'store']);
Route::post('empleado/logout', [EmpleadoSessionController::class, 'destroy'])->name('empleados.logout');
//Fin de logear los empleado


//Roles
Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('/', [RolController::class, 'index'])->name('index');  // Ruta para la lista de roles
    Route::get('create', [RolController::class, 'create'])->name('create');
    Route::post('store', [RolController::class, 'store'])->name('store');
    Route::get('{id}/edit', [RolController::class, 'edit'])->name('edit');
    Route::put('{id}', [RolController::class, 'update'])->name('update');
    Route::delete('{id}', [RolController::class, 'destroy'])->name('destroy');
});
//Fin de Roles


//Gestion de Empleados
Route::middleware('auth')->group(function () {
    // Mostrar la lista de empleados
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    
    // Mostrar formulario de agregar empleado
    Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

    // Guardar nuevo empleado
    Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

    // Mostrar el formulario de edición del empleado
    Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');

    // Actualizar los datos del empleado
    Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
    
    // Eliminar un empleado
    Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
});
//Fin de Gestion de Empleados


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
