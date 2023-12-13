<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/admin.js"></script>
</head>

<body>
    <?php
    session_start();
    include_once("../controllers/solicitudPrestamoController.php");

    $pedidita = "pendiente";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["estadoSolicitud"])) {
        $pedidita = $_POST["estadoSolicitud"];
    }
    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->mostrarSolicitudes($pedidita);

    echo "<header class='headerSinBanner'>";
    include_once("header.php");
    echo "</header>";
    ?>

    <main>
        <form method="post" action="" id="formularioEstado">
            <button type="submit" name="estadoSolicitud" value="aceptada">Aceptados</button>
            <button type="submit" name="estadoSolicitud" value="pendiente">Pendientes</button>
            <button type="submit" name="estadoSolicitud" value="rechazada">Rechazados</button>
        </form>

        <?php
        if (isset($resultado) && is_array($resultado) && count($resultado) > 0) {
            echo "        <table>
                <tr>
                    <th>ID Peticion</th>
                    <th>ID Cuenta</th>
                    <th>Cantidad</th>
                    <th>Fecha Solicitud</th>
                    <th>Estado</th>
                    <th>Motivo</th>
                    <th></th>
                    <th></th>
                </tr>";
            foreach ($resultado as $fila) {
                echo "<tr>";
                echo "<td>" . $fila['id_peticion'] . "</td>";
                echo "<td>" . $fila['id_cuenta'] . "</td>";
                echo "<td>" . hexdec($fila['Cantidad']) . "</td>";
                echo "<td>" . $fila['fecha_solicitud'] . "</td>";
                echo "<td>" . $fila['estado'] . "</td>";
                echo "<td>" . $fila['motivo'] . "</td>";

                if ($fila['estado'] === "pendiente") {
                    echo "<td><button onclick='aceptar(" . $fila['id_peticion'] . ", " . $fila['Cantidad'] . ")' name='aprobar'>Aprobar</button></td>";

                    echo "<td><form method='post' action='../routes/procesarRechazarSolicitud.php'>";
                    echo "<input type='hidden' name='id_peticion' value='" . $fila['id_peticion'] . "'>";
                    echo "<button type='submit' name='rechazar'>Rechazar</button></form></td>";

                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            if ($pedidita === "pendiente") echo "<tr><td colspan='8'>No hay prestamos pendientes</td></tr>";
            if ($pedidita === "aceptada") echo "<tr><td colspan='8'>No hay prestamos aceptados</td></tr>";
            if ($pedidita === "rechazada") echo "<tr><td colspan='8'>No hay prestamos rechazados</td></tr>";

        }
        ?>

        <section class="ocultar" id="aceptarPrestamo">
            <h2>Aceptar préstamo</h2>

            <form action="../routes/procesarAceptarSolicitud.php" method="post">
                <label for="mensualidad">Mensualidad:</label>
                <input type="number" name="mensualidad" required>
                <label for="tiempo">Tiempo (en dias):</label>
                <input type="number" name="tiempo" required>
                <input type='hidden' name='id_peticion' id='id_peticion' value=''>
                <input type='hidden' name='cantidad' id='cantidad' value=''>
                <button type="submit">Enviar Solicitud</button>
            </form>
        </section>
        <a href="welcome.php">welcome</a>
    </main>
</body>

</html>