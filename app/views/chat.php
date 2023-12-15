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
    <h1>Chattoria</h1>
    <div class="ventanaChat">
        <div class="chat">
            <div class="mensajes">
                <?php
                // include("../Controller/queryChat.php");
                ?>
            </div>

            <form action="php/enviarMensaje.php" id="gug" method="post" class="d-flex position-relative align-items-end justify-content-end">
                <input type="text" class="form-control teclado" name="mensaje" id="mensaje" required>
                <input type="submit" value="enviar" class="g">
            </form>
        </div>
    </div>
</body>

</html>