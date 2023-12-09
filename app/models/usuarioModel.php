<?php
class UsuarioModel
{

    private $conexion;

    public function __construct($db)
    {
        $this->conexion = $db;
    }

    public function registrarUsuario($datosUsuario)
    {
        $nombre = $datosUsuario["nombre"];
        $apellidos = $datosUsuario["apellido1"] . " " . $datosUsuario["apellido2"];
        $dni = strtoupper($datosUsuario["dniRegistro"]);
        $fecha_nacimiento = $datosUsuario["fNac"];
        $email = $datosUsuario["email"];
        $direccion = $datosUsuario["direccion"];
        $cp = $datosUsuario["cp"];
        $ciudad = $datosUsuario["localidad"];
        $provincia = $datosUsuario["provincia"];
        $pais = $datosUsuario["pais"];
        $pass = $datosUsuario["pass"];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $iban = $this->generarIban();
        $fecha_actual = date("Y-m-d H:i:s");

        $query = "INSERT INTO usuarios (nombre, apellidos, IBAN, pass, DNI, email, fecha_nacimiento, direccion, cp, ciudad, provincia, pais, fecha_registro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssssssssissss", $nombre, $apellidos, $iban, $pass, $dni, $email, $fecha_nacimiento, $direccion, $cp, $ciudad, $provincia, $pais, $fecha_actual);
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

        return $iban;
    }

    public function verificarCredenciales($dni, $password)
    {
        $query = "SELECT * FROM usuarios WHERE DNI = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc(); 
            $usuario["passsigin"]=$password;
            if (password_verify($password, $usuario['pass'])) {
                return $usuario;
            }
        }

        return null;
    }
}
