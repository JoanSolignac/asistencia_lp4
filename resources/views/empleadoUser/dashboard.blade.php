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

             <!-- Hora Actual -->
             <div class="text-center mt-4">
                <div class="alert alert-info" role="alert">
                    <strong>{{ __('Hora actual:') }}</strong>
                    <span id="current-time"></span>
                </div>
            </div>

            <!-- Card Section -->
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body text-dark">
                    <!-- Welcome Section -->
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">
                            {{ __("Bienvenido, :name!", ['name' => $empleado->nombre_apellido]) }}
                        </h4>
                        <p class="mb-0">
                            {{ __("Este es tu espacio de trabajo en el sistema de empleados.") }}
                        </p>
                    </div>

                   

                    <!-- Asistencia Buttons -->
                    <div class="text-center mt-4">
                        <div class="btn-group" role="group" aria-label="Asistencia Buttons">
                            <!-- Registrar Entrada -->
                            <form method="POST" action="{{ route('empleadoUser.registrarEntrada') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="empleado_id" value="{{ $empleado->id }}">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-door-open"></i> {{ __('Registrar Entrada') }}
                                </button>
                            </form>
                            <!-- Registrar Salida -->
                            <form method="POST" action="{{ route('empleadoUser.registrarSalida') }}" class="d-inline ms-2">
                                @csrf
                                <input type="hidden" name="empleado_id" value="{{ $empleado->id }}">
                                <button type="submit" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-door-closed"></i> {{ __('Registrar Salida') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para actualizar la hora -->
    <script>
        function updateTime() {
            const currentTimeElement = document.getElementById('current-time');
            const now = new Date();
            const formattedTime = now.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false });
            currentTimeElement.textContent = formattedTime;
        }

        // Actualizar la hora cada segundo
        setInterval(updateTime, 1000);

        // Inicializar la hora al cargar la página
        updateTime();
    </script>
</x-app-empleado-layout>
