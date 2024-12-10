<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Listado de Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form method="GET" action="{{ route('roles.index') }}" class="mb-4 flex items-center justify-center space-x-4 w-3/4 mx-auto">
                <!-- Campo de texto para buscar el rol -->
                <div class="flex-grow">
                    <label for="role-search" class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Buscar Rol') }}</label>
                    <input type="text" name="role-search" id="role-search" value="{{ request('role-search') }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Escribe para buscar...">
                </div>

                <!-- Botón de búsqueda centrado con estilo mejorado -->
                <button type="submit" class="px-8 py-3 bg-blue-500 text-white font-semibold rounded-md shadow-lg hover:bg-blue-600 transition-all duration-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    {{ __('Buscar') }}
                </button>
            </form>

                    <!-- Tabla para mostrar los roles -->
                    <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700 dark:text-gray-200 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr class="border-b border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-center text-sm text-gray-700 dark:text-gray-200">{{ $rol->id }}</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-700 dark:text-gray-200">{{ $rol->nombre }}</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-700 dark:text-gray-200 break-words">{{ $rol->descripcion }}</td>
                                    <td class="px-6 py-4 text-center text-sm">
                                        <div class="flex justify-center space-x-4">
                                            <!-- Botón Editar -->
                                            <a href="{{ route('roles.edit', $rol->id) }}" class="px-4 py-2 text-blue-500 border border-blue-500 rounded-md hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-white transition duration-200">
                                                Editar
                                            </a>

                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 text-red-500 border border-red-500 rounded-md hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white transition duration-200">
                                                    Eliminar
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
                        {{ $roles->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
