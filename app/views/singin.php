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
        <section class="signin-form">
            <form action="php/registro.php" id="registrarUser" method="post" class="">
                <div class="nombre d-flex justify-content-around">
                    <div class="">
                        <label for="username" class="form-label">Nombre</label>
                        <input type="text" class="" name="username" id="username" required>
                    </div>
                    <div class="">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="" name="apellidos" id="apellidos" required>
                    </div>
                </div>
                <div class="nombre d-flex justify-content-around">
                    <div class="">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="" name="dni" id="dni" onclick="validarDNI()" required>
                    </div>
                    <div class="">
                        <label for="fNac" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="" name="fNac" id="fNac" required>
                    </div>
                </div>

                <div class="">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="" name="email" id="email" required>
                </div>

                <div class="">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="" name="direccion" id="direccion" required>
                </div>
                <div class="">
                    <label for="cp" class="form-label">Código postal</label>
                    <input type="number" class="" name="cp" id="cp" required>
                </div>
                <div class="">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="" name="ciudad" id="ciudad" required>
                </div>
                <div class="">
                    <label for="provincia" class="form-label">Provincia</label>
                    <input type="text" class="" name="provincia" id="provincia" required>
                </div>
                <div class="">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" class="" name="pais" id="pais" required>
                </div>
                <input type="submit" value="Crear cuenta">
            </form>
        </section>
    </article>
</body>

</html>