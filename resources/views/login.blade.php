<x-app-layout>
    @vite('resources/css/login.css')
<div class="container">
    <div class="form-container">
        <div class="logo-container">
            <img src="{{ asset('/logofcatransparente.png') }}" alt="fca icon">
        </div>
        <h2 id="formTitle">Iniciar Sesión</h2>
        <form id="loginForm" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>
    <div class="welcome-container">
        <div class="welcome-message">
            <h2>Bienvenido al Sistema de Asistencias de FCA</h2>
            <p>Para unirte a nuestra comunidad, por favor Inicia Sesión con tus datos.</p>
        </div>
    </div>
</div>
</x-app-layout>
