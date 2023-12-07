"use strict"

document.login.dni.focus();

let formulario = document.getElementsByName('login')[0],
    elemetos = formulario.elements,
    boton = document.getElementById('btn');


function validarDni(e) {
    if (formulario.dni.value == 0) {
        alert("Completa el campo DNI")
        document.login.dni.focus();
        e.preventDefault();
    } else if (formulario.dni.value > 9) {
        alert("El DNI es demasiado largo")
        e.preventDefault();
    } else {

        let dniRegex = /^(\d{8}|\d{7}[-\s]\d{1})[A-HJ-NP-TV-Za-hj-np-tv-z]$/;
        let dni = formulario.dni.value;
        if (!dniRegex.test(formulario.dni.value)) {
            alert("formato incorrecto");
            e.preventDefault();
        } else {

            let dniNumero = dni.slice(0, -1);
            let letraControlUsuario = dni.slice(-1).toUpperCase();

            let letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            let letraControlCalculada = letras[dniNumero % 23];

            if (letraControlUsuario != letraControlCalculada) {
                alert("Dni incorrecto");
                e.preventDefault();
            }
        }
    }

}

function validarPass(e){
    if (formulario.password.value == 0) {
        alert("Contraseña inválida")
        e.preventDefault();
    } 
}

function validar(e) {
    validarDni(e);
    validarPass(e);
}

formulario.addEventListener("submit", validar);
