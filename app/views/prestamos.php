<?php
session_start();
if (!$_SESSION['logueado']) {
  header("Location: login.php?form=login");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bancoria</title>
  <link rel="stylesheet" href="../../public/css/styles.css">
  <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
  <script defer src="../../public/js/app.js"></script>
  <script defer src="../../public/js/comprobar-formulario-prestamo.js"></script>
</head>

<body>
  <?php
  echo "<header class='headerSinBanner'>";
  include_once("header.php");
  echo "</header>";
  ?>
  <main id='prestamosMain'>
    <div class='enunciado'>
      <h1 id='enunciadoPrestamos'>Préstamos</h1>
    </div>
    <?php
    echo "<p hidden id='dineroJS'>" . hexdec($_SESSION["cuenta"]["saldo"]) . "</p>";

    if (isset($_GET["error"])) {
      echo "<h1 class='error'>ERROR AL PEDIR EL PRESTAMO, ya hay una solicitud pendiente</h1>";
    }
    if (isset($_GET["acierto"])) {
      echo "<h1 class='correct'>Prestamo solicitado correctamente, esperando la confirmación de un administrador</h1>";
    }
    ?>
    <section id="contenedorContenedorTabla">
      <section id="contenedorTabla">
        <?php
        include_once("../controllers/PrestamoController.php");
        $controlador = new PrestamoController();
        $resultado = $controlador->mostrarPrestamos($_SESSION["cuenta"]["id_usuario"]);

        if (isset($resultado) && is_array($resultado) && count($resultado) > 0) {
          echo "<table id='tablaPeticiones'>
        <thead>
            <tr>
                <th>ID Peticion</th>
                <th>ID Cuenta</th>
                <th>Cantidad</th>
                <th>Fecha Solicitud</th>
                <th>Fecha Vencimiento</th>
                <th>Mensualidad</th>
                <th>Estado</th>
                <th></th>";
          echo "</tr></thead><tbody>";

          foreach ($resultado as $fila) {
            echo "<tr>";
            echo "<td>" . $fila['id_prestamo'] . "</td>";
            echo "<td>" . $fila['id_cuenta'] . "</td>";
            echo "<td>" . number_format(hexdec($fila['Cantidad']) / 100, 2, '.', '.') . "€</td>";
            echo "<td>" . $fila['fecha_solicitud'] . "</td>";
            echo "<td>" . $fila['fecha_vencimiento'] . "</td>";
            echo "<td>" . number_format(hexdec($fila['mensualidad']) / 100, 2, '.', '.') . "€</td>";
            echo "<td>" . $fila['estado'] . "</td>";

            if ($fila['estado'] === "Pagado") {
              echo "<td><button class='ocultar' onclick='pagarPrestamo(" . $fila['id_prestamo'] . ", 0x" . $fila['Cantidad'] . ", 0x" . $fila['mensualidad'] . ")' name='aprobar'>Pagar</button></td>";
            } else {
              echo "<td><button onclick='pagarPrestamo(" . $fila['id_prestamo'] . ", 0x" . $fila['Cantidad'] . ", 0x" . $fila['mensualidad'] . ")' name='aprobar'>Pagar</button></td>";
            }
          }

          echo "</tbody></table>";
        }else{
          echo "<h1 class='registroVacio'>No has pedido ningún préstamo aún</h1>";
        }
        ?>
      </section>
    </section>
    <section id="formularioPrestamo" class="centrar ocultar">
      <section class="formPrestamoWrapper">
        <div class="saldoActual">
          <?php
          echo "<h2> Saldo actual:" . number_format(hexdec($_SESSION["cuenta"]["saldo"]) / 100, 2, '.', '.') . "€</h2></div>";
          echo "<div id='cantidadMax' class='hasta'><p>Pide un préstamo de hasta " . number_format(floor(hexdec($_SESSION["cuenta"]["saldo"]) / 0.15) / 100, 2, '.', '.') . "€</p></div>";
          ?>
          <form action="../routes/procesarSolicitudPrestamo.php" name="prestamo" method="post">
            <div class="form-item">
              <label for="motivo" id="motivo">Motivo del Préstamo:</label>
              <input type="text" id="motivo" name="motivo">
            </div>
            <div class="form-item">
              <label for="cantidad" id="cantidad">Cantidad del Préstamo:</label>
              <input type="double" id="cantidad" name="cantidad" min="1" step="1">
            </div>

            <input type="submit" value="Enviar Solicitud" class="btnEnviar">
          </form>
      </section>
    </section>

    <section id="formularioPagarPrestamo" class="centrar ocultar">
      <section class="formPrestamoWrapper">
        <div class="saldoActual">
          <?php
          echo "<h2> Saldo actual:" . number_format(hexdec($_SESSION["cuenta"]["saldo"]) / 100, 2, '.', '.') . "€</h2></div>";
          echo "<p>Has seleccionado el prestamo <span id='nPrestamo'></span><br> El total adeudado es de <span id='totalPagar'></span>€</p>"
          ?>

          <form action="../routes/procesarPagoPrestamo.php" name="pagoPrestamo" method="post">
            <div class="form-item">
              <label for="cantidad" id="cantidadPagoPrestamolbl">Cantidad a pagar:</label>
              <input type="double" id="cantidadPagoPrestamo" name="cantidadPagoPrestamo" min="1" step="1">
              <input hidden type="text" name="id_prestamoForm" id="id_prestamoForm" value="">
              <input hidden type="text" name="totalPrestamo" id="totalPrestamo" value="">
            </div>

            <input type="submit" value="Enviar Solicitud" class="btnEnviar">
          </form>
      </section>
    </section>
    <section class="contenedorButton">
      <button id="solicitarPrestamoButton" onclick="cambiar()">Solicitar Prestamo</button>
    </section>
  </main>

</body>

</html>