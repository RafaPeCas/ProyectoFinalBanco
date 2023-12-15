<?php
class ChatModel
{

    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }

    public function mostrarMensajes()
    {
        $query = "SELECT mensaje, id_usuario, envio_admin FROM mensaje_chat ORDER BY fecha_envio ASC";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $mensajes[] = $fila;
            }
        } else {
            $mensajes = "";
        }

        return $mensajes;
        exit();
    }

    public function guardarMensaje($mensaje, $id_usuario, $envio_admin)
    {
        $fecha_envio = date("Y-m-d H:i:s");
        $query = "INSERT INTO mensaje_chat (mensaje, fecha_envio, id_usuario, envio_admin) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("ssii", $mensaje, $fecha_envio, $id_usuario, $envio_admin);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Mensaje insertado correctamente.";
            return true;
            exit();
        } else {
            echo "Error al insertar el mensaje: " . $stmt->error;
            return false;
            exit();
        }

        $stmt->close();
        $this->conexion->close();
    }
}
