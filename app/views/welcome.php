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
    <?php
    include_once("header.php");
    ?>
    <main>
        <h1>BANCORIA</h1>
        <p>Invierte en tranquilidad</p>
        <img src="images/Logo.svg" alt="">
        <?php
        echo "<h1>Hola " . $_SESSION["usuario"]["nombre"] . " tu contraseña es " . $_SESSION["usuario"]["passsigin"] . "</h1>"
        ?>
        <a href="../../public/index.php">Inicio</a>
    </main>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>