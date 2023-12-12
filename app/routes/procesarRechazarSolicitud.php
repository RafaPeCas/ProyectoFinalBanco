<?php
require_once '../controllers/solicitudPrestamoController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->cambiarEstado($_POST["id_peticion"], "rechazada");
}