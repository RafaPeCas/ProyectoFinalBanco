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
        $query = "SELECT * FROM prestamos WHERE id_cuenta = ? ORDER BY fecha_vencimiento ASC";
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

    
    public function actualizarPrestamo($cantidad, $id_prestamo){
        $estado = "Pendiente";
        if (hexdec($cantidad)<=0){
            $estado="Pagado";
        }

        $query = "UPDATE prestamos SET Cantidad = ?, estado= ? WHERE id_prestamo = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssi",  $cantidad, $estado, $id_prestamo);
        $stmt->execute();

        echo"El prestamo ha sido actualizado";
        return true;
    }

    public function mostrarTodosPrestamos(){
        $query = "SELECT * FROM prestamos";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();
        

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $prestamos[] = $fila;
            }
        }else{
            $prestamos = null;
        }

        return $prestamos;
        exit();
    }
}
