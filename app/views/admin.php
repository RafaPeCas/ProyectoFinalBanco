<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/admin.js"></script>
    <script defer src="../../public/js/app.js"></script>
    <script defer src="../../public/js/comprobar-formulario-aceptar-prestamo.js"></script>
</head>

<body>
    <?php
    session_start();
    include_once("../controllers/solicitudPrestamoController.php");

    $pedidita = "pendiente";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["estadoSolicitud"])) {
        $pedidita = $_POST["estadoSolicitud"];
        echo "<p hidden id='estadoPedidita'>" . $pedidita . "";
    }
    $controlador = new SolicitudPrestamoController();
    $resultado = $controlador->mostrarSolicitudes($pedidita);

    echo "<header class='headerSinBanner'>";
    include_once("header.php");
    echo "</header>";
    ?>

    <main id="adminMain">
        <section class="contenedorFormulario">
            <h1>Solicitudes de prestamo</h1>
            <form method="post" id="formularioEstado">
                <button type="submit" name="estadoSolicitud" class="" value="aceptada" id="botonAceptados">Aceptados</button>
                <button type="submit" name="estadoSolicitud" class="seleccionado" value="pendiente" id="botonPendientes">Pendientes</button>
                <button type="submit" name="estadoSolicitud" class="" value="rechazada" id="botonRechazados">Rechazados</button>
            </form>
        </section>
        <section id="contenedorTabla">
            <?php
            if (isset($resultado) && is_array($resultado) && count($resultado) > 0) {
                echo "<table id='tablaPeticiones'>
                <thead>
                    <tr>
                        <th>ID Peticion</th>
                        <th>ID Cuenta</th>
                        <th>Cantidad</th>
                        <th>Fecha Solicitud</th>
                        <th>Estado</th>
                        <th>Motivo</th>";
                if ($pedidita === "pendiente") {
                    echo "<th></th>
                        <th></th>";
                }
                echo "</tr></thead><tbody>";

                foreach ($resultado as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_peticion'] . "</td>";
                    echo "<td>" . $fila['id_cuenta'] . "</td>";
                    echo "<td>" . number_format(hexdec($fila['Cantidad'])/100, 2, '.', '.') . "€</td>";
                    echo "<td>" . $fila['fecha_solicitud'] . "</td>";
                    echo "<td>" . $fila['estado'] . "</td>";
                    echo "<td>" . $fila['motivo'] . "</td>";

                    if ($fila['estado'] === "pendiente") {
                        echo "<td><button onclick='aceptar(" . $fila['id_peticion'] . ", " . hexdec($fila['Cantidad']) . "," . $fila['id_cuenta'] . ")' name='aprobar'>Aprobar</button></td>";

                        echo "<td><form method='post' action='../routes/procesarRechazarSolicitud.php'>";
                        echo "<input type='hidden' name='id_peticion' value='" . $fila['id_peticion'] . "'>";
                        echo "<button type='submit' name='rechazar'>Rechazar</button></form></td>";

                        echo "</tr>";
                    }
                }

                echo "</tbody></table>";
            } else {
                if ($pedidita === "pendiente") echo "<tr><td colspan='8'><h1 class='registroVacio'>No hay prestamos pendientes</h1></td></tr>";
                if ($pedidita === "aceptada") echo "<tr><td colspan='8'><h1 class='registroVacio'>No hay prestamos aceptados</h1></td></tr>";
                if ($pedidita === "rechazada") echo "<tr><td colspan='8'><h1 class='registroVacio'>No hay prestamos rechazados</h1></td></tr>";
            }
            ?>
        </section>
        <section class="ocultar" id="aceptarPrestamo">
            <div class="centrar">
                <section id="formAceptarWrapper">
                    <h1>Aceptar préstamo</h1>

                    <form action="../routes/procesarAceptarSolicitud.php" name="prestamo" method="post">
                        <div class="form-item">
                            <label for="mensualidad" id="mensualidad">Mensualidad:</label>
                            <input type="double" id="mensualidad" name="mensualidad">
                        </div>
                        <div class="form-item">
                            <label for="tiempo" id="tiempo">Tiempo (en dias):</label>
                            <input type="number" id="tiempo" name="tiempo" >
                            <input type='hidden' name='id_peticion' id='id_peticion' value=''>
                            <input type='hidden' name='cantidad' id='cantidad' value=''>
                            <input type='hidden' name='id_emisor' id='id_emisor' value=''>
                        </div>

                        <button class="boton" type="submit">Aprobar préstamo</button>
                    </form>
                </section>
            </div>

        </section>
    </main>
</body>

</html>