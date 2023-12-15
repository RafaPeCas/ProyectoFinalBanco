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
    <article id="datosUsuario" class="">
        <?php
        include_once("../controllers/usuarioController.php");
        $controladorUsuarios = new UsuarioController();
        $resultadoUsuarios = $controladorUsuarios->mostrarUsuarios();
        ?>
        <section class="contenedorFormulario">
            <div class="botonesTitulo">
                <h1>Datos Usuarios</h1>
            </div>
        </section>
        <section id="contenedorTabla">
            <?php
            if (isset($resultadoUsuarios) && is_array($resultadoUsuarios) && count($resultadoUsuarios) > 0) {
                echo "<table id='tablaPeticiones'>
                <thead>
                    <tr>
                        <th>ID usuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Fecha de nacimiento</th>
                        <th>Dirección</th>
                        <th>Cp</th>
                        <th>Ciudad</th>
                        <th>Provincia</th>
                        <th>País</th>
                        <th>Fecha de registro</th>";
                echo "</tr></thead><tbody>";

                foreach ($resultadoUsuarios as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_usuario'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['apellidos'] . "</td>";
                    echo "<td>" . $fila['DNI'] . "</td>";
                    echo "<td>" . $fila['email'] . "</td>";
                    echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
                    echo "<td>" . $fila['direccion'] . "</td>";
                    echo "<td>" . $fila['cp'] . "</td>";
                    echo "<td>" . $fila['ciudad'] . "</td>";
                    echo "<td>" . $fila['provincia'] . "</td>";
                    echo "<td>" . $fila['pais'] . "</td>";
                    echo "<td>" . $fila['fecha_registro'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            }
            ?>
        </section>
    </article>

    <div class="ventanaChat">
        <div class="chat">
            <div class="mensajes">
                <?php
                include_once("../controllers/chatController.php");
                $controlador = new ChatController();
                $mensajes = $controlador->mostrarMensajes();
                if (isset($mensajes) && is_array($mensajes) && count($mensajes) > 0) {

                    foreach ($mensajes as $mensaje) {
                        if ($mensaje["envio_admin"]) {
                            echo "<p class='recibido'>" . $mensaje["mensaje"] . "</p>";
                        } else {
                            echo "<p class='enviado'>" . $mensaje["mensaje"] . "</p>";
                        }
                    }
                }

                ?>
            </div>

            <form action="php/enviarMensaje.php" id="gug" method="post" class="">
                <input type="text" class="teclado" name="mensaje" id="mensaje" required>
                <input type="submit" value="enviar" class="g">
            </form>
        </div>
    </div>
</body>

</html>