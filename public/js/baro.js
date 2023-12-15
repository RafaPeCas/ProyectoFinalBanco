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

function cambiar() {


    if (solicitarPrestamoButton.classList.contains("sacar")) {
        sacarBaro.classList.toggle("ocultar");
        meterBaro.classList.toggle("ocultar");
        solicitarPrestamoButton.classList.toggle("sacar")
        solicitarPrestamoButton.classList.toggle("meter")
        solicitarPrestamoButton.innerHTML="Ingresar dinero"
    } else if (solicitarPrestamoButton.classList.contains("meter")) {
        sacarBaro.classList.toggle("ocultar");
        meterBaro.classList.toggle("ocultar");
        solicitarPrestamoButton.classList.toggle("sacar")
        solicitarPrestamoButton.classList.toggle("meter")
        solicitarPrestamoButton.innerHTML="Sacar dinero"
    } else {
        meterBaro.classList.toggle("ocultar");
        solicitarPrestamoButton.classList.toggle("sacar")
        solicitarPrestamoButton.innerHTML="Sacar dinero"
    }


}