CREATE DATABASE fugit;
USE fugit;


CREATE TABLE tiporeloj (
idTipo INT PRIMARY KEY NOT NULL,
nombreTipo VARCHAR(50) NOT NULL,
descripcionTipo VARCHAR(50) NOT NULL);

INSERT INTO tiporeloj VALUES (1, 'CABALLERO', 'CABALLERO'),(2, 'DAMA', 'DAMA');

CREATE TABLE reloj (
idReloj INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nombreReloj VARCHAR(50) NOT NULL,
modeloReloj VARCHAR(50) NOT NULL,
tipoReloj INT(11) NOT NULL,
FOREIGN KEY (tipoReloj) REFERENCES tiporeloj (idTipo),
precioReloj INT(10) NOT NULL);
INSERT INTO reloj VALUES (500, 'AUDERMARS', '2002', 1, 50000),(501, 'ROLEX', '2020', 2, 70000);

CREATE TABLE carrito (
idCarrito INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
idReloj INT NOT NULL,
FOREIGN KEY (idReloj) REFERENCES reloj (idReloj),
cantidadRelojes TINYINT(4) NOT NULL);

CREATE TABLE usuario (
idUser INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
userName VARCHAR(30) NOT NULL,
userPassword VARCHAR(30) NOT NULL,
userEmail VARCHAR(40) NOT NULL);

SELECT * FROM usuario;

CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
nombreCliente VARCHAR (30) NOT NULL,
apellidoCliente VARCHAR (30) NOT NULL,
documentoCliente INT NOT NULL,
direccionCliente VARCHAR (50) NOT NULL,
telefonoCliente CHAR (10) NOT NULL);



ALTER TABLE cliente ADD tipoDocumento VARCHAR (30) NOT NULL AFTER apellidoCliente;
ALTER TABLE cliente ADD emailCliente VARCHAR (40) NOT NULL;

INSERT INTO cliente VALUES
(NULL, "Esteban", "Ruiz Ruiz", "Cedula de Ciudadania", "24394861", "Quindio Armenia Condominio la Floresta C3", "3150123456", "es.ruiz@gmail.com"),
(NULL, "Carolina", "Betancurt Uribe", "Cedula de Ciudadania", "79654724", "Quindio Armenia Residencia la Pradera C78", "3150123456", "carouribe@gmail.com"),
(NULL, "Yenny", "Florez Marin", "Cedula de Ciudadania", "1000444621", "Risaralda Marsella Conjunto la Colonia C28", "3147890123", "yenny_florez@gmail.com"),
(NULL, "Andres", "Buitrago Calderon", "Cedula de Ciudadania", "1000708794", "Risaralda Pereira cll.7 #12-22", "3159012345", "andresbu@gmail.com"),
(NULL, "Sofia", "Usuga Montes", "Cedula de Ciudadania", "25847365", "Quindio Armenia Bosques de San Juan C4", "3128901234", "sofia_montes@gmail.com");

CREATE TABLE venta (
idVenta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
estadoVenta VARCHAR (10) NOT NULL,
nombreEmpresa VARCHAR (30) NOT NULL,
telefonoEmpresa CHAR (10) NOT NULL,
idCliente INT NOT NULL,
FOREIGN KEY (idCliente) REFERENCES cliente (idCliente),
fechaRealizacionVenta VARCHAR(40) NOT NULL,
totalVenta DOUBLE NOT NULL);
ALTER TABLE venta MODIFY totalVenta INT NOT NULL;

CREATE TABLE detalleVenta (
idDetalleVenta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
idVenta INT NOT NULL,
FOREIGN KEY (idVenta) REFERENCES venta (idVenta),
idReloj INT NOT NULL,
FOREIGN KEY (idReloj) REFERENCES reloj (idReloj),
cantidadRelojes INT NOT NULL);


