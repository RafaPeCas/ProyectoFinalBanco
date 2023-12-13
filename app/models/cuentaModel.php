<?php
class CuentaModel
{

    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }


    public function registrarCuenta($id_usuario)
    {
        $iban = $this->generarIban();
        $saldo = $this->moneyToHexa(0);


        $query = "INSERT INTO cuenta_bancaria (id_usuario, iban, saldo) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("iss", $id_usuario, $iban, $saldo);
        $resultado = $stmt->execute();

        $stmt->close();

        return $resultado;
    }

    public function generarIban()
    {
        global $nombre;
        $nombret = strtolower($nombre);
        $abc = "abcdefghijklmnñopqrstuvwxyz";
        $iban = "";
        if (strlen($nombret) < 4) {
            $i = 4 - strlen($nombret);
            while ($i > 0) {
                $nombret .= "z";
                $i--;
            }
        }

        for ($i = 0; $i < 4; $i++) {
            $posicion = strpos($abc, $nombret[$i]);
            $iban .= decbin($posicion);
        }

        while ($this->verificarIbanExistente($iban)) {
            $iban .= mt_rand(0, 1);
        }

        return $iban;
    }

    private function verificarIbanExistente($iban)
    {
        $query = "SELECT COUNT(*) as count FROM cuenta_bancaria WHERE iban = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $iban);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $count = $resultado->fetch_assoc()['count'];


        return $count > 0;
    }

    public function moneyToHexa($saldo)
    {
        $saldo = str_pad(dechex($saldo), 2, '0', STR_PAD_LEFT);

        return $saldo;
    }

    public function rescatarDatosCuenta($id_usuario){
        $query = "SELECT * FROM cuenta_bancaria WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $cuenta = $resultado->fetch_assoc();
        }

        return $cuenta;
    }

}
