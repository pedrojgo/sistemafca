document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    console.log('Correo Electrónico:', email);
    console.log('Contraseña:', password);
    // Aquí puedes agregar la lógica para manejar el inicio de sesión
});
