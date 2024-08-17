<x-app-layout>
    @vite('resources/css/assistances.css')
        <div class="header">
            <div class="logo-title">
                <img src="logofcatransparente.png" alt="Logo">
                <h1>Sistema de Asistencias Laboratorios FCA</h1>
            </div>
            <div class="date-time" id="date-time"></div>
        </div>
        <div class="main-content">
            <div class="sidebar">
                <div class="filters">
                    <label for="fecha-inicial">Fecha inicial</label>
                    <input type="date" id="fecha-inicial" name="fecha-inicial">
                    <label for="fecha-final">Fecha final</label>
                    <input type="date" id="fecha-final" name="fecha-final">
                    <button type="button">Buscar</button>
                    <button type="button" class="clear">Borrar filtros</button>
                </div>
            </div>
            <div class="content">
                <h2>Asistencias</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>Alumno</th>
                                <th>Alumno</th>
                                <th>Alumno</th>
                                <th>Alumno</th>
                                <th>Alumno</th>
                                <th>Alumno</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>© 2024 Sistema de Asistencias Laboratorios FCA</p>
            <nav>
                <a href="#">Dashboard</a>
                <a href="#">Asistencias</a>
                <a href="#">Usuarios</a>
            </nav>
        </div>
    </div>
    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const date = now.toLocaleDateString('es-ES', options);
            const time = now.toLocaleTimeString('es-ES');
            document.getElementById('date-time').textContent = `${date} ${time}`;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime(); // Llamar de inmediato para evitar retraso en la actualización inicial
    </script>
</x-app-layout>