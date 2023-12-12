"use strict"

function aceptar(id_peticion, cantidad){
    aceptarPrestamo.classList.toggle("ocultar");
    document.getElementById('id_peticion').value = id_peticion;
    document.getElementById('cantidad').value = cantidad;
}