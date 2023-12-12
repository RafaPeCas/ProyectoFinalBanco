<?php
require_once '../controllers/solicitudPrestamoController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datosPrestamo = array(
        'cantidad' => $_POST['cantidad'],
        'motivo' => $_POST['motivo'],
    );

    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->solicitarPrestamos($datosPrestamo);
}