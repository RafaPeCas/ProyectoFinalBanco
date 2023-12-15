"use strict"

estilarBotonEstado();

function estilarBotonEstado() {
    let tabElement = document.getElementById("estadoTab");

    if (tabElement) {
        let tab = estadoTab.innerHTML;
        todo.classList.remove("seleccionado");
        gasto.classList.remove("seleccionado");
        ingreso.classList.remove("seleccionado");
        prestamo.classList.remove("seleccionado");

        switch (tab) {
            case "todo":
                todo.classList.add("seleccionado");
                break;
            case "gasto":
                gasto.classList.add("seleccionado");
                break;
            case "ingreso":
                ingreso.classList.add("seleccionado");
                break;
            case "prestamo":
                prestamo.classList.add("seleccionado");
                break;
            default:
                break;
        }
    }
}