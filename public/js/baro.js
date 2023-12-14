"use strict"

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