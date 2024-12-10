<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="nombre_apellido" class="text-sm font-medium text-gray-700 dark:text-gray-200">Nombre y Apellido</label>
                                    <input type="text" name="nombre_apellido" id="nombre_apellido" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                </div>
                                <div class="form-group">
                                    <label for="dni" class="text-sm font-medium text-gray-700 dark:text-gray-200">DNI</label>
                                    <input type="text" name="dni" id="dni" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento" class="text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                            </div>

                                <div class="form-group">
                                    <label for="telefono" class="text-sm font-medium text-gray-700 dark:text-gray-200">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="correo" class="text-sm font-medium text-gray-700 dark:text-gray-200">Correo</label>
                                <input type="email" name="correo" id="correo" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="direccion" class="text-sm font-medium text-gray-700 dark:text-gray-200">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                </div>
                                <div class="form-group">
                                    <label for="idRol" class="text-sm font-medium text-gray-700 dark:text-gray-200">Rol</label>
                                    <select name="idRol" id="idRol" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                        @foreach($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="estado" class="text-sm font-medium text-gray-700 dark:text-gray-200">Estado</label>
                                    <select name="estado" id="estado" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hora_entrada" class="text-sm font-medium text-gray-700 dark:text-gray-200">Hora de Entrada</label>
                                    <input type="time" name="hora_entrada" id="hora_entrada" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hora_salida" class="text-sm font-medium text-gray-700 dark:text-gray-200">Hora de Salida</label>
                                <input type="time" name="hora_salida" id="hora_salida" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Agregar Empleado
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
