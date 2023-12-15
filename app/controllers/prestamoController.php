<?php

require_once('../models/prestamosModel.php');

class PrestamoController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new PrestamosModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function solicitarPrestamo($idCuenta, $cantidad, $mensualidad, $tiempo)
    {

        $cantidad=str_pad(dechex($cantidad), 2, '0', STR_PAD_LEFT);
        $mensualidad=str_pad(dechex($mensualidad), 2, '0', STR_PAD_LEFT);

        $resultado = $this->modelo->crearNuevoPrestamo($idCuenta, $cantidad, $mensualidad, $tiempo);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrarPrestamos($idCuenta){
        $prestamos = $this->modelo->mostrarPrestamos($idCuenta);
        return $prestamos;
    }

    public function actualizarPrestamo($cantidad, $id_prestamo){
        $this->modelo->actualizarPrestamo($cantidad, $id_prestamo);
    }

    public function mostrarTodosPrestamos(){
        $prestamos = $this->modelo->mostrarTodosPrestamos();
        return $prestamos;
    }
}
