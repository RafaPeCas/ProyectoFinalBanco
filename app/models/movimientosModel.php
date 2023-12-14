<?php
class MovimientosModel
{

    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }


    public function crearNuevoMovimiento($idCuenta, $tipoMovimiento, $monto, $fechaMovimiento)
    {

        $query = "INSERT INTO movimientos (id_cuenta, tipo_movimiento, monto, fecha_hora) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("isss", $idCuenta, $tipoMovimiento, $monto, $fechaMovimiento);

        $stmt->execute();
        $this->conexion->close();

        return true;
    }

    public function mostrarMovimientos($idCuenta)
    {
        $query = "SELECT * FROM movimientos WHERE id_cuenta = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $idCuenta);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            die("Error al obtener las peticiones de préstamos: " . $this->conexion->error);
        }

        $peticiones = array();

        while ($row = $result->fetch_assoc()) {
            $peticiones[] = $row;
        }

        return $peticiones;
        $this->conexion->close();
    }
}
