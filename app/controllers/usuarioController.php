<?php

require_once('../app/models/usuarioModel.php');

class UsuarioController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new UsuarioModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function iniciarSesion($dni, $password)
    {
        try {
            $usuario = $this->modelo->verificarCredenciales($dni, $password);

            if ($usuario) {
                $this->iniciarSesionUsuario($usuario);
                header("Location: ../app/views/home.php");
                exit();
            }
        } catch (Exception $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
        }
    }

    public function registrarUsuario($datosUsuario)
    {
        try {
            $registroExitoso = $this->modelo->registrarUsuario($datosUsuario);

            if ($registroExitoso) {
                $usuario = $this->modelo->verificarCredenciales($datosUsuario['dniRegistro'], $datosUsuario['pass']);
                
                if ($usuario) {
                    $this->iniciarSesionUsuario($usuario);
                    header("Location: ../app/views/welcome.php");
                    exit();
                }
            } else {
                echo "Error al registrar usuario.";
                return false;
            }
        } catch (Exception $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
            return false;
        }
    }

    private function iniciarSesionUsuario($usuario)
    {
        session_start();
        $_SESSION['usuario'] = $usuario;

    }
}

