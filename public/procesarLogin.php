<?php
require_once '../app/controllers/usuarioController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $password = $_POST['password'];

    $controlador = new usuarioController();
    $inicioSesionExitoso = $controlador->iniciarSesion($dni, $password);

    if ($inicioSesionExitoso) {
        header("Location: ../app/views/home.php");
        exit();
    } else {
        header("Location: ../app/views/login.php?error=true&form=login");
    }
}
