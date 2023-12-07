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
    <section class="logo">
        <img src="../../public/images/Logo.svg" alt="">
        <h1>BANCORIA</h1>
        <p>Invierte en tranquilidad</p>
    </section>
    <article class="contenedor-form">
        <section class="titulo-form">
            <h1>Introduce tus datos</h1>
        </section>
        <section class="casillas-form">
            <form action="php/validador.php" id="registrarUser" method="post">
                <div class="">
                    <label for="dni" class="">DNI</label>
                    <input type="text" class="" name="dni" id="dni" required>
                </div>
                <div class="">
                    <label for="password" class="">Contraseña</label>
                    <input type="password" class="" name="password" id="password" required>
                </div>
                <input type="submit" value="Iniciar sesión">
            </form>
        </section>
    </article>
</body>

</html>