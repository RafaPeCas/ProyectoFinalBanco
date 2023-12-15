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
            if($usuario["isAdmin"]) {
                if($password == $usuario['pass']) {
                    return $usuario;
                }
            }
            if (password_verify($password, $usuario['pass'])) {
                return $usuario;
            }
        }

        return null;
    }

    public function actualizarUsuario($datosUsuario){
        $id_usuario= $_SESSION["usuario"]["id_usuario"];
        $nombre = $datosUsuario["nombre"];
        $apellidos = $datosUsuario["apellido1"] . " " . $datosUsuario["apellido2"];
        $direccion = $datosUsuario["direccion"];
        $cp = $datosUsuario["cp"];
        $ciudad = $datosUsuario["ciudad"];
        $provincia = $datosUsuario["provincia"];
        $pais = $datosUsuario["pais"];

        $query = "UPDATE usuarios SET nombre = ?, apellidos = ?, direccion = ?, cp = ?, ciudad = ?, provincia = ?, pais = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssssi", $nombre, $apellidos, $direccion, $cp, $ciudad, $provincia, $pais, $id_usuario);
        $stmt->execute();

        return true;
    }

    public function actualizarSesionUsuario($id_usuario){
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        $_SESSION['usuario'] = $usuario;
    }

    public function mostrarUsuarios(){
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
        }
        return $usuarios;
        exit();
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
