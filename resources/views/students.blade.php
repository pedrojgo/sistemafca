<x-app-layout>
    @vite(['resources/css/students.css' ,'resources/js/students.js'])
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
            <h2>Alumnos</h2>
            <div class="icon-container" onclick="openModal()">
                <div class="icon-circle">
                    <img src="agregar.png" alt="Icono"> <!-- Reemplaza "agregar.png" con la ruta de tu imagen -->
                </div>
            </div>
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
                        <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
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
<div id="modal" class="modal">
    <div class="modal-content">
        <h2>Registro de Alumnos</h2>
        <label for="nombre-completo">Nombre completo:</label>
        <input type="text" id="nombre-completo" name="nombre-completo">
        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera">
            <option value="">Selecciona una carrera</option>
            <option value="ingenieria">Licenciatura en Administración</option>
            <option value="medicina">Licenciatura en Administración y Políticas Públicas</option>
            <option value="derecho">Licenciatura en Agronegocios</option>
            <option value="derecho">Licenciatura en Contaduría Pública</option>
            <option value="derecho">Licenciatura en Mercadotecnia Estratégica</option>
        </select>
        <div class="buttons">
            <button class="cancel" onclick="closeModal()">Cancelar</button>
            <button class="save">Guardar</button>
        </div>
    </div>
</div>
</x-app-layout>