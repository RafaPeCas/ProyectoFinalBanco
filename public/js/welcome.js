function obtenerFechaHoraActual() {
    let diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    let meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

    let fechaHora = new Date();
    let diaSemana = diasSemana[fechaHora.getDay()];
    let dia = fechaHora.getDate();
    let mes = meses[fechaHora.getMonth()];
    let año = fechaHora.getFullYear();
    let horas = fechaHora.getHours();
    let minutos = fechaHora.getMinutes();
    let segundos = fechaHora.getSeconds();


    let formatoDosDigitos = (valor) => (valor < 10 ? `0${valor}` : valor);

    let fechaHoraFormateada = `Hoy es ${diaSemana} ${dia} de ${mes} de ${año} y son las ${formatoDosDigitos(horas)}:${formatoDosDigitos(minutos)}:${formatoDosDigitos(segundos)}`;

    return fechaHoraFormateada;
}
function actualizarFechaHoraEnDOM() {
    let datetimeElement = document.getElementById("datetime");
    let fechaHoraActual = obtenerFechaHoraActual();
    datetimeElement.textContent = fechaHoraActual;
}

setInterval(actualizarFechaHoraEnDOM, 1000);

actualizarFechaHoraEnDOM();
