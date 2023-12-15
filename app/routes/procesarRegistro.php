<?php
require_once '../controllers/usuarioController.php';
require_once '../controllers/cuentaController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datosUsuario = array(
        'nombre' => $_POST['nombre'],
        'apellido1' => $_POST['apellido1'],
        'apellido2' => $_POST['apellido2'],
        'dniRegistro' => $_POST['dniRegistro'],
        'fNac' => $_POST['fNac'],
        'email' => $_POST['email'],
        'direccion' => $_POST['direccion'],
        'localidad' => $_POST['localidad'],
        'cp' => $_POST['cp'],
        'provincia' => $_POST['provincia'],
        'pais' => $_POST['pais'],
        'pass' => rand(1000, 9999),
    );

    $controladorUsuario = new UsuarioController();
    $resultado = $controladorUsuario->registrarUsuario($datosUsuario);

    if ($resultado) {

        $controladorCuenta = new CuentaController();
        $resultadoCuenta = $controladorCuenta->registrarCuenta($_SESSION["usuario"]["id_usuario"]);
        if ($resultadoCuenta) {
            header("Location: ../views/welcome.php?registro=true");
        } else {
            header("Location: ../views/error.php");
        }
    } else {
        header("Location: ../views/login.php?error=true&form=registro");
    }
}
