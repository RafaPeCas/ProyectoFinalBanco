<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/app.js"></script>
    <script defer src="../../public/js/chat.js"></script>
</head>
<main>
    <header class="headerSinBanner">
        <?php
        session_start();
        include_once("header.php");
        ?>
    </header>

    <body>
        <article id="datosUsuario" class="ocultar">
            <?php
            include_once("../controllers/usuarioController.php");
            $controladorUsuarios = new UsuarioController();
            $resultadoUsuarios = $controladorUsuarios->mostrarUsuarios();
            ?>
            <?php
            echo "<p hidden id='impresora'>" . $_SESSION["usuario"]["isAdmin"] . "</p>";

            if ($_SESSION["usuario"]["isAdmin"]) {
                echo "<section class='contenedorFormulario'>
                <div class='botonesTitulo'>
                    <h1>Datos Usuarios</h1>
                </div>
            </section>";
            }
            ?>
            <section id="contenedorTabla">
                <?php
                if ($_SESSION["usuario"]["isAdmin"]) {
                    if (isset($resultadoUsuarios) && is_array($resultadoUsuarios) && count($resultadoUsuarios) > 0) {
                        echo "<table id='tablaPeticiones'>
                <thead>
                    <tr>
                        <th>ID usuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th></th>";
                        echo "</tr></thead><tbody>";

                        foreach ($resultadoUsuarios as $fila) {
                            echo "<tr>";
                            echo "<td>" . $fila['id_usuario'] . "</td>";
                            echo "<td>" . $fila['nombre'] . "</td>";
                            echo "<td>" . $fila['apellidos'] . "</td>";
                            echo "<td>" . $fila['DNI'] . "</td>";
                            echo "<td>" . $fila['email'] . "</td>";
                            echo "<td><form method='post'>
                    <button type='submit' name='id_usuario' value='" . $fila['id_usuario'] . "'> comenzar chat </button>
                    </form></td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table>";
                    }
                }

                ?>
            </section>
        </article>

        <div id="chatContainer" class="ventanaChat">
            <div class="chat">
                <div class="msgContainer">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["chat"])) {
                        $id_usuarioM = $_GET["chat"];
                    } else {
                        $id_usuarioM = $_SESSION["usuario"]["id_usuario"];
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_usuario"])) {
                        $id_usuarioM = $_POST["id_usuario"];
                    }
                    echo "<p hidden id='nevera'>$id_usuarioM</p>";
                    include_once("../controllers/chatController.php");
                    $controlador = new ChatController();
                    $mensajes = $controlador->mostrarMensajes();
                    if (isset($mensajes) && is_array($mensajes) && count($mensajes) > 0) {

                        foreach ($mensajes as $mensaje) {
                            if ($id_usuarioM == $mensaje["id_usuario"]) {
                                if ($mensaje["envio_admin"]) {
                                    if ($_SESSION["usuario"]["isAdmin"]) {
                                        echo "<p class='enviado'>" . $mensaje["mensaje"] . "</p>";
                                    } else {
                                        echo "<p class='recibido'>" . $mensaje["mensaje"] . "</p>";
                                    }
                                } else {
                                    if (!$_SESSION["usuario"]["isAdmin"]) {
                                        echo "<p class='enviado'>" . $mensaje["mensaje"] . "</p>";
                                    } else {
                                        echo "<p class='recibido'>" . $mensaje["mensaje"] . "</p>";
                                    }
                                }
                            }
                        }
                    }

                    ?>
                </div>

                <form action="../routes/procesarEnvioMensaje.php" method="post">
                    <div class="chatControls">
                        <input type="text" class="keyboard" name="mensaje" id="mensaje" required>
                        <input type="submit" value="enviar" class="sendButton">
                    </div>

                    <input hidden type="text" id="formularioId" name="id_usuario" value="">
                </form>
            </div>
        </div>
    </body>


</main>
<footer>
    <?php
    include_once("footer.php")
    ?>
</footer>

</html>