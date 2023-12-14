<?php

require_once('../models/usuarioModel.php');

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
                return true;
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
                    return true;
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
        $_SESSION['logueado'] = true;

        if(strlen($_SESSION['usuario']["passsigin"])>4){
            unset($_SESSION['usuario']["passsigin"]);
        }
    }

    // public function recuperarPass($dni, $email){
    //     //WIP
    //     try{
    //         $verificacionExitosa = $this->modelo->verificarCuenta($dni, $email);

    //         if ($verificacionExitosa){
    //         }
    //     }catch (Exception $e) {
    //         echo "Cuenta inexistente: " . $e->getMessage();
    //         return false;
    //     }
    // }sss

    // Función retirada por falta de tiempo
}
