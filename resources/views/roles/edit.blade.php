<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Editar Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
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
                            background-color: #0056b3; /* Azul más oscuro al pasar el mouse */
                            border-color: #0056b3; /* Borde azul más oscuro */
                            color: white; /* Texto blanco */
                        }
                    </style>
                    <!-- Formulario para editar el rol -->
                    <form method="POST" action="{{ route('roles.update', $rol->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre" class="form-label text-black dark:text-white">{{ __('Nombre') }}</label>
                            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $rol->nombre) }}" 
                                class="form-control form-control-lg border-2 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="form-label text-black dark:text-white">{{ __('Descripción') }}</label>
                            <textarea id="descripcion" name="descripcion" class="form-control form-control-lg border-2 rounded-lg shadow-sm" 
                                rows="4" required>{{ old('descripcion', $rol->descripcion) }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
