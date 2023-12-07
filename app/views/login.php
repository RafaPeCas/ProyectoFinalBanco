<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/comprobador-formulario.js"></script>
</head>

<body class="login">
    <article class="login-form">
        <div id="formWrapper">
            <div class="logo">
                <img src="../../public/images/Logo.svg" alt="">
            </div>
            <form action="" method="post" name="login">
                <div class="form-item">
                    <p class="formLabel">DNI:</p>
                    <input type="text" name="dni" id="dni" maxlength="9" class="form-style" placeholder="12345678X"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">Contraseña:</p>
                    <input type="password" name="password" id="password" class="form-style" placeholder="Contraseña"/>
                    <p><a href="#">¿Ha olvidado su contraseña?</a></p>
                </div>
                <div class="form-item">
                    <p class="">¿No tienes cuenta? <a href="#">Registrate</a></p>
                    <input type="submit" name="btn" id="btn" class="login-button" value="Enviar">
                </div>
            </form>
        </div>
    </article>
</body>

</html>