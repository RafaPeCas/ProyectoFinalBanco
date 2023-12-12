<?php

session_start();
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "bancoriadb";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



$nuevoFavorito = trim($_GET["fav"]); 
$dineros = trim($_GET["dineros"]);
$puta = $_SESSION['usuario']['id_usuario'];

$sql = "UPDATE cuenta_bancaria SET favorito = '$nuevoFavorito' WHERE id_usuario = '$puta'";

$query = "UPDATE cuenta_bancaria SET favorito = ? WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss",$nuevoFavorito, $puta );
$resultado = $stmt->execute();

$stmt->close();

require_once '../app/controllers/cuentaController.php';

$controller = new CuentaController();

$controller->iniciarSesion($puta);

header("Location: ../views/welcome.php");

echo "Conexión exitosa";
