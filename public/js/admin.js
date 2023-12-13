"use strict"

function aceptar(id_peticion, cantidad) {
    aceptarPrestamo.classList.toggle("ocultar");
    document.getElementById('id_peticion').value = id_peticion;
    document.getElementById('cantidad').value = cantidad;
}

estilarBotonEstado();

function estilarBotonEstado() {
    let estadoPedidita = document.getElementById("estadoPedidita").innerHTML;

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
