<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Lista de Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <!-- Tabla para mostrar los empleados -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">{{ __('Nombre') }}</th>
                                <th class="text-center">{{ __('DNI') }}</th>
                                <th class="text-center">{{ __('Hora de Entrada') }}</th>
                                <th class="text-center">{{ __('Hora de Salida') }}</th>
                                <th class="text-center">{{ __('Rol') }}</th>
                                <th class="text-center">{{ __('Estado') }}</th>
                                <th class="text-center">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td class="text-center">{{ $empleado->nombre_apellido }}</td>
                                    <td class="text-center">{{ $empleado->dni }}</td>
                                    <td class="text-center">{{ $empleado->hora_entrada }}</td>
                                    <td class="text-center">{{ $empleado->hora_salida }}</td>
                                    <td class="text-center">{{ $empleado->rol->nombre }}</td>
                                    <td class="text-center">{{ $empleado->estado }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <style>
                                                .btn-danger {
                                                    background-color: #dc3545; /* Color rojo de inicio */
                                                    border-color: #dc3545; /* Borde rojo de inicio */
                                                    color: white; /* Texto blanco */
                                                }

                                                .btn-danger:hover {
                                                    background-color: #c82333; /* Rojo más intenso al pasar el mouse */
                                                    border-color: #bd2130; /* Borde rojo más oscuro */
                                                    color: white; /* Texto blanco */
                                                }
                                            </style>
                                            <!-- Botón Editar -->
                                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary btn-sm mx-1">
                                                {{ __('Editar') }}
                                            </a>
                                            <!-- Formulario para eliminar un empleado -->
                                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline-block delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $empleado->id }}">
                                                    {{ __('Eliminar') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación centrada -->
                    <div class="mt-4 text-center">
                        {{ $empleados->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert y script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const form = this.closest('.delete-form');
                    const empleadoId = this.getAttribute('data-id');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: `Esto eliminará al empleado con ID ${empleadoId}. ¡Esta acción no se puede deshacer!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
