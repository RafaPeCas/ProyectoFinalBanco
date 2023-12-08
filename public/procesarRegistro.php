<?php
require_once '../app/controllers/usuarioController.php';

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
    );

    $controlador = new UsuarioController();
    $resultado = $controlador->registrarUsuario($datosUsuario);

    if ($resultado) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar el usuario";
    }
}
?>
