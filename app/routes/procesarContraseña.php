<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $id_usuario = $_SESSION['usuario']['id_usuario'];

    $conexion = new mysqli("localhost", "root", "", "bancoriadb");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $sql = "UPDATE usuarios SET pass = ? WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $pass, $id_usuario);
        $stmt->execute();
        $stmt->close();
    }
    $conexion->close();
}
header("Location: ../views/welcome.php");
