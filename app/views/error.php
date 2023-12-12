<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/error.js"></script>
</head>

<body class="errorBg">
    <div>
        <h1>Parece que ha habido un error</h1>
        <img src="../../public/images/errorLogo.png" alt="">
        <h2 id="countdown">Pero tranquilo, en 5 segundos volverás al inicio</h2>
    </div>
</body>

</html>

<?php
session_start();
if (isset($_SESSION['logueado'])) {
    $_SESSION['logueado'] = false;
    session_destroy();
}
?>