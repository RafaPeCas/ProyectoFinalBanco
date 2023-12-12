<?php
require_once '../app/controllers/usuarioController.php';
require_once '../app/controllers/cuentaController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $password = $_POST['password'];

    $controlador = new usuarioController();
    $inicioSesionExitoso = $controlador->iniciarSesion($dni, $password);

    if ($inicioSesionExitoso) {
        $controladorCuenta = new CuentaController();
        $resultadoCuenta = $controladorCuenta->iniciarSesion($_SESSION["usuario"]["id_usuario"]);
        if ($resultadoCuenta) {
            header("Location: ../app/views/welcome.php");
        } else {
            header("Location: ../app/views/error.php");
        }
    } else {
        header("Location: ../app/views/login.php?error=true&form=login");
    }
}
