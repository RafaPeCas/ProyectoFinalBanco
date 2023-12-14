"use strict"

function todo(){
    todoF.classList.remove("ocultar");
    gastosF.classList.add("ocultar");
    ingresosF.classList.add("ocultar");
}

function ingreso(){
    todoF.classList.add("ocultar");
    gastosF.classList.add("ocultar");
    ingresosF.classList.remove("ocultar");
}

function gasto(){
    todoF.classList.add("ocultar");
    gastosF.classList.remove("ocultar");
    ingresosF.classList.add("ocultar");
}