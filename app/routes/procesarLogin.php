<?php
require_once '../controllers/usuarioController.php';
require_once '../controllers/cuentaController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $password = $_POST['password'];

    $controlador = new usuarioController();
    $inicioSesionExitoso = $controlador->iniciarSesion($dni, $password);

    if ($inicioSesionExitoso) {
        $controladorCuenta = new CuentaController();
        $resultadoCuenta = $controladorCuenta->iniciarSesion($_SESSION["usuario"]["id_usuario"]);
        if ($resultadoCuenta) {
            var_dump($_SESSION);
            if($_SESSION["usuario"]["isAdmin"]){
                 header("Location: ../views/admin.php");
                 exit();
            }
            header("Location: ../views/welcome.php");
        } else {
            header("Location: ../views/error.php");
        }
    } else {
        header("Location: ../views/login.php?error=true&form=login");
    }
}
