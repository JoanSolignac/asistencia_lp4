<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Asistencia de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }
        .title {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
            color: #333;
            font-size: 12px;
        }
        table td {
            font-size: 12px;
        }
        .badge {
            padding: 2px 5px;
            border-radius: 3px;
            color: #fff;
            font-size: 8px;
        }
        .bg-success {
            background-color: green;
        }
        .bg-danger {
            background-color: red;
        }
        .bg-warning {
            background-color: orange;
        }
        .bg-secondary {
            background-color: gray;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .summary-table th, .summary-table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .summary-table th {
            background-color: #f4f4f4;
            color: #333;
        }
        /* Alineación específica */
        .summary-table td {
            text-align: left;
        }
        .summary-table .total-column {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="title">Reporte de Asistencia de Empleados</h3>

        <!-- Tabla con diseño personalizado -->
        <table>
            <thead>
                <tr>
                    <th>ID Asistencia</th>
                    <th>Empleado</th>
                    <th>Hora de Entrada</th>
                    <th>Estado Entrada</th>
                    <th>Fecha de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Estado Salida</th>
                    <th>Fecha de Salida</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // Inicializar contadores
                    $totalEmpleados = 0;
                    $empleadosEnHora = 0;
                    $empleadosTarde = 0;
                    $empleadosNoRegistraSalida = 0;
                    $empleadosAntesHoraSalida = 0;
                    $empleadosDespuesHoraSalida = 0;
                @endphp

                @foreach($asistencias as $asistencia)
                    @php
                        $totalEmpleados++;

                        // Contar estado de entrada
                        if ($asistencia['estadoEntrada'] === 'En hora') {
                            $empleadosEnHora++;
                        } else {
                            $empleadosTarde++;
                        }

                        // Contar estado de salida
                        if ($asistencia['estadoSalida'] === 'No registrada') {
                            $empleadosNoRegistraSalida++;
                        } else if ($asistencia['estadoSalida'] === 'Antes de la hora') {
                            $empleadosAntesHoraSalida++;
                        } else if ($asistencia['estadoSalida'] === 'Después de la hora') {
                            $empleadosDespuesHoraSalida++;
                        }
                    @endphp
                    <tr>
                        <td>{{ $asistencia['idAsistencia'] }}</td>
                        <td>{{ $asistencia['empleadoNombre'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($asistencia['horaEntrada'])->format('H:i:s') }}</td>
                        <td>
                            <span class="badge {{ $asistencia['estadoEntrada'] === 'En hora' ? 'bg-success' : 'bg-danger' }} text-white">
                                {{ $asistencia['estadoEntrada'] }}
                            </span>
                        </td>
                        <td class="text-primary">{{ $asistencia['fechaEntrada'] }}</td>
                        <td class="text-info">{{ $asistencia['horaSalida'] ? \Carbon\Carbon::parse($asistencia['horaSalida'])->format('H:i:s') : 'No registrada' }}</td>
                        <td>
                            <span class="badge {{ $asistencia['estadoSalida'] ? 'bg-warning' : 'bg-secondary' }} text-white">
                                {{ $asistencia['estadoSalida'] ?? 'No registrada' }}
                            </span>
                        </td>
                        <td class="text-secondary">{{ $asistencia['fechaSalida'] ?? 'No registrada' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Resumen en tabla -->
        <table class="summary-table">
            <thead>
                <tr>
                    <th>Resumen de Asistencia</th>
                    <th class="total-column">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total de empleados</td>
                    <td class="total-column"><strong>{{ $totalEmpleados }}</strong></td>
                </tr>
                <tr>
                    <td>Empleados en hora</td>
                    <td class="total-column"><strong>{{ $empleadosEnHora }}</strong></td>
                </tr>
                <tr>
                    <td>Empleados con tardanza</td>
                    <td class="total-column"><strong>{{ $empleadosTarde }}</strong></td>
                </tr>
                <tr>
                    <td>Empleados no registran salida</td>
                    <td class="total-column"><strong>{{ $empleadosNoRegistraSalida }}</strong></td>
                </tr>
                <tr>
                    <td>Empleados con salida antes de la hora</td>
                    <td class="total-column"><strong>{{ $empleadosAntesHoraSalida }}</strong></td>
                </tr>
                <tr>
                    <td>Empleados con salida después de la hora</td>
                    <td class="total-column"><strong>{{ $empleadosDespuesHoraSalida }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
