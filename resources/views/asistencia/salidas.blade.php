<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Registro de Salidas de los Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <!-- Mensajes de notificación -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('asistencia.salidas') }}" class="mb-4 d-flex flex-wrap justify-content-center">
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
                        <a href="{{ route('asistencia.reportesalida', ['nombre' => request('nombre'), 'fecha' => request('fecha')]) }}" 
                           class="btn btn-danger btn-lg shadow-sm mx-2">
                            {{ __('Reporte PDF') }}
                        </a>
                    </form>

                    <!-- Tabla de salidas -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">{{ __('ID Salida') }}</th>
                                <th class="text-center">{{ __('Empleado') }}</th>
                                <th class="text-center">{{ __('Hora de Salida') }}</th>
                                <th class="text-center">{{ __('Estado') }}</th>
                                <th class="text-center">{{ __('Fecha de Salida') }}</th> <!-- Fecha de Salida -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salidas as $salida)
                                <tr>
                                    <td class="text-center">{{ $salida->id }}</td>
                                    <td class="text-center">{{ $salida->empleado->nombre_apellido }}</td>
                                    <td class="text-center">{{ $salida->hora_salida->format('H:i:s') }}</td>
                                    <td class="text-center">{{ $salida->estado }}</td>
                                    <td class="text-center">{{ $salida->created_at->format('d/m/Y') }}</td> <!-- Fecha de Salida -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación centrada -->
                    <div class="mt-4 text-center">
                        {{ $salidas->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
