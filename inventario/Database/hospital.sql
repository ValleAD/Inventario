-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 04:21:39
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
USE `hospital` ;

CREATE TABLE tb_productos (
  cod int(15) NOT NULL AUTO_INCREMENT,
  codProductos int(15) NOT NULL,
  categoria varchar(50) NOT NULL,
  catalogo int(15) NOT NULL,
  nombre varchar(50) NOT NULL,
  descripcion varchar(200) NOT NULL,
  unidad_medida varchar(10) NOT NULL DEFAULT 'u',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  campo varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (cod)
);
CREATE TABLE reporte_articulos (
  cod int(15) NOT NULL AUTO_INCREMENT,
  codProductos int(15) NOT NULL,
  categoria varchar(50) NOT NULL,
  catalogo int(15) NOT NULL,
  nombre varchar(50) NOT NULL,
  descripcion varchar(200) NOT NULL,
  unidad_medida varchar(10) NOT NULL DEFAULT 'u',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  campo varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (cod)
);



CREATE TABLE tb_usuarios (
  id int(11) NOT NULl AUTO_INCREMENT,
  username varchar(25) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  Establecimiento varchar(100) NOT NULL,
  unidad varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  Habilitado varchar(2) NOT NULL,
  tipo_usuario int(15) NOT NULL,
    PRIMARY KEY (id)
); 

CREATE TABLE tb_bodega (
  codBodega int(11) NOT NULL,
  departamento varchar(50) NOT NULL,
    usuario varchar (50)  NOT NULL,
    campo varchar (50)  NOT NULL DEFAULT ' Solicitud Bodega',
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codBodega)
);

CREATE TABLE tb_vale (
  codVale int(11) NOT NULL,
  departamento varchar(50) NOT NULL,
  usuario varchar (50)  NOT NULL,
  campo varchar (50)  NOT NULL DEFAULT 'Solicitud Vale',
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codVale)
);

CREATE TABLE tb_compra (
  nSolicitud int(11) NOT NULL,
  dependencia varchar(50) NOT NULL,
  plazo varchar(50) NULL,
  unidad_tecnica varchar(75) NOT NULL,
  descripcion_solicitud varchar(50) NOT NULL,
    usuario varchar (50)  NOT NULL,
    campo varchar (50)  NOT NULL DEFAULT 'Solicitud Compra',
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (nSolicitud)
);



CREATE TABLE tb_circulante (
codigo int(15) NOT NULl AUTO_INCREMENT,
descripcion varchar(50) NOT NULL,
unidad_medida varchar(5) NOT NULL,
cantidad_solicitada int(25) NOT NULL,
costo int(50) NOT NULL,
  usuario varchar (50)  NOT NULL,
  campo varchar (50)  NOT NULL DEFAULT 'Solicitud Circulante',
fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codigo)
);
CREATE TABLE `tb_almacen` (
  `id` int(8) NOT NULL,
  `cod_solicitud` int(12) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `encargado` varchar(75) NOT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
);
CREATE TABLE detalle_almacen (
codigoalmacen int(11) NOT NULL AUTO_INCREMENT,
codigo int(15) NOT NULL,
nombre varchar(50)  NOT NULL,
unidad_medida varchar(5) NOT NULL,
cantidad_solicitada int(25) NOT NULL,
cantidad_despachada int(25) NOT NULL,
tbAlmacen int(20) NOT NULL,
precio int(20) NOT NULL,
fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codigoalmacen),
     CONSTRAINT fk_tb_almacen_detalle_almacen FOREIGN KEY (tbAlmacen)
    REFERENCES tb_almacen(codAlmacen)
);
CREATE TABLE detalle_bodega (
  codigodetallebodega int(15) NOT NULL AUTO_INCREMENT,
  codigo int(15) NOT NULL,
  descripcion varchar(50) NOT NULL,
  unidad_medida varchar(11) NOT NULL DEFAULT 'u',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  odt_bodega int(15),
  estado varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codigodetallebodega),
    CONSTRAINT fk_tb_bodega_detalle_bodeha FOREIGN KEY (odt_bodega)
    REFERENCES tb_bodega(codBodega)
);

