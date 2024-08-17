<x-app-layout>
    @vite('resources/css/home.css')
    @vite('resources/js/home.js')
    <div class="header">
        <div class="title">
            <img src="logofcatransparente.png" alt="Logo">
            <h1 style="margin: 0;">Sistema de Asistencias Laboratorios FCA</h1>
        </div>
        <div class="date-time" id="date-time"></div>
    </div>

    <div class="container">
        <div class="sidebar">
            <button>Alumnos</button>
            <button>Asistencias</button>
            <button>Usuarios</button>
        </div>

        <div class="main-content">
            <div class="card">
                <h3>Últimos registros</h3>
                <table>
                    <tr>
                        <th>Alumno</th>
                        <th>Alumno</th>
                        <th>Alumno</th>
                        <th>Alumno</th>
                        <th>Alumno</th>
                        <th>Alumno</th>
                        <th>Alumno</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div class="card generate-report">
                <input type="text" placeholder="Fecha inicial">
                <input type="text" placeholder="Fecha final">
                <button>Generar</button>
            </div>
        </div>
    </div>

    <div class="footer">
        © 2024 Sistema de Asistencias Laboratorios FCA
    </div>
</x-app-layout>