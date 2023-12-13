<?php
require_once '../controllers/solicitudPrestamoController.php';
require_once '../controllers/prestamoController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->cambiarEstado($_POST["id_peticion"], "aceptada");

    $controladorPrestamo = new PrestamoController();
    $controladorPrestamo->solicitarPrestamo($_SESSION["cuenta"]["id_cuenta"], $_POST["cantidad"]*100, $_POST["mensualidad"], $_POST["tiempo"]);
    header ("Location: ../views/admin.php");
}