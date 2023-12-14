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

    let cantidadMaxima = Math.floor((dineroJS.innerHTML * 0.15));

    if (campo.value > cantidadMaxima / 100 || campo.value < 1) {
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

let palabras = ["Solicitar préstamo", "Préstamos"];
let i = 0;

function cambiar(direccion) {
    let formulario = document.getElementById("formularioPrestamo");
    contenedorContenedorTabla.classList.toggle("ocultar");
    formulario.classList.toggle("ocultar");
    enunciadoPrestamos.innerHTML = palabras[i];

    direccion ? i++ : i--;

    if (i >= palabras.length) {
        i = 0;
    } else if (i < 0) {
        i = palabras.length - 1;
    }
}

let formularioPagoPrestamo = document.getElementsByName('pagoPrestamo')[0];

let totalPagarPrestamo;

function pagarPrestamo(id_prestamo, totalPagar, mensualidad) {
    formularioPagarPrestamo.classList.remove("ocultar");
    document.getElementById("id_prestamoForm").value = id_prestamo;
    document.getElementById("totalPrestamo").value= totalPagar;
    document.getElementById("cantidadPagoPrestamo").value=mensualidad/100;
    totalPagarPrestamo=totalPagar;
    totalPagar=totalPagar/100;
    
    let resultado = totalPagar.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById("totalPagar").innerHTML=resultado;
    document.getElementById("nPrestamo").innerHTML=id_prestamo;

}

function ValidarCantidadP(e) {
    let campo = formularioPagoPrestamo.cantidadPagoPrestamo;
    let label = document.getElementById("cantidadPagoPrestamolbl");

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

    if (campo.value > totalPagarPrestamo / 100 || campo.value <= 0) {
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

function validarP(e){
    ValidarCantidadP(e);
}

formularioPagoPrestamo.addEventListener("submit", validarP);
