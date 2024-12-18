<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            {{ __('Agregar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Formulario de Nuevo Empleado</h4>
                </div>
                <div class="card-body">
                    <form id="empleado-form" action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre_apellido" class="form-label">Nombre y Apellido</label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="idRol" class="form-label">Rol</label>
                                <select name="idRol" id="idRol" class="form-select" required>
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="estado" class="form-label">Estado</label>
                                <select name="estado" id="estado" class="form-select" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hora_entrada" class="form-label">Hora de Entrada</label>
                                <input type="time" name="hora_entrada" id="hora_entrada" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="hora_salida" class="form-label">Hora de Salida</label>
                                <input type="time" name="hora_salida" id="hora_salida" class="form-control" required>
                            </div>
                        </div>
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
                        <div class="mt-4 text-end">
                            <button type="button" id="add-employee-btn" class="btn btn-primary">
                                Agregar Empleado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addButton = document.getElementById('add-employee-btn');
            const form = document.getElementById('empleado-form');

            addButton.addEventListener('click', function () {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Se agregará un nuevo empleado.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, agregar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
