<x-app-layout>
    <x-slot name="header">
        <h2 class="display-5 font-semibold text-3xl text-center text-black dark:text-white leading-tight">
            {{ __('Registro de Asistencia de Todos los Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('asistencia.index') }}" class="mb-4 d-flex flex-wrap justify-content-center">
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
                        <a href="{{ route('asistencia.reporte', ['nombre' => request('nombre'), 'fecha' => request('fecha')]) }}" 
                           class="btn btn-danger btn-lg shadow-sm mx-2">
                            {{ __('Reporte PDF') }}
                        </a>
                    </form>

                    <!-- Tabla de asistencia -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">{{ __('ID Asistencia') }}</th>
                                <th class="text-center">{{ __('Empleado') }}</th>
                                <th class="text-center">{{ __('Hora de Entrada') }}</th>
                                <th class="text-center">{{ __('Estado Entrada') }}</th>
                                <th class="text-center">{{ __('Fecha de Entrada') }}</th>
                                <th class="text-center">{{ __('Hora de Salida') }}</th>
                                <th class="text-center">{{ __('Estado Salida') }}</th>
                                <th class="text-center">{{ __('Fecha de Salida') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asistencias as $asistencia)
                                <tr>
                                    <td class="text-center">{{ $asistencia['idAsistencia'] }}</td>
                                    <td class="text-center">{{ $asistencia['empleadoNombre'] }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($asistencia['horaEntrada'])->format('H:i:s') }}</td>
                                    <td class="text-center">{{ $asistencia['estadoEntrada'] }}</td>
                                    <td class="text-center">{{ $asistencia['fechaEntrada'] }}</td>
                                    <td class="text-center">{{ $asistencia['horaSalida'] ? \Carbon\Carbon::parse($asistencia['horaSalida'])->format('H:i:s') : 'No registrada' }}</td>
                                    <td class="text-center">{{ $asistencia['estadoSalida'] ?? 'No registrada' }}</td>
                                    <td class="text-center">{{ $asistencia['fechaSalida'] ?? 'No registrada' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación centrada -->
                    <div class="mt-4 text-center">
                        {{ $entradas->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
