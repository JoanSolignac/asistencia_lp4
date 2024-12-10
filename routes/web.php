<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('index', [RolController::class, 'index'])->name('index');
    Route::get('create', [RolController::class, 'create'])->name('create');
    Route::post('store', [RolController::class, 'store'])->name('store');
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Mostrar formulario de agregar empleado
    Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

    // Mostrar la lista de empleados
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    
    // Guardar nuevo empleado
    Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
