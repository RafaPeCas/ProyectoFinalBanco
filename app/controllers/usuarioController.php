<?php

require_once('../app/models/usuarioModel.php');

class UsuarioController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new UsuarioModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function registrarUsuario($datosUsuario)
    {
        try {

            return $this->modelo->registrarUsuario($datosUsuario);
        } catch (Exception $e) {

            echo "Error al registrar usuario: " . $e->getMessage();
            return false;
        }
    }

    public function iniciarSesion($dni, $password)
    {
        try {
            $usuario = $this->modelo->verificarCredenciales($dni, $password);

            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;

                header("Location: inicio.php");
                exit();
            }
        } catch (Exception $e) {

            echo "Error al iniciar sesión: " . $e->getMessage();
        }
    }
}
