"use strict"

function aceptar(id_peticion, cantidad, id_emisor) {
    aceptarPrestamo.classList.remove("ocultar");

    let prueba = document.getElementById("cantidad");

    document.getElementById('id_peticion').value = id_peticion;
    document.getElementById('cantidad').value = cantidad;
    document.getElementById('id_emisor').value= id_emisor;

    validar;
}

estilarBotonEstado();

function estilarBotonEstado() {
    let estadoPediditaElement = document.getElementById("estadoPedidita");

    if (estadoPediditaElement) {
        let estadoPedidita = estadoPediditaElement.innerHTML;

        botonAceptados.classList.remove("seleccionado");
        botonPendientes.classList.remove("seleccionado");
        botonRechazados.classList.remove("seleccionado");

        switch (estadoPedidita) {
            case "aceptada":
                botonAceptados.classList.add("seleccionado");
                break;
            case "rechazada":
                botonRechazados.classList.add("seleccionado");
                break;
            case "pendiente":
                botonPendientes.classList.add("seleccionado");
                break;
            default:
                break;
        }
    }
}


let formularioAceptarPrestamo = document.getElementsByName('prestamo')[0];

function ValidarMensualidad(e) {
    let campo = formularioAceptarPrestamo.mensualidad;
    let label = document.getElementById("mensualidad");
    let cantidad =document.getElementById('cantidad').value;

    label.textContent = "Mensualidad:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Inserta una mensualidad:";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    if (campo.value > cantidad/100 || campo.value < 1) {
        console.log(cantidad);
        campo.classList.add("error");
        label.textContent = "Inserta una mensualidad ente 1€ y "+cantidad/100+"€";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    campo.classList.add("correct");

}

function ValidarTiempo(e) {
    let campo = formularioAceptarPrestamo.tiempo;
    let label = document.getElementById("tiempo");

    label.textContent = "Tiempo (en días):"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Tiempo (en días):";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    if (campo.value < 1) {
        campo.classList.add("error");
        label.textContent = "Al menos 1 día:";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

}

function validar(e) {
    ValidarMensualidad(e)
    ValidarTiempo(e)
}

formularioAceptarPrestamo.addEventListener("submit", validar);