<?php
require_once '../controllers/movimientosController.php';
require_once '../controllers/cuentaController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cuenta = $_SESSION["cuenta"]["id_cuenta"];
    $tipoMovimiento = $_POST['tipoMovimiento'];
    $monto = $_POST['monto']*100;

    $controlador = new MovimientosController();
    $resultado = $controlador->crearNuevoMovimiento($id_cuenta, $tipoMovimiento, $monto);

    if ($resultado){
        $controladorCuenta = new CuentaController();
        $controladorCuenta->actualizarSaldo($id_cuenta, $monto, $tipoMovimiento);
    }
    header("Location: ../views/baro.php");
}
