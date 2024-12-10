<!-- En resources/views/empleadoUser/dashboard.blade.php -->
<x-app-empleado-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
                {{ __('Dashboard del Empleado') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container-lg">
            <!-- Card Section -->
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body text-dark">
                    <!-- Success Alert -->
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">
                            {{ __("Bienvenido, :name!", ['name' => $empleado->nombre_apellido]) }}
                        </h4>
                        <p class="mb-0">
                            {{ __("Este es tu espacio de trabajo en el sistema de empleados.") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-empleado-layout>
