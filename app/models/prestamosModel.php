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
        $fechaObjeto = new DateTime($fechaSolicitud);
        $fechaObjeto->add(new DateInterval("P{$tiempo}D"));
        $fechaVencimiento = $fechaObjeto->format('Y-m-d H:i:s');

        $query = "INSERT INTO prestamos (id_cuenta, Cantidad, fecha_solicitud, fecha_vencimiento, mensualidad, tiempo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("issssi", $idCuenta, $cantidad, $fechaSolicitud, $fechaVencimiento, $mensualidad , $tiempo);

        $stmt->execute();

        return true;
    }
}
