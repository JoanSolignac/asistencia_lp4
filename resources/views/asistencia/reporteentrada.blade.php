<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Entradas</title>
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
    <h2>Reporte de Entradas de Empleados</h2>
    <table>
        <thead>
            <tr>
                <th>ID Entrada</th>
                <th>Empleado</th>
                <th>Hora de Entrada</th>
                <th>Estado</th>
                <th>Fecha de Entrada</th>
            </tr>
        </thead>
        <tbody>
            @php
                $enHoraCount = 0;
                $tardanzaCount = 0;
            @endphp

            @foreach($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->id }}</td>
                    <td>{{ $entrada->empleado->nombre_apellido }}</td>
                    <td>{{ $entrada->hora_entrada->format('H:i:s') }}</td>
                    <td>{{ $entrada->estado }}</td>
                    <td>{{ $entrada->created_at->format('d/m/Y') }}</td>
                </tr>

                @php
                    // Contar los estados de entrada
                    if($entrada->estado == 'En hora') {
                        $enHoraCount++;
                    } elseif($entrada->estado == 'Tardanza') {
                        $tardanzaCount++;
                    }
                @endphp
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <p>Total de empleados: {{ count($entradas) }}</p>
        <p>En hora: {{ $enHoraCount }}</p>
        <p>Tardanza: {{ $tardanzaCount }}</p>
    </div>
</body>
</html>
