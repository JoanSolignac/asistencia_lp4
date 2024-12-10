<!-- En resources/views/empleadoUser/dashboard.blade.php -->
<x-app-empleado-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard del Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">
                        {{ __('Bienvenido, :name!', ['name' => $empleado->nombre_apellido]) }}
                    </h3>
                    <p>{{ __('Este es tu espacio de trabajo en el sistema de empleados.') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-empleado-layout>
