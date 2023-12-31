DROP DATABASE IF EXISTS bancoriadb;
CREATE DATABASE bancoriadb;
USE bancoriadb;


CREATE TABLE usuarios (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  pass VARCHAR(100) NOT NULL,
  DNI VARCHAR(9) NOT NULL,
  email VARCHAR(90) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  direccion VARCHAR(80) NOT NULL,
  cp INT NOT NULL,
  ciudad VARCHAR(50) NOT NULL,
  provincia VARCHAR(50) NOT NULL,
  pais VARCHAR(50) NOT NULL,
  fecha_registro DATETIME NOT NULL,
  foto_perfil VARCHAR(50) NOT NULL DEFAULT "defecto.png",
  isAdmin BOOLEAN DEFAULT false NOT NULL 
);

CREATE TABLE cuenta_bancaria (
  id_cuenta INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT,
  iban VARCHAR(24) NOT NULL,
  saldo varchar(100),
  favorito varchar(1) default "€"
);

CREATE TABLE tarjetas (
  id_tarjeta INT PRIMARY KEY AUTO_INCREMENT,
  id_cuenta INT,
  num_tarjeta INT,
  fecha_cad DATE,
  saldo varchar(100),
  CVV VARCHAR(10)
);

CREATE TABLE prestamos (
  id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
  id_cuenta INT,
  Cantidad varchar(100),
  fecha_solicitud DATETIME,
  fecha_vencimiento DATETIME,
  mensualidad VARCHAR(100),
  tiempo INT,
  estado VARCHAR(20) DEFAULT "Pendiente"
);

CREATE TABLE peticion_prestamos (
  id_peticion INT PRIMARY KEY AUTO_INCREMENT,
  id_cuenta INT,
  Cantidad varchar(100),
  fecha_solicitud DATETIME,
  estado VARCHAR(30),
  motivo VARCHAR(50)
);

CREATE TABLE movimientos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_cuenta INT,
  tipo_movimiento VARCHAR(50) NOT NULL,
  monto varchar(100) NOT NULL,
  fecha_hora TIMESTAMP NOT NULL
);

CREATE TABLE mensaje_chat (
  id_mensaje INT PRIMARY KEY AUTO_INCREMENT,
  mensaje VARCHAR(500),
  fecha_envio DATETIME,
  id_usuario INT,
  envio_admin BOOL
);

CREATE TABLE transferencia (
  id_transferencia INT PRIMARY KEY AUTO_INCREMENT,
  monto VARCHAR(100),
  fecha DATETIME,
  id_cuenta_receptor INT,
  id_cuenta_emisor INT
);

ALTER TABLE cuenta_bancaria
  ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);

ALTER TABLE movimientos
  ADD FOREIGN KEY (id_cuenta) REFERENCES cuenta_bancaria(id_cuenta);

ALTER TABLE tarjetas
  ADD FOREIGN KEY (id_cuenta) REFERENCES cuenta_bancaria(id_cuenta);

ALTER TABLE prestamos
  ADD FOREIGN KEY (id_cuenta) REFERENCES cuenta_bancaria(id_cuenta);
  
  ALTER TABLE peticion_prestamos
  ADD FOREIGN KEY (id_cuenta) REFERENCES cuenta_bancaria(id_cuenta);

ALTER TABLE transferencia
  ADD FOREIGN KEY (id_cuenta_emisor) REFERENCES cuenta_bancaria(id_cuenta),
  ADD FOREIGN KEY (id_cuenta_receptor) REFERENCES cuenta_bancaria(id_cuenta);

ALTER TABLE mensaje_chat
  ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);

  
INSERT INTO usuarios (nombre, apellidos, pass, DNI, email, fecha_nacimiento, direccion, cp, ciudad, provincia, pais, fecha_registro, isAdmin) VALUES
 ('admin','admin','admin','admin','admin@example.com','2000-01-01','Admin Address',12345,'Admin City','Admin Province','Admin Country','2000-01-01',true);

 INSERT INTO cuenta_bancaria (id_usuario, iban, saldo) VALUES
 ('1','ES12123412341234','756b679');
