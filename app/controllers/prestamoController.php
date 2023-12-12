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
        $resultado = $this->modelo->crearNuevoPrestamo($idCuenta, $cantidad, $mensualidad, $tiempo);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
}
