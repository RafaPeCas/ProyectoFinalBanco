<?php
class PrestamosModel
{

    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }


    public function crearNuevoPrestamo($idCuenta, $cantidad, $mensualidad, $tiempo)
    {
        $fechaSolicitud = date("Y-m-d H:i:s");

        $query = "INSERT INTO prestamos (id_cuenta, Cantidad, fecha_solicitud, mensualidad, tiempo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("isssi", $idCuenta, str_pad(dechex($cantidad*100), 2, '0', STR_PAD_LEFT), $fechaSolicitud, $mensualidad, $tiempo);

        $resultado = $stmt->execute();

        return $resultado;
    }
   
}
