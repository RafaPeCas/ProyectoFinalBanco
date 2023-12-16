<?php
require_once '../controllers/movimientosController.php';
require_once '../controllers/cuentaController.php';
require_once '../controllers/prestamoController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cuenta=$_SESSION["cuenta"]["id_cuenta"];
    $id_prestamo=$_POST["id_prestamoForm"];
    $monto = $_POST["cantidadPagoPrestamo"]*100;
    $totalPrestamo= $_POST["totalPrestamo"];

    $controllerMovimientos = new MovimientosController();
    $controllerCuenta = new CuentaController();
    $controllerPrestamos = new PrestamoController();

    $controllerMovimientos->crearNuevoMovimiento($id_cuenta, "Pago préstamo", $monto);
    $totalPrestamo= dechex($totalPrestamo-$monto);

    $controllerPrestamos->actualizarPrestamo($totalPrestamo, $id_prestamo);
    $controllerCuenta->actualizarSaldo($id_cuenta, $monto, "gasto");
    header("Location: ../views/prestamos.php");

}
