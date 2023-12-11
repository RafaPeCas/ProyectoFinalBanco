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

        $dni = strtoupper($datosUsuario["dniRegistro"]);

        if ($this->existeUsuarioPorDNI($dni)) {
            return false; 
        }

        $nombre = $datosUsuario["nombre"];
        $apellidos = $datosUsuario["apellido1"] . " " . $datosUsuario["apellido2"];
        $fecha_nacimiento = $datosUsuario["fNac"];
        $email = $datosUsuario["email"];
        $direccion = $datosUsuario["direccion"];
        $cp = $datosUsuario["cp"];
        $ciudad = $datosUsuario["localidad"];
        $provincia = $datosUsuario["provincia"];
        $pais = $datosUsuario["pais"];
        $pass = $datosUsuario["pass"];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $fecha_actual = date("Y-m-d H:i:s");

        $query = "INSERT INTO usuarios (nombre, apellidos, pass, DNI, email, fecha_nacimiento, direccion, cp, ciudad, provincia, pais, fecha_registro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssssissss", $nombre, $apellidos, $pass, $dni, $email, $fecha_nacimiento, $direccion, $cp, $ciudad, $provincia, $pais, $fecha_actual);
        $resultado = $stmt->execute();

        $stmt->close();

        return $resultado;
    }

    private function existeUsuarioPorDNI($dni)
    {
        $query = "SELECT DNI FROM usuarios WHERE DNI = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->num_rows > 0;
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
            $usuario["passsigin"] = $password;
            if (password_verify($password, $usuario['pass'])) {
                return $usuario;
            }
        }

        return null;
    }

    // public function verificarCuenta($dni, $email)
    // //WIP
    // {
    //     $query = "SELECT pass FROM usuarios WHERE DNI = ? AND email = ?";
    //     $stmt = $this->conexion->prepare($query);
    //     $stmt->bind_param("ss", $dni, $email);
    //     $stmt->execute();
    //     $resultado = $stmt->get_result();

    //     if ($resultado->num_rows > 0) {
    //         return true;
    //     }

    //     return null;
    // }

    // Función retirada por falta de tiempo
}
