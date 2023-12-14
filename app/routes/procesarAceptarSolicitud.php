<?php
require_once '../controllers/solicitudPrestamoController.php';
require_once '../controllers/prestamoController.php';
require_once '../controllers/cuentaController.php';
require_once '../controllers/movimientosController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_cuenta=$_SESSION["cuenta"]["id_cuenta"];
    $id_peticion=$_POST["id_peticion"];
    $cantidad= $_POST["cantidad"];
    $mensualidad= $_POST["mensualidad"]*100;
    $tiempo = $_POST["tiempo"];
    
    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->cambiarEstado($id_peticion, "aceptada");

    $controladorPrestamo = new PrestamoController();
    $controladorPrestamo->solicitarPrestamo($id_cuenta, $cantidad,$mensualidad, $tiempo);

    $cuentaController = new CuentaController();
    $cuentaController->actualizarSaldo($id_cuenta, $cantidad, "ingreso");

    $movimientoController = new MovimientosController();
    $movimientoController->crearNuevoMovimiento($id_cuenta, "ingreso", $cantidad);
    header ("Location: ../views/admin.php");
}