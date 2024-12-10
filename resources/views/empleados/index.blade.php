<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Tabla para mostrar los empleados -->
                    <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">DNI</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Hora de Entrada</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Hora de Salida</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Rol</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr class="border-b border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $empleado->nombre_apellido }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $empleado->dni }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $empleado->hora_entrada }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $empleado->hora_salida }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $empleado->rol->nombre }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-200">{{ $empleado->estado }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex space-x-4">
                                            <!-- Botón Editar -->
                                            <!-- Enlace para editar un empleado -->
                                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">Editar</a>


                                            <!-- Formulario para eliminar un empleado -->
                                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-6">
                        {{ $empleados->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>