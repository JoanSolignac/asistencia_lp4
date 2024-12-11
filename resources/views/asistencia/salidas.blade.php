<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Registro de Salidas de los Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">

                    <!-- Estilo personalizado para el botón -->
                    <style>
                        .btn-primary {
                            background-color: #007bff;
                            border-color: #007bff;
                            color: white;
                        }

                        .btn-primary:hover {
                            background-color: #0056b3;
                            border-color: #0056b3;
                            color: white;
                        }
                    </style>

                    <!-- Formulario de búsqueda y botones en la misma línea -->
                    <div class="d-flex justify-content-between mb-4 w-100">
                        <!-- Formulario de búsqueda -->
                        <form method="GET" action="{{ route('asistencia.salidas') }}" class="d-flex w-100">
                            <div class="form-group mx-2" style="flex: 1; max-width: 75%;">
                                <input type="text" name="nombre" value="{{ request('nombre') }}" 
                                    class="form-control form-control-lg rounded-3 border-secondary bg-light text-black shadow-sm w-100"
                                    placeholder="Buscar por nombre del empleado...">
                            </div>
                            <div class="form-group mx-2" style="flex: 1; max-width: 20%;">
                                <input type="date" name="fecha" value="{{ request('fecha') }}" 
                                    class="form-control form-control-lg rounded-3 border-secondary bg-light text-black shadow-sm w-100"
                                    placeholder="Buscar por fecha...">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm mx-2">
                                {{ __('Buscar') }}
                            </button>
                        </form>

                        <!-- Botón de reporte -->
                        <a href="#" 
                           id="reportePDF" 
                           class="btn btn-danger btn-sm shadow-sm mx-2">
                            {{ __('Reporte PDF') }}
                        </a>

                    </div>

                    <!-- Tabla de salidas -->
                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>{{ __('ID Salida') }}</th>
                                <th>{{ __('Empleado') }}</th>
                                <th>{{ __('Hora de Salida') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>{{ __('Fecha de Salida') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salidas as $salida)
                                <tr class="text-center">
                                    <td>{{ $salida->id }}</td>
                                    <td>{{ $salida->empleado->nombre_apellido }}</td>
                                    <td>{{ $salida->hora_salida->format('H:i:s') }}</td>
                                    <td>{{ $salida->estado }}</td>
                                    <td class="text-center">{{ $salida->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        {{ __('No hay registros de salida disponibles.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación centrada -->
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $salidas->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert y script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert para el botón de Reporte PDF
        document.getElementById('reportePDF').addEventListener('click', function(event) {
            event.preventDefault(); // Evita la redirección inmediata

            Swal.fire({
                title: '¡Reporte de Salida Generado!',
                text: 'El reporte PDF se está generando. Descargando ahora...',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir al enlace del reporte
                    window.location.href = "{{ route('asistencia.reportesalida', ['nombre' => request('nombre'), 'fecha' => request('fecha')]) }}";
                }
            });
        });
    </script>
</x-app-layout>