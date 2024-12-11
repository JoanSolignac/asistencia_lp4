<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Agregar Nuevo Rol') }}
        </h2>
    </x-slot>
    <style>
        .btn-success {
        background-color: #28a745; /* Verde inicial */
        border-color: #28a745; /* Borde verde inicial */
        color: white; /* Texto blanco */
    }

    .btn-success:hover {
        background-color: #218838; /* Verde más oscuro al pasar el mouse */
        border-color: #1e7e34; /* Borde verde más oscuro */
        color: white; /* Texto blanco */
    }

    </style>
    <div class="py-12">
        <div class="container-lg">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="nombre" class="form-label text-black dark:text-white">{{ __('Nombre del Rol') }}</label>
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg border-2 rounded-lg shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="form-label text-black dark:text-white">{{ __('Descripción') }}</label>
                                <textarea name="descripcion" id="descripcion" class="form-control form-control-lg border-2 rounded-lg shadow-sm" rows="4" required></textarea>
                            </div>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "El rol será agregado.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, agregar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            '¡Agregado!',
                            'El rol se ha agregado correctamente.',
                            'success'
                        );
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
