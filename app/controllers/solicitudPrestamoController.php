<?php

require_once('../models/solicitudPrestamoModel.php');

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
                header("Location: ../views/prestamos.php?error=true");
                exit();
            }

            $registroSolicitud = $this->modelo->solicitarPrestamo($datosPrestamo);
            if ($registroSolicitud) {
                header("Location: ../views/welcome.php");
            } else {
                header("Location: ../views/error.php");
            }
        } catch (Exception $e) {

            header("Location: ../views/error.php");
        }
    }

    public function mostrarSolicitudes($estado){
        $solicitudes = $this->modelo->mostrarSolicitudes($estado);
        return $solicitudes;
    }

    public function cambiarEstado($id_peticion, $estado){
        $this->modelo->cambiarEstado($id_peticion, $estado);
        header("Location: ../views/admin.php");
        return true; 
    }
}
