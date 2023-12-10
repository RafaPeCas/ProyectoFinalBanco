<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?form=login");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/app.js"></script>
</head>

<body>
    <h1>BANCORIA</h1>
    <p>Invierte en tranquilidad</p>
    <img src="images/Logo.svg" alt="">
    <h1>Home</h1>
    <a href="../../public/index.php">Inicio</a>
</body>

</html>