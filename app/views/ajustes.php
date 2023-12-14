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
        <form action="procesar_modificacion.php" method="post" style="display: flex; flex-direction:column; background: green; color: white; font-size:30px;">
            <input type="hidden" name="id_usuario" value="ID_DEL_USUARIO_A_MODIFICAR">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" required>

            <label for="DNI">DNI:</label>
            <input type="text" name="DNI" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required>

            <label for="cp">Código Postal:</label>
            <input type="text" name="cp" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" required>

            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" required>

            <label for="pais">País:</label>
            <input type="text" name="pais" required>

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