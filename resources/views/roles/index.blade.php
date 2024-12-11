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
                    <!-- Estilo personalizado para el botón -->
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

                        .btn-primary {
                            background-color: #007bff;
                            border-color: #007bff;
                            color: white;
                        }

                        .btn-primary:hover {
                            background-color: #0056b3; /* Azul más oscuro al pasar el mouse */
                            border-color: #0056b3; /* Borde azul más oscuro */
                            color: white; /* Texto blanco */

                        
                        }
                    </style>
                    <form method="GET" action="{{ route('roles.index') }}" class="mb-6 d-flex justify-content-center align-items-center w-75 mx-auto">
                        <!-- Campo de texto para buscar el rol -->
                        <div class="flex-grow mx-2 w-50">
                            <input type="text" name="role-search" id="role-search" value="{{ request('role-search') }}" 
                                class="form-control form-control-lg rounded-3 border-secondary bg-light text-black shadow-sm" 
                                placeholder="Escribe un nombre de rol para buscar...">
                        </div>

                        <!-- Botón de búsqueda -->
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

                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-white shadow-sm hover:shadow-lg" onclick="return confirm('¿Estás seguro de eliminar este rol?')">>
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
</x-app-layout>
