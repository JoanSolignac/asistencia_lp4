<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 text-center text-black dark:text-white font-weight-bold">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-lg">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <!-- Formulario para editar un empleado -->
                    <form method="POST" action="{{ route('empleados.update', $empleado->id) }}" >
                        @csrf
                        @method('PUT') <!-- Utilizamos PUT para la actualización -->
                        
                        <!-- Nombre y Apellido -->
                        <div class="mb-3">
                            <label for="nombre_apellido" class="form-label text-dark">{{ __('Nombre y Apellido') }}</label>
                            <input type="text" id="nombre_apellido" name="nombre_apellido" value="{{ old('nombre_apellido', $empleado->nombre_apellido) }}" class="form-control" required>
                        </div>

                        <!-- DNI -->
                        <div class="mb-3">
                            <label for="dni" class="form-label text-dark">{{ __('DNI') }}</label>
                            <input type="text" id="dni" name="dni" value="{{ old('dni', $empleado->dni) }}" class="form-control" required>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label text-dark">{{ __('Fecha de Nacimiento') }}</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}" class="form-control" required>
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3">
                            <label for="telefono" class="form-label text-dark">{{ __('Teléfono') }}</label>
                            <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $empleado->telefono) }}" class="form-control" required>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-3">
                            <label for="direccion" class="form-label text-dark">{{ __('Dirección') }}</label>
                            <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $empleado->direccion) }}" class="form-control" required>
                        </div>

                        <!-- Rol -->
                        <div class="mb-3">
                            <label for="idRol" class="form-label text-dark">{{ __('Rol') }}</label>
                            <select name="idRol" id="idRol" class="form-select" required>
                                @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('idRol', $empleado->idRol) == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label for="estado" class="form-label text-dark">{{ __('Estado') }}</label>
                            <input type="text" id="estado" name="estado" value="{{ old('estado', $empleado->estado) }}" class="form-control" required>
                        </div>

                        <!-- Hora de Entrada -->
                        <div class="mb-3">
                            <label for="hora_entrada" class="form-label text-dark">{{ __('Hora de Entrada') }}</label>
                            <input type="time" id="hora_entrada" name="hora_entrada" value="{{ old('hora_entrada', $empleado->hora_entrada) }}" class="form-control" required>
                        </div>

                        <!-- Hora de Salida -->
                        <div class="mb-3">
                            <label for="hora_salida" class="form-label text-dark">{{ __('Hora de Salida') }}</label>
                            <input type="time" id="hora_salida" name="hora_salida" value="{{ old('hora_salida', $empleado->hora_salida) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                {{ __('Actualizar Empleado') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
