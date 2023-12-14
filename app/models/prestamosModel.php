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
        echo $mensualidad . " antes de entrar <br>";
        $fechaSolicitud = date("Y-m-d H:i:s");
        $fechaObjeto = new DateTime($fechaSolicitud);
        $tiempo = intval($tiempo);
        $fechaObjeto->add(new DateInterval("P{$tiempo}D"));
        $fechaVencimiento = $fechaObjeto->format('Y-m-d H:i:s');

        $query = "INSERT INTO prestamos (id_cuenta, Cantidad, fecha_solicitud, fecha_vencimiento, mensualidad, tiempo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("issssi", $idCuenta, $cantidad, $fechaSolicitud, $fechaVencimiento, $mensualidad, $tiempo);

        $stmt->execute();

        return true;
    }

    public function mostrarPrestamos($idCuenta)
    {
        $query = "SELECT * FROM prestamos WHERE id_cuenta = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $idCuenta);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Error al obtener los préstamos: " . $this->conexion->error);
        }

        $prestamos = array();

        while ($row = $result->fetch_assoc()) {
            $prestamos[] = $row;
        }

        return $prestamos;
    }
}
