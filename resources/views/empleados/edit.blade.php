<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Formulario para editar un empleado -->
                    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Utilizamos PUT para la actualización -->
                        
                        <!-- Nombre y Apellido -->
                        <div class="mb-4">
                            <label for="nombre_apellido" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre y Apellido</label>
                            <input type="text" id="nombre_apellido" name="nombre_apellido" value="{{ old('nombre_apellido', $empleado->nombre_apellido) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- DNI -->
                        <div class="mb-4">
                            <label for="dni" class="block text-sm font-medium text-gray-700 dark:text-gray-200">DNI</label>
                            <input type="text" id="dni" name="dni" value="{{ old('dni', $empleado->dni) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-4">
                            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de Nacimiento</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-4">
                            <label for="telefono" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $empleado->telefono) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-4">
                            <label for="direccion" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Dirección</label>
                            <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $empleado->direccion) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- Rol -->
                        <div class="mb-4">
                            <label for="idRol" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rol</label>
                            <select name="idRol" id="idRol" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                                @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('idRol', $empleado->idRol) == $rol->id ? 'selected' : '' }}>{{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Estado</label>
                            <input type="text" id="estado" name="estado" value="{{ old('estado', $empleado->estado) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- Hora de Entrada -->
                        <div class="mb-4">
                            <label for="hora_entrada" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hora de Entrada</label>
                            <input type="time" id="hora_entrada" name="hora_entrada" value="{{ old('hora_entrada', $empleado->hora_entrada) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <!-- Hora de Salida -->
                        <div class="mb-4">
                            <label for="hora_salida" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hora de Salida</label>
                            <input type="time" id="hora_salida" name="hora_salida" value="{{ old('hora_salida', $empleado->hora_salida) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200" required>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none">
                                Actualizar Empleado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