CREATE TABLE detalle_vale (
  codigodetallevale int(11) NOT NULL AUTO_INCREMENT,
  codigo int(15) NOT NULL,
  descripcion varchar(50) NOT NULL,
  unidad_medida varchar(11) NOT NULL DEFAULT 'u',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  numero_vale int(15),
  estado varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codigodetallevale),
    CONSTRAINT fk_tb_vale_detalle_vale FOREIGN KEY (numero_vale)
    REFERENCES tb_vale(codVale)
);


CREATE TABLE detalle_compra (
  codigodetallecompra int(11) NOT NULl AUTO_INCREMENT,
  categoria varchar(50) NOT NULL,
  codigo int(15) NOT NULL,
  catalogo int(20) NOT NULL,
  descripcion varchar(200) NOT NULL,
  unidad_medida varchar(5) NOT NULL DEFAULT 'u',
  stock int(200) NOT NULL,
  precio decimal(6,2) NOT NULL,
  estado varchar (50)  NOT NULL,
  solicitud_compra int(8) DEFAULT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
     PRIMARY KEY (codigodetallecompra),
    CONSTRAINT fk_tb_compra_detalle_compra FOREIGN KEY (solicitud_compra)
    REFERENCES tb_compra(nSolicitud)
);
CREATE TABLE Selects_unidad_medida (
  id int(11) NOT NULl AUTO_INCREMENT PRIMARY KEY,
unidad_medida varchar(50) NOT NULL
);
CREATE TABLE Selects_categoria (
  id int(11) NOT NULl AUTO_INCREMENT PRIMARY KEY,
categoria varchar(50) NOT NULL
);
CREATE TABLE Selects_dependencia (
  id int(11) NOT NULl AUTO_INCREMENT PRIMARY KEY,
dependencia varchar(50) NOT NULL
);
CREATE TABLE Selects_departamento (
  id int(11) NOT NULl AUTO_INCREMENT PRIMARY KEY,
departamento varchar(50) NOT NULL
);
INSERT INTO `Selects_unidad_medida` (`unidad_medida`)
VALUES ('c/m'),
       ('lb'),
       ('mts'),
       ('Pgo'),
       ('Qq'),
       ('cto');
INSERT INTO `Selects_categoria` (`categoria`)
VALUES ('Agropecuarios y Forestales'),
       ('Cuero y Caucho'),
       ('Químicos'),
       ('Combustibles y Lubricantes'),
       ('Minerales no Metálicos'),
       ('Minerales Metálicos'),
       ('Herramientas y Repuestos'),
       ('Materiales Eléctricos');

INSERT INTO `Selects_dependencia` (`dependencia`)
VALUES ('Direccion Hospital'),
       ('Departamento Mantenimiento Local'),
       ('División Administrativa'),
       ('Departamento Servicios Generales'),
       ('Sevicio Medicina Interna'),
       ('Sevicio Centro Quirúrgico'),
       ('Sevicio Centro Obstétrico'),
       ('Departamento Enfermeria'),
       ('Subdirección Hospital'),
       ('Sevicio Consulta Externa'),
       ('Unidad Enfermeria');

INSERT INTO `Selects_departamento` (`departamento`)
VALUES ('Direccion Hospital'),
       ('Subdirección Hospital'),
       ('Sección Equipo Médico'),
       ('Sección Equipo Básico'),
       ('Seccion Planta Fisica y Monitoreo'),
       ('Departamento Mantenimiento Local'),
       ('Servicio Centro Quirúrgico'),
       ('Departamento Lavamdería y Ropería'),
       ('Sevicio Medicina Hombre'),
       ('Sevicio Medicina Mujeres'),
       ('Unidad Sala de Operacion'),
       ('Unidad Sala de Partos'),
       ('Sevicio Almacen'),
       ('Sevicio Consulta Externa'),
       ('Unidad Neonatos'),
       ('Unidad Maxima Urgencia'),
       ('Sevicio Trabajo Social'),
       ('Área Saneamiento Ambiental'),
       ('Unidad Financiara Institucional'),
       ('Departamento Estadística y Documento Medicos'),
       ('Departamento Activo Fijo'),
       ('Unidad Auditoria Interna'),
       ('Departamento Recursos Humanos'),
       ('Unidad Asesora de Suministro Médicos'),
       ('Area Servicios Auxiliares'),
       ('Servicio Obstetricia'),
       ('Área Clinica De Úlceras Y Heridas'),
       ('Unidad Atención Integral e Integrada ala Salud Sexual Reproductiva'),
       ('Departamento Terapia Dialítica'),
       ('Área Residencial Médica'),
       ('Unidad Cuidados Especiales'),
       ('Área Epidemiología'),
       ('Area COVID 19');

