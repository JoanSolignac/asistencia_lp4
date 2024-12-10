<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Registro de Entradas de los Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <!-- Mensajes de notificación -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('asistencia.entradas') }}" class="mb-4 d-flex flex-wrap justify-content-center">
                        <div class="form-group mx-2" style="flex: 1; max-width: 80%;">
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

                    <!-- Tabla de entradas -->
                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>{{ __('ID Entrada') }}</th>
                                <th>{{ __('Empleado') }}</th>
                                <th>{{ __('Hora de Entrada') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>{{ __('Fecha de Entrada') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($entradas as $entrada)
                                <tr class="text-center">
                                    <td>{{ $entrada->id }}</td>
                                    <td>{{ $entrada->empleado->nombre_apellido }}</td>
                                    <td>{{ $entrada->hora_entrada->format('H:i:s') }}</td>
                                    <td>{{ $entrada->estado }}</td>
                                    <td>{{ $entrada->hora_entrada->toDateString() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        {{ __('No hay registros de entrada disponibles.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginación centrada -->
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $entradas->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
