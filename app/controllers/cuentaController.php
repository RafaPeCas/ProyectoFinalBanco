<?php

require_once('../models/cuentaModel.php');

class CuentaController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new CuentaModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function iniciarSesion($id_usuario)
    {
        try {
            $cuenta = $this->modelo->rescatarDatosCuenta($id_usuario);

            if ($cuenta) {
                $this->iniciarSesionCuenta($id_usuario);
                return true;
            }
        } catch (Exception $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
        }
    }

    public function registrarCuenta($id_usuario)
    {
        try {
            $registroCuentaExitoso = $this->modelo->registrarCuenta($id_usuario);
            if ($registroCuentaExitoso) {
                $this->iniciarSesionCuenta($id_usuario);
                return true;
            } else {

                echo "Error al registrar la cuenta.";
                return false;
            }
        } catch (Exception $e) {

            echo "Error al registrar la cuenta: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarSaldo($idCuenta, $saldoARestar, $tipoMovimiento)
    {
        $this->iniciarSesionCuentaUsuario($idCuenta);
        if ($tipoMovimiento === "gasto") {
            $saldoFinal = hexdec($_SESSION["cuenta"]["saldo"]) - $saldoARestar;
        } else {
            $saldoFinal = hexdec($_SESSION["cuenta"]["saldo"]) + $saldoARestar;
        }

        $saldoFinal = dechex($saldoFinal);
        $this->modelo->actualizarSaldo($idCuenta, $saldoFinal);
        $this->iniciarSesionCuentaUsuario($idCuenta);
        return true;
    }

    private function iniciarSesionCuenta($id_usuario)
    {
        $cuenta = $this->modelo->rescatarDatosCuenta($id_usuario);
        $_SESSION['cuenta'] = $cuenta;
    }

    private function iniciarSesionCuentaUsuario($idCuenta){
        $cuenta = $this->modelo->rescatarDatosCuentaUsuario($idCuenta);
        $_SESSION['cuenta'] = $cuenta;
    }
}
