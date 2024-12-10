<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Agregar Nuevo Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-lg">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">

                            <!-- Campo Nombre del Rol -->
                            <div class="form-group">
                                <label for="nombre" class="form-label text-black dark:text-white">{{ __('Nombre del Rol') }}</label>
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg border-2 rounded-lg shadow-sm" required>
                            </div>

                            <!-- Campo Descripción -->
                            <div class="form-group">
                                <label for="descripcion" class="form-label text-black dark:text-white">{{ __('Descripción') }}</label>
                                <textarea name="descripcion" id="descripcion" class="form-control form-control-lg border-2 rounded-lg shadow-sm" rows="4" required></textarea>
                            </div>

                            <!-- Botón Enviar -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-sm w-40 px-5 py-3 rounded-pill shadow-sm hover:shadow-lg focus:ring-4 focus:ring-green-300 mt-3">
                                    {{ __('Agregar Rol') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
