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

    <header class="headerSinBanner">
        <?php
        session_start();
        include_once("header.php");
        ?>
    </header>
    <main>
        <h2>Modificar Usuario</h2>
        <?php
        
        if (isset($_SESSION["usuario"]["passsigin"]))
            echo " Su contraseña por defecto es: " . $_SESSION["usuario"]["passsigin"] . " cambiela wey";
        ?>
        <form action="../routes/procesarActualizacionUsuario.php" method="post">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $_SESSION["usuario"]["nombre"] ?>" required>

            <label for="apellido1">Apellido1:</label>
            <input type="text" name="apellido1" value="<?php echo strstr($_SESSION["usuario"]["apellidos"], ' ', true) ?>" required>

            <label for="apellido2">Apellido2:</label>
            <input type="text" name="apellido2" value="<?php echo trim(strrchr($_SESSION["usuario"]["apellidos"], ' ')) ?>" required>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" value="<?php echo $_SESSION["usuario"]["direccion"] ?>" required>

            <label for="cp">Código Postal:</label>
            <input type="text" name="cp" value="<?php echo $_SESSION["usuario"]["cp"] ?>" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" value="<?php echo $_SESSION["usuario"]["ciudad"] ?>" required>

            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" value="<?php echo $_SESSION["usuario"]["provincia"] ?>" required>

            <label for="pais">País:</label>
            <input type="text" name="pais" value="<?php echo $_SESSION["usuario"]["pais"] ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
        <h2>Subir Imagen</h2>
        <form action="../routes/procesarImagen.php" method="post" enctype="multipart/form-data">
            <label for="imagen">Selecciona una imagen:</label>
            <input type="file" name="imagen" accept="image/*" required>
            <br>
            <button type="submit">Subir Imagen</button>
        </form>

        <form action="../routes/procesarContraseña.php" method="post">
            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" required>
        </form>
    </main>

</body>

</html>