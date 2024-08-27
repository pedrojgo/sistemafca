<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte PDF</title>

     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #fff;
        }
        .center{
          display: flex;
          text-align: center;
          justify-content: center;
          align-items: center;
        }

        .container {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 5px;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            line-height: 1.4;
        }

        header p {
            margin: 0;
            font-size: 16px;
        }

        .content {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 14px;
            line-height: 1.6;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        footer {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .dates {
            font-size: 1rem;
        }

        @media print {
            /* Ajustes para impresión */
            body {
                background-color: #fff;
                color: #000;
            }
            header, footer {
                background-color: #007bff;
                color: #fff;
            }
            header h1, header p.dates, footer p {
                margin: 0;
                font-size: 16px;
                text-align: center;
            }
            .container {
                width: 100%;
                padding: 0;
                margin: 0;
            }
            table {
                border: 1px solid #000;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                font-size: 12px;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            footer {
                position: absolute;
                bottom: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    
    <header>
        <div class="container">
            <h1>Reporte de Asistencias al laboratorio</h1>
            <p class="dates">{{$ReportDate}}</p>
        </div>
    </header>

    <div class="container content">
        <h2 class="center">Asistencias</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Materia</th>
                    <th>Maestro</th>
                    <th>Laboratorio</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($attendance->student)
                            {{ $attendance->student->name }}
                        @else
                            <strong>sin Estudiante asignado</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($attendance->material)
                            {{ $attendance->material->name }}
                        @else
                            <strong>sin Materia asignada</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($attendance->teacher)
                            {{ $attendance->teacher->name }}
                        @else
                            <strong>sin profesor asignado</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($attendance->lab)
                            {{ $attendance->lab->name }}
                        @else
                            <strong>sin Laboratorio asignado</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($attendance->created_at)
                            {{ $attendance->created_at }}
                        @else
                            <strong>sin Fecha de ingreso </strong>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 - Reporte generado automáticamente el {{$DateGenerator}}</p>
        </div>
    </footer>
</body>
</html>
