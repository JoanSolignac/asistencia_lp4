<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Salidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
        .summary {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Reporte de Salidas de Empleados</h2>
    <table>
        <thead>
            <tr>
                <th>ID Salida</th>
                <th>Empleado</th>
                <th>Hora de Salida</th>
                <th>Estado</th>
                <th>Fecha de Salida</th>
            </tr>
        </thead>
        <tbody>
            @php
                $antesDeLaHoraCount = 0;
                $despuesDeLaHoraCount = 0;
            @endphp

            @foreach($salidas as $salida)
                <tr>
                    <td>{{ $salida->id }}</td>
                    <td>{{ $salida->empleado->nombre_apellido }}</td>
                    <td>{{ $salida->hora_salida->format('H:i:s') }}</td>
                    <td>{{ $salida->estado }}</td>
                    <td>{{ $salida->created_at->format('d/m/Y') }}</td>
                </tr>

                @php
                    // Contar los estados de salida
                    if($salida->estado == 'Antes de la hora') {
                        $antesDeLaHoraCount++;
                    } elseif($salida->estado == 'Después de la hora') {
                        $despuesDeLaHoraCount++;
                    }
                @endphp
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <p>Total de empleados: {{ count($salidas) }}</p>
        <p>Antes de la hora: {{ $antesDeLaHoraCount }}</p>
        <p>Después de la hora: {{ $despuesDeLaHoraCount }}</p>
    </div>
</body>
</html>
