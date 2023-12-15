<?php

require_once('../models/chatModel.php');

class ChatController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new ChatModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function mostrarMensajes(){
        $mensajes = $this->modelo->mostrarMensajes();
        return $mensajes;
    }

    public function enviarMensaje($mensaje, $id_usuario, $envio_admin){
        $this->modelo->guardarMensaje($mensaje, $id_usuario, $envio_admin);
        header ("Location: ../views/chat.php");
    }

}
