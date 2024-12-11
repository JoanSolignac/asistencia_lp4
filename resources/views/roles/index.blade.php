<x-app-layout>
    <x-slot name="header">
        <h1 class="display-5 text-center text-black bg-light">
            {{ __('Listado de Roles') }}
        </h1>
    </x-slot>

    <div class="py-12 bg-light dark:bg-gray-900">
        <div class="container-fluid">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <!-- Estilo personalizado para los botones -->
                    <style>
                        .btn-danger {
                            background-color: #dc3545;
                            border-color: #dc3545;
                            color: white;
                        }

                        .btn-danger:hover {
                            background-color: #c82333;
                            border-color: #bd2130;
                            color: white;
                        }

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

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('roles.index') }}" class="mb-6 d-flex justify-content-center align-items-center w-75 mx-auto">
                        <div class="flex-grow mx-2 w-50">
                            <input type="text" name="role-search" id="role-search" value="{{ request('role-search') }}" 
                                class="form-control form-control-lg rounded-3 border-secondary bg-light text-black shadow-sm" 
                                placeholder="Escribe un nombre de rol para buscar...">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm hover:shadow-lg transition duration-200 transform hover:scale-105 mx-2">
                            {{ __('Buscar') }}
                        </button>
                    </form>

                    <!-- Tabla para mostrar los roles -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center text-black">{{ __('ID') }}</th>
                                <th class="text-center text-black">{{ __('Nombre') }}</th>
                                <th class="text-center text-black">{{ __('Descripción') }}</th>
                                <th class="text-center text-black">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td class="text-center text-black">{{ $rol->id }}</td>
                                    <td class="text-center text-black">{{ $rol->nombre }}</td>
                                    <td class="text-center text-black text-truncate" style="max-width: 250px;">{{ $rol->descripcion }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- Botón Editar -->
                                            <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-sm btn-info text-white shadow-sm hover:shadow-lg">
                                                {{ __('Editar') }}
                                            </a>

                                            <!-- Botón Eliminar con SweetAlert -->
                                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger text-white shadow-sm hover:shadow-lg delete-button">
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
                    <div class="mt-6 text-center">
                        {{ $roles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const form = this.closest('.delete-form');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esta acción no se puede deshacer.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
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
