<?php
session_start();
if (!$_SESSION['logueado']) {
    header("Location: login.php?form=login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/error.js"></script>
</head>
<body>

  <h2>Solicitud de Préstamo</h2>

    <?php
    echo $_SESSION["cuenta"]["saldo"];
    if (isset($_GET["error"])){
        echo "<h1>ERROR AL PEDIR EL PRESTAMO ya hay una solicitud pendiente</h1>";
      
    }
    ?>

  <form action="../routes/procesarSolicitudPrestamo.php" method="post">

    <label for="motivo">Motivo del Préstamo:</label>
    <input type="text" id="motivo" name="motivo" required>
    <br>

    <label for="cantidad">Cantidad del Préstamo:</label>
    <input type="number" id="cantidad" name="cantidad" min="1" step="1" required>
    <br>

    <input type="submit" value="Enviar Solicitud">
  </form>

<a href="welcome.php">asdas</a>
  
</body>
</html>
