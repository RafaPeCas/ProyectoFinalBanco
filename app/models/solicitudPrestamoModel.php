<?php
class SolicitudPrestamosModel
{

    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }

    public function solicitarPrestamo($datosPrestamo)
    {
        $estado = "pendiente";
        $fecha_solicitud = date("Y-m-d H:i:s");
        $query = "INSERT INTO peticion_prestamos (id_cuenta, cantidad, fecha_solicitud, estado, motivo) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("issss", $_SESSION["cuenta"]["id_cuenta"], $datosPrestamo["cantidad"], $fecha_solicitud, $estado, $datosPrestamo["motivo"]);
        $stmt->execute();

        return true;
    }

    public function haySolicitudPendiente()
    {
        $estado = "pendiente";

        $verificarQuery = "SELECT COUNT(*) as count FROM peticion_prestamos WHERE id_cuenta = ? AND estado = ?";
        $verificarStmt = $this->conexion->prepare($verificarQuery);
        $verificarStmt->bind_param("is", $_SESSION["cuenta"]["id_cuenta"], $estado);
        $verificarStmt->execute();
        $result = $verificarStmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            return false;
        }
        return true;
    }

    public function mostrarSolicitudes($estado)
    {
        $query = "SELECT * FROM peticion_prestamos WHERE estado = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $estado);
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
    }

    public function cambiarEstado($id_peticion, $estado)
    {
        $query = "UPDATE peticion_prestamos SET estado = ? WHERE id_peticion = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("si",  $estado, $id_peticion);
        $stmt->execute();
        return true;
    }
}
