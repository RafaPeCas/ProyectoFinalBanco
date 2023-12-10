<?php

require_once('../app/models/cuentaModel.php');

class CuentaController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new CuentaModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function registrarCuenta($id_usuario)
    {
        try {
            $registroCuentaExitoso = $this->modelo->registrarCuenta($id_usuario);

            if ($registroCuentaExitoso) {
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


}
