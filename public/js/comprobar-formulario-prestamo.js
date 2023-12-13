"use strict"

let formularioPrestamo = document.getElementsByName('prestamo')[0];

function ValidarMotivo(e) {
    let campo = formularioPrestamo.motivo;
    let label = document.getElementById("motivo");

    label.textContent = "Motivo del Préstamo:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Inserte un motivo:";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }
    
    campo.classList.add("correct");

}

function ValidarCantidad(e) {
    let campo = formularioPrestamo.cantidad;
    let label = document.getElementById("cantidad");

    label.textContent = "Cantidad del Préstamo:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");
    cantidadMax.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Inserte una cantidad:";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    if (isNaN(campo.value)) {
        campo.classList.add("error");
        label.textContent = "Inserte un valor numérico:";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    let cantidadMaxima = Math.floor((dineroJS.innerHTML*0.15));

    if  (campo.value>cantidadMaxima/100 || campo.value<1){
        campo.classList.add("error");
        label.textContent = "Cantidad inválida:";
        setTimeout(function () {
            cantidadMax.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    campo.classList.add("correct");

}

function validar(e) {
    ValidarMotivo(e)
    ValidarCantidad(e)
}

formularioPrestamo.addEventListener("submit", validar);