<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/app.js"></script>
</head>
<body>
    <h1>BANCORIA</h1>
    <p>Invierte en tranquilidad</p>
    <img src="images/Logo.svg" alt="">
    <?php
    session_start();
    echo "<h1>Hola ". $_SESSION["usuario"]["nombre"]. " tu contraseña es " . $_SESSION["usuario"]["passsigin"] ."</h1>"
    ?>
    <a href="../../public/index.php">Inicio</a>
</body>
</html>