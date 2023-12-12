<?php

require_once('../app/models/solicitudPrestamoModel.php');

class SolicitudPrestamoController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new SolicitudPrestamosModel(new mysqli("localhost", "root", "", "bancoriadb"));
    }

    public function solicitarPrestamos($datosPrestamo)
    {
        try {
            if(!$this->modelo->haySolicitudPendiente()) {
                header("Location: ../app/views/prestamos.php?error=true");
                exit();
            }

            $registroSolicitud = $this->modelo->solicitarPrestamo($datosPrestamo);
            if ($registroSolicitud) {
                header("Location: ../app/views/welcome.php");
            } else {
                header("Location: ../app/views/error.php");
            }
        } catch (Exception $e) {

            header("Location: ../app/views/error.php");
        }
    }
}