INSERT INTO `tb_usuarios` (`id`, `username`, `firstname`, `lastname`, `Establecimiento`,  `unidad`,`password`,`Habilitado`, `tipo_usuario`) 
VALUES (NULL, 'Admin', 'Admin', 'Master', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sin Unidad', 'Admin','Si', '1'),
       (NULL, 'Usuario', 'Ernesto', 'Gonzales Choto', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Departamento Mantenimiento Local', '123','Si', '1'),
       (NULL, 'Usuario1', 'Baltazar Alexander', 'Marinero Perez', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Equipo Básico', '123','Si', '2'),
       (NULL, 'Usuario2', 'Fransico Tolentino', 'López', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Planta Física y Mobiliario' , '123','Si', '2'),
       (NULL, 'Usuario3', 'René Adán', 'Villaltá Perez', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Planta Física y Mobiliario' , '123','Si', '2'),
       (NULL, 'Usuario4', 'José Walter', 'Pineda Leiva', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Equipo Básico' , '123','Si', '2'),
       (NULL, 'Usuario5', 'Justo Antonio', 'Alfaro', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Planta Física y Mobiliario' , '123','Si', '2'),
       (NULL, 'Usuario6', 'José Dominguez', 'Echeverría', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Equipo Médico' , '123','Si', '2'),
       (NULL, 'Usuario7', 'Nepoldo Alfaro', 'Rodas', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Equipo Básico' , '123','Si', '2'),
       (NULL, 'Usuario8', 'Miguel Antonio', 'Corvera Torrez', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Planta Física y Mobiliario' , '123','Si', '2'),
       (NULL, 'Usuario9', 'Anderson Eduardo', 'López Rodriguez', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Departamento Mantenimiento Local' , '123','Si', '2'),
       (NULL, 'Usuario10', 'kevin Alexander', 'Guevara Marinero', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Sección Equipo Básico' , '123','Si', '2'),
       (NULL, 'Usuario11', 'Yenifer Marisol', 'Campos Yanez', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Departamento Mantenimiento Local' , '123','Si', '2'),
       (NULL, 'Usuario12', 'kilmar Waldir', 'Pérez Marin', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Departamento Mantenimiento Local' , '123','Si', '2'),
       (NULL, 'Usuario13', 'Ronald Alexander', 'Lopez Cisnero', 'Hospital Nacional Zacatecoluca PA "Santa Tereza"', 'Departamento Mantenimiento Local' , '123','Si', '2');





INSERT INTO `tb_productos`(`cod`, `codProductos`, `categoria`, `catalogo`, `nombre`, `descripcion`, `unidad_medida`, `stock`, `precio`,`campo`, `fecha_registro`) 
VALUES (NULL, '1', 'almacen', '1', 'martillo', 'herramientas', 'lb', '50', '12.25','Solicitud Vale', '2022-01-26'),
       (NULL, '2', 'enfermeria', '2', 'mascarilla k-95', 'utensilio', 'cto', '70', '10','Solicitud Bodega', '2022-01-26'),
       (NULL, '3', 'computacion', '3', 'destornillador', 'herramienta', 'mto', '15', '7','Solicitud Compra', '2022-01-26'),
       (NULL, '4', 'Químicos', '4', 'botella', 'herramientas', 'Qq', '25', '15','Solicitud Almacen', '2022-01-26'),
       (NULL, '5', 'Agropecuarios y Forestales', '5', 'hacha', 'herramientas', 'Pgo', '6', '25', 'Solicitud Circulante', '2022-01-26');
       

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
