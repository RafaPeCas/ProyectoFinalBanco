<?php
require_once '../controllers/chatController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $mensaje = $_POST["mensaje"];
    $id_usuario=$_POST["id_usuario"];

    if($_SESSION["usuario"]["isAdmin"]){
        $envio_admin=true;
    }else{
        $envio_admin=false;
    }
    
    $controladorChat = new ChatController();
    $controladorChat->enviarMensaje($mensaje,$id_usuario, $envio_admin);

}
