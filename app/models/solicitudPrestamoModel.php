<?php
class SolicitudPrestamosModel
{
   
    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }

    public function solicitarPrestamo($datosPrestamo){
        $estado="pendiente";
        $fecha_solicitud=date("Y-m-d H:i:s");
        $query = "INSERT INTO peticion_prestamos (id_cuenta, cantidad, fecha_solicitud, estado, motivo) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("iisss", $_SESSION["cuenta"]["id_cuenta"], $datosPrestamo["cantidad"], $fecha_solicitud, $estado, $datosPrestamo["motivo"]);
        $stmt->execute();

        return true;
    }

    public function haySolicitudPendiente() {
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
    

   
}
