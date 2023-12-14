<?php
require_once '../controllers/solicitudPrestamoController.php';
require_once '../controllers/prestamoController.php';
require_once '../controllers/cuentaController.php';
require_once '../controllers/movimientosController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_peticion=$_POST["id_peticion"];
    $cantidad= $_POST["cantidad"];
    $mensualidad= $_POST["mensualidad"]*100;
    $id_emisor=$_POST["id_emisor"];
    $tiempo = $_POST["tiempo"];

    echo $id_emisor;
    
    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->cambiarEstado($id_peticion, "aceptada");

    $controladorPrestamo = new PrestamoController();
    $controladorPrestamo->solicitarPrestamo($id_emisor, $cantidad,$mensualidad, $tiempo);

    $cuentaController = new CuentaController();
    $cuentaController->actualizarSaldo($id_emisor, $cantidad, "ingreso");

    $movimientoController = new MovimientosController();
    $movimientoController->crearNuevoMovimiento($id_emisor, "Ingreso Préstamo", $cantidad);
    header ("Location: ../views/admin.php");
}