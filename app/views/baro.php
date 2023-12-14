<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/app.js"></script>
    <script defer src="../../public/js/baro.js"></script>
</head>

<body>
    <header class='headerSinBanner'>
        <?php
        session_start();
        include_once("header.php");
        ?>
    </header>
    <main>

        <section>
            <?php
            if (isset($_GET["error"])) {
                echo "<h1 class='error'>Error al sacar dinero, no puedes sacar más dinero del que tienes</h1>";
            }
            echo hexdec($_SESSION["cuenta"]["saldo"]) / 100 . "€";
            ?>
        </section>
        <section class="sacarMeterBaroContainers">
            <section class="SacarBaro">
                <h2>Formulario de gastos</h2>

                <form action="../routes/procesarNuevoMovimiento.php" method="post">

                    <input hidden type="text" id="tipoMovimiento" name="tipoMovimiento" value="gasto" required>

                    <label for="monto">Monto:</label>
                    <input type="text" id="monto" name="monto" required>

                    <input type="submit" value="Registrar Movimiento">
                </form>
            </section>

            <section class="MeterBaro">
                <h2>Formulario de ingresos</h2>

                <form action="../routes/procesarNuevoMovimiento.php" method="post">

                    <input hidden type="text" id="tipoMovimiento" name="tipoMovimiento" value="ingreso" required>

                    <label for="monto">Monto:</label>
                    <input type="text" id="monto" name="monto" required>

                    <input type="submit" value="Registrar Movimiento">
                </form>
            </section>
        </section>

        <section>
            <section>
                <button onclick="gasto()">gastos</button>
                <button onclick="ingreso()">ingresos</button>
                <button onclick="todo()">Todo</button>
            </section>
            <section id="todoF"> <?php
                                    include_once("../controllers/movimientosController.php");

                                    $controlador = new MovimientosController();
                                    $resultado = $controlador->mostrarMovimientos($_SESSION["cuenta"]["id_cuenta"]);

                                    if (!empty($resultado)) {
                                        echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Movimiento</th>
                            <th>Monto</th>
                            <th>Fecha y Hora</th>
                        </tr>";

                                        foreach ($resultado as $movimiento) {
                                            echo "<tr>
                            <td>" . $movimiento['id'] . "</td>
                            <td>" . $movimiento['tipo_movimiento'] . "</td>
                            <td>" . number_format(hexdec($movimiento['monto'])/100, 2, '.', '.') . "€</td>
                            <td>" . $movimiento['fecha_hora'] . "</td>
                          </tr>";
                                        }

                                        echo "</table>";
                                    } else {
                                        echo "<p>No se encontraron movimientos.</p>";
                                    }

                                    ?></section>
            <section id="gastosF" class="ocultar">
                <?php
                include_once("../controllers/movimientosController.php");

                $controlador = new MovimientosController();
                $resultado = $controlador->mostrarMovimientos($_SESSION["cuenta"]["id_cuenta"]);

                if (!empty($resultado)) {
                    echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Movimiento</th>
                            <th>Monto</th>
                            <th>Fecha y Hora</th>
                        </tr>";

                    foreach ($resultado as $movimiento) {
                        if ($movimiento['tipo_movimiento'] === "gasto") {
                            echo "<tr>
                            <td>" . $movimiento['id'] . "</td>
                            <td>" . $movimiento['tipo_movimiento'] . "</td>
                            <td>" . number_format(hexdec($movimiento['monto']) / 100, 2, '.', '.') . "€</td>
                            <td>" . $movimiento['fecha_hora'] . "</td>
                          </tr>";
                        }
                    }

                    echo "</table>";
                } else {
                    echo "<p>No se encontraron movimientos.</p>";
                }

                ?>
            </section>
            <section id="ingresosF" class="ocultar">
                <?php
                include_once("../controllers/movimientosController.php");

                $controlador = new MovimientosController();
                $resultado = $controlador->mostrarMovimientos($_SESSION["cuenta"]["id_cuenta"]);

                if (!empty($resultado)) {
                    echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Movimiento</th>
                            <th>Monto</th>
                            <th>Fecha y Hora</th>
                        </tr>";

                    foreach ($resultado as $movimiento) {
                        if ($movimiento['tipo_movimiento'] === "ingreso") {
                            echo "<tr>
                            <td>" . $movimiento['id'] . "</td>
                            <td>" . $movimiento['tipo_movimiento'] . "</td>
                            <td>" . number_format(hexdec($movimiento['monto']), 2, '.', '.') . "€</td>
                            <td>" . $movimiento['fecha_hora'] . "</td>
                          </tr>";
                        }
                    }

                    echo "</table>";
                } else {
                    echo "<p>No se encontraron movimientos.</p>";
                }
                ?>
            </section>

        </section>

    </main>
    <footer>
        <?php include_once("footer.php") ?>
    </footer>
</body>

</html>