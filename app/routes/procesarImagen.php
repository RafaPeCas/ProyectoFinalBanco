<?php
session_start();

if (isset($_FILES['imagen'])) {
    $imagen = $_FILES['imagen'];

    if ($imagen['error'] === 0) {
        $id_usuario = $_SESSION['usuario']['id_usuario'];
        $nombre = $imagen['name'];
        $tipo = $imagen['type'];
        $tamanio = $imagen['size'];
        $temporal = $imagen['tmp_name'];

        $ruta_destino = '../../public/images/' . $nombre;
        move_uploaded_file($temporal, $ruta_destino);

        $conexion = new mysqli("localhost", "root", "", "bancoriadb");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $sql = "UPDATE usuarios SET foto_perfil = ? WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("si", $nombre, $id_usuario);
            $stmt->execute();

            echo "Imagen subida y ruta guardada en la base de datos.";

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conexion->error;
        }



        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        $_SESSION['usuario'] = $usuario;
        $conexion->close();
    } else {
        echo "Error al subir la imagen: " . $imagen['error'];
    }
    header("Location: ../views/welcome.php");
}
?>
