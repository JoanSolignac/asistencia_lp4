<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Entradas de los Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h2>Reporte de Entradas de los Empleados</h2>
    <table>
        <thead>
            <tr>
                <th>ID Entrada</th>
                <th>Empleado</th>
                <th>Hora de Entrada</th>
                <th>Estado Entrada</th>
                <th>Fecha Entrada</th>
                <th>Hora de Salida</th>
                <th>Estado Salida</th>
                <th>Fecha Salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia['idEntrada'] }}</td>
                    <td>{{ $asistencia['empleadoNombre'] }}</td>
                    <td>{{ $asistencia['horaEntrada']->format('H:i:s') }}</td>
                    <td>{{ $asistencia['estadoEntrada'] }}</td>
                    <td>{{ $asistencia['fechaEntrada'] }}</td>
                    <td>{{ $asistencia['horaSalida'] ? $asistencia['horaSalida']->format('H:i:s') : 'N/A' }}</td>
                    <td>{{ $asistencia['estadoSalida'] ?? 'N/A' }}</td>
                    <td>{{ $asistencia['fechaSalida'] ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
