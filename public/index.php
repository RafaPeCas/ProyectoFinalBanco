<?php
session_start();
if (isset($_SESSION['logueado'])) {
    $_SESSION['logueado']=false;
    session_destroy(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="images/Favicon.ico" type="image/x-icon">
    <script defer src="js/app.js"></script>
</head>

<body class="index">
    <article class="inicio">
        <img src="images/LogoPajaro.png" alt="">
        <h1>BANCORIA</h1>
        <p>Invierte en tranquilidad, invierte en Bancoria.</p>
        <section class="sesion">
            <div class="standard-button">
                <a href="../app/views/login.php?form=registro">
                    <span class="text">Registrarse</span>
                    <span class="line -right"></span>
                    <span class="line -top"></span>
                    <span class="line -left"></span>
                    <span class="line -bottom"></span>
                </a>
            </div>
            <div class="standard-button">
                <a href="../app/views/login.php?form=login">
                    <span class="text">Iniciar sesión</span>
                    <span class="line -right"></span>
                    <span class="line -top"></span>
                    <span class="line -left"></span>
                    <span class="line -bottom"></span>
                </a>
            </div>
        </section>
    </article>

</body>

</html>