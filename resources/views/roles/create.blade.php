<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar Nuevo Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div class="form-group">
                                <label for="nombre" class="text-sm font-medium text-gray-700 dark:text-gray-200">Nombre del Rol</label>
                                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion" class="text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" rows="4" required></textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 text-white font-semibold rounded-full shadow-xl transform transition-all hover:from-green-500 hover:via-green-600 hover:to-green-700 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50">
                                    Agregar Rol
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
