DROP DATABASE IF EXISTS bancoriaDB;
CREATE DATABASE bancoriaDB;
USE bancoriaDB;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    IBAN VARCHAR(24) NOT NULL,
    pass VARCHAR(15) NOT NULL,
    DNI VARCHAR(9) NOT NULL,
    email VARCHAR(90) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    direccion VARCHAR(80) NOT NULL,
    cp NUMERIC NOT NULL,
    ciudad VARCHAR(50) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    pais VARCHAR(50) NOT NULL,
    fecha_registro DATETIME NOT NULL
);

CREATE TABLE cuentas_bancarias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    iban VARCHAR(34) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE movimientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cuenta INT,
    tipo_movimiento VARCHAR(50) NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha_hora TIMESTAMP NOT NULL,
    FOREIGN KEY (id_cuenta) REFERENCES cuentas_bancarias(id)
);

CREATE TABLE chat (
    id_chat INT PRIMARY KEY AUTO_INCREMENT,
    nombre_chat VARCHAR(255)
);

CREATE TABLE usuarios_en_chat (
    id_usuario_en_chat INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    id_chat INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_chat) REFERENCES chat(id_chat)
);

CREATE TABLE mensajes (
    id_mensaje INT PRIMARY KEY AUTO_INCREMENT,
    id_chat INT,
    id_usuario_emisor INT,
    contenido TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_chat) REFERENCES chat(id_chat),
    FOREIGN KEY (id_usuario_emisor) REFERENCES usuarios(id)
);
INSERT INTO usuarios (nombre, apellidos,IBAN, pass, DNI, email, fecha_nacimiento, direccion, cp, ciudad, provincia, pais, fecha_registro) VALUES
("admin","","admin","admin", "admin","","2023-11-27","","","","","","2023-11-27"),
("torovi2","torover torover2","1010101010101","torovi2", "20062277k","torovi@torovi.com","2023-12-04","leon XIII","41500","Sevilla","Sevilla","España","2023-12-04");

INSERT INTO chat (id_chat, nombre_chat) VALUES (1, "guga y guguer");

