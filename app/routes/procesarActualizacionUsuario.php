<?php
require_once '../controllers/usuarioController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datosUsuario = array(
        'nombre' => $_POST['nombre'],
        'apellido1' => $_POST['apellido1'],
        'apellido2' => $_POST['apellido2'],
        'direccion' => $_POST['direccion'],
        'cp' => $_POST['cp'],
        'ciudad' => $_POST['ciudad'],
        'provincia' => $_POST['provincia'],
        'pais' => $_POST['pais'],
    );

    $controladorUsuario = new UsuarioController();
    $resultado = $controladorUsuario->actualizarUsuario($datosUsuario);

}
