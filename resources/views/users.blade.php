<x-app-layout>
    @vite('resources/css/users.css')
    @vite('resources/js/users.js')
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
            <h2>Usuarios</h2>
            <div class="icon-container" onclick="openModal()">
                <div class="icon-circle">
                    <img src="agregar.png" alt="Icono"> <!-- Reemplaza "agregar.png" con la ruta de tu imagen -->
                </div>
            </div>
            <div class="table-container">
               <x-students-table :students="$students" />
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
        <h2>Registro de Usuarios</h2>
        <label for="nombre-completo">Nombre completo:</label>
        <input type="text" id="nombre-completo" name="nombre-completo">
        <label for="correo-electronico">Correo electronico:</label>
        <input type="text" id="correo-electronico" name="correo-electronico">
        <label for="contraseña">Contraseña:</label>
        <input type="text" id="contraseña" name="contraseña">    
        </select>
        <div class="buttons">
            <button class="cancel" onclick="closeModal()">Cancelar</button>
            <button class="save">Guardar</button>
        </div>
    </div>
</div>
</x-app-layout>