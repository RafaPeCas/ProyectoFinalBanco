"use strict"

document.login.dni.focus();

let formulario = document.getElementsByName('login')[0],
    elemetos = formulario.elements,
    boton = document.getElementById('btn');


function validarDni(e) {
    let dniInput = formulario.dni;
    let dniValue = dniInput.value.trim();
    let labelDni = document.getElementById("labelDni");

    labelDni.textContent = "DNI:"
    dniInput.classList.remove("error");
    dniInput.classList.remove("correct");

    if (dniValue === "") {
        dniInput.classList.add("error");
        labelDni.textContent = "No debe dejar el campo DNI vacío:"
        dniInput.focus();
        e.preventDefault();
        return;
    }

    let dniMaxLength = 9;
    if (dniValue.length > dniMaxLength) {
        dniInput.classList.add("error");
        labelDni.textContent = "El campo DNI no debe contener más de 9 carácteres"
        e.preventDefault();
        return;
    }

    let dniRegex = /^(\d{8}|\d{7}[-\s]\d{1})[A-HJ-NP-TV-Za-hj-np-tv-z]$/;
    if (!dniRegex.test(dniValue)) {
        dniInput.classList.add("error");
        labelDni.textContent = "Formato de DNI inválido"
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
        e.preventDefault();
        return;
    }
    dniInput.classList.add("correct");
}

function validarPass(e) {
    let passwordInput = formulario.password;
    let labelPass = document.getElementById("labelPass");

    labelPass.textContent = "Contraseña";
    passwordInput.classList.remove("error");

    if (formulario.password.value == 0) {
        passwordInput.classList.add("error");
        labelPass.textContent = "Contraseña incorrecta"
        e.preventDefault();
        return
    }
}

function validar(e) {
    validarDni(e);
    validarPass(e);
}

formulario.addEventListener("submit", validar);
