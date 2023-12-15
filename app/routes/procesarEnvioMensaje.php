<?php
require_once '../controllers/chatController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = $_POST["mensaje"];
    $envio_admin=$_POST["envio_admin"];
    $id_usuario=$_POST["id_usuario"];
    
    $controladorUsuario = new UsuarioController();
    $resultado = $controladorUsuario->actualizarUsuario($datosUsuario);

}
