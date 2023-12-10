"use strict"

let formSignin = document.getElementsByName('signin')[0];

function validarDniR(e) {
    let dniInput = formSignin.dniRegistro;
    let dniValue = dniInput.value.trim();
    let labelDni = document.getElementById("dniRegistro");

    labelDni.textContent = "DNI:"
    dniInput.classList.remove("error");
    dniInput.classList.remove("correct");
    labelDni.classList.remove("bote");

    if (dniValue === "") {
        dniInput.classList.add("error");
        labelDni.textContent = "Rellene el DNI";
        setTimeout(function () {
            labelDni.classList.add("bote");
        }, 1);
        dniInput.focus();
        e.preventDefault();
        return;
    }

    let dniMaxLength = 9;
    if (dniValue.length > dniMaxLength) {
        dniInput.classList.add("error");
        labelDni.textContent = "El campo DNI no debe contener más de 9 carácteres"
        setTimeout(function () {
            labelDni.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    let dniRegex = /^(\d{8}|\d{7}[-\s]\d{1})[A-HJ-NP-TV-Za-hj-np-tv-z]$/;
    if (!dniRegex.test(dniValue)) {
        dniInput.classList.add("error");
        labelDni.textContent = "Formato de DNI inválido"
        setTimeout(function () {
            labelDni.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    let dniNumero = dniValue.slice(0, -1);
    let letraControlUsuario = dniValue.slice(-1).toUpperCase();

    let letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    let letraControlCalculada = letras[dniNumero % 23];

    if (letraControlUsuario !== letraControlCalculada) {
        dniInput.classList.add("error");
        labelDni.textContent = "DNI incorrecto"
        setTimeout(function () {
            labelDni.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }
    dniInput.classList.add("correct");
}

function ValidarNombreR(e) {
    let campo = formSignin.nombre;
    let label = document.getElementById("nombre");

    label.textContent = "Nombre:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "No debe dejar el Nombre vacío:";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }

}

function ValidarApellido1(e) {
    let campo = formSignin.apellido1;
    let label = document.getElementById("apellido1");

    label.textContent = "Apellido 1:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Apellido inválido";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }

}

function ValidarApellido2(e) {
    let campo = formSignin.apellido2;
    let label = document.getElementById("apellido2");

    label.textContent = "Apellido 2:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Apellido inválido";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }

}

function ValidarEmailR(e) {
    let campo = formSignin.email;
    let label = document.getElementById("email");

    label.textContent = "Email:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Email inválido";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    let patronCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!patronCorreo.test(campo.value)) {
        campo.classList.add("error");
        label.textContent = "Email inválido @";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    campo.classList.add("correct");

}

function ValidarDireccionR(e) {
    let campo = formSignin.direccion;
    let label = document.getElementById("direccion");

    label.textContent = "Direccion:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Direccion inválida";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }
}

function ValidarLocalidadR(e) {
    let campo = formSignin.localidad;
    let label = document.getElementById("localidad");

    label.textContent = "Localidad:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Localidad inválida";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }
}

function ValidarCpR(e) {
    let campo = formSignin.cp;
    let label = document.getElementById("cp");

    label.textContent = "Código postal:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "CP inválido";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    if (campo.value < 10000 || campo.value > 99999) {
        campo.classList.add("error");
        label.textContent = "CP inválido";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }
    campo.classList.add("correct");

}

function ValidarProvinciaR(e) {
    let campo = formSignin.provincia;
    let label = document.getElementById("provincia");

    label.textContent = "Provincia:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "Provincia inválida";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }
}

function ValidarPaisR(e) {
    let campo = formSignin.pais;
    let label = document.getElementById("pais");

    label.textContent = "País:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "País inválido";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    } else {
        campo.classList.add("correct");
    }
}

function ValidarFechaR(e) {
    let campo = formSignin.fNac;
    let label = document.getElementById("fNac");

    label.textContent = "Fecha de nacimiento:"
    campo.classList.remove("error");
    campo.classList.remove("correct");
    label.classList.remove("bote");

    if (campo.value === "") {
        campo.classList.add("error");
        label.textContent = "La fecha es inválida";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    let fechaInsertada = new Date(campo.value);
    let fechaActual = new Date();
    let diferencia = fechaActual-fechaInsertada;
    let edad = Math.floor(diferencia / (365.25 * 24 * 60 * 60 * 1000));

    if (edad<18){
        campo.classList.add("error");
        label.textContent = "No puedes ser menor";
        setTimeout(function () {
            label.classList.add("bote");
        }, 1);
        e.preventDefault();
        return;
    }

    campo.classList.add("correct");

}

function validarR(e) {
    validarDniR(e);
    ValidarEmailR(e);
    ValidarNombreR(e);
    ValidarApellido1(e);
    ValidarApellido2(e);
    ValidarDireccionR(e);
    ValidarLocalidadR(e);
    ValidarCpR(e);
    ValidarProvinciaR(e);
    ValidarPaisR(e);
    ValidarFechaR(e);
}

formSignin.addEventListener("submit", validarR);

