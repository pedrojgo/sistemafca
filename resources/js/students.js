function updateDateTime() {
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const date = now.toLocaleDateString('es-ES', options);
    const time = now.toLocaleTimeString('es-ES');
    document.getElementById('date-time').textContent = `${date} ${time}`;
}
setInterval(updateDateTime, 1000);
updateDateTime(); // Llamar de inmediato para evitar retraso en la actualización inicial

function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

