<?php

require_once('../models/movimientosModel.php');

class MovimientosController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new MovimientosModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function crearNuevoMovimiento($idCuenta, $tipoMovimiento, $monto)
    {
        $fechaMovimiento = date("Y-m-d H:i:s");
        if($monto > hexdec($_SESSION["cuenta"]["saldo"]) && $tipoMovimiento!="ingreso"){
            header("location: ../views/baro.php?error=true");
            return false;
        }
        $monto = str_pad(dechex($monto), 2, '0', STR_PAD_LEFT);
        $resultado = $this->modelo->crearNuevoMovimiento($idCuenta, $tipoMovimiento, $monto, $fechaMovimiento);

        if ($resultado) {
            return true;
            exit();
        } else {
            header("location: ../views/error.php");
            return false;
        }
    }

    public function mostrarMovimientos($idCuenta)
    {
        $movimientos = $this->modelo->mostrarMovimientos($idCuenta);
        return $movimientos;
    }
}
