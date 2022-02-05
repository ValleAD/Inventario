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
  codCirculante int(15) NOT NULL,
  departamento varchar(200) NOT NULL,
  usuario varchar (50)  NOT NULL,
  campo varchar (50)  NOT NULL DEFAULT 'Solicitud Circulante',
  fecha_solicitud timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (codCirculante)
);

CREATE TABLE tb_almacen (
  codAlmacen int(12) NOT NULL,
  departamento varchar(200) NOT NULL,
  encargado varchar(75) NOT NULL,
  fecha_solicitud timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (codAlmacen)
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
    CONSTRAINT fk_tb_bodega_detalle_bodega FOREIGN KEY (odt_bodega)
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

CREATE TABLE detalle_circulante (
codigodetallecirculante int(15) NOT NULL AUTO_INCREMENT,
  codigo int(15) NOT NULL,
  descripcion varchar(50) NOT NULL,
  unidad_medida varchar(11) NOT NULL DEFAULT 'u',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  tb_circulante int(15),
  estado varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codigodetallecirculante),
    CONSTRAINT fk_tb_circulante_detalle_circulante FOREIGN KEY (tb_circulante)
    REFERENCES tb_circulante(codCirculante)
); 

CREATE TABLE detalle_almacen (
codigoalmacen int(11) NOT NULL AUTO_INCREMENT,
codigo int(15) NOT NULL,
nombre varchar(50)  NOT NULL,
unidad_medida varchar(5) NOT NULL,
cantidad_solicitada int(25) NOT NULL,
cantidad_despachada int(25) NOT NULL,
tb_almacen int(20) NOT NULL,
precio int(20) NOT NULL,
fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codigoalmacen),
     CONSTRAINT fk_tb_almacen_detalle_almacen FOREIGN KEY (tb_almacen)
    REFERENCES tb_almacen(codAlmacen)
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
  Habilitado varchar(2) NOT NULL,
categoria varchar(50) NOT NULL
);

CREATE TABLE Selects_dependencia (
  id int(11) NOT NULl AUTO_INCREMENT PRIMARY KEY,
  Habilitado varchar(2) NOT NULL,
dependencia varchar(50) NOT NULL
);

CREATE TABLE Selects_departamento (
  id int(11) NOT NULl AUTO_INCREMENT PRIMARY KEY,
  Habilitado varchar(2) NOT NULL,
departamento varchar(50) NOT NULL
);
INSERT INTO `Selects_unidad_medida` (`unidad_medida`)
VALUES ('c/m'),
       ('lb'),
       ('mts'),
       ('Pgo'),
       ('Qq'),
       ('cto');
INSERT INTO `Selects_categoria` (`categoria`,`Habilitado`)
VALUES ('Agropecuarios y Forestales' ,'Si'),
       ('Cuero y Caucho' ,'Si'),
       ('Químicos' ,'Si'),
       ('Combustibles y Lubricantes' ,'Si'),
       ('Minerales no Metálicos' ,'Si'),
       ('Minerales Metálicos' ,'Si'),
       ('Herramientas y Repuestos' ,'Si'),
       ('Materiales Eléctricos' ,'Si');

INSERT INTO `Selects_dependencia` (`dependencia`,`Habilitado`)
VALUES ('Direccion Hospital','Si'),
       ('Departamento Mantenimiento Local','Si'),
       ('División Administrativa','Si'),
       ('Departamento Servicios Generales','Si'),
       ('Sevicio Medicina Interna','Si'),
       ('Sevicio Centro Quirúrgico','Si'),
       ('Sevicio Centro Obstétrico','Si'),
       ('Departamento Enfermeria','Si'),
       ('Subdirección Hospital','Si'),
       ('Sevicio Consulta Externa','Si'),
       ('Unidad Enfermeria','Si');

INSERT INTO `Selects_departamento` (`departamento`,`Habilitado`)
VALUES ('Direccion Hospital' ,'Si'),
       ('Subdirección Hospital' ,'Si'),
       ('Sección Equipo Médico' ,'Si'),
       ('Sección Equipo Básico' ,'Si'),
       ('Seccion Planta Fisica y Monitoreo' ,'Si'),
       ('Departamento Mantenimiento Local' ,'Si'),
       ('Servicio Centro Quirúrgico' ,'Si'),
       ('Departamento Lavamdería y Ropería' ,'Si'),
       ('Sevicio Medicina Hombre' ,'Si'),
       ('Sevicio Medicina Mujeres','Si'),
       ('Unidad Sala de Operacion','Si'),
       ('Unidad Sala de Partos','Si'),
       ('Sevicio Almacen','Si'),
       ('Sevicio Consulta Externa','Si'),
       ('Unidad Neonatos','Si'),
       ('Unidad Maxima Urgencia','Si'),
       ('Sevicio Trabajo Social','Si'),
       ('Área Saneamiento Ambiental','Si'),
       ('Unidad Financiara Institucional','Si'),
       ('Departamento Estadística y Documento Medicos','Si'),
       ('Departamento Activo Fijo','Si'),
       ('Unidad Auditoria Interna','Si'),
       ('Departamento Recursos Humanos','Si'),
       ('Unidad Asesora de Suministro Médicos','Si'),
       ('Area Servicios Auxiliares','Si'),
       ('Servicio Obstetricia','Si'),
       ('Área Clinica De Úlceras Y Heridas','Si'),
       ('Unidad Atención Integral e Integrada ala Salud Sexual Reproductiva','Si'),
       ('Departamento Terapia Dialítica','Si'),
       ('Área Residencial Médica','Si'),
       ('Unidad Cuidados Especiales','Si'),
       ('Área Epidemiología','Si'),
       ('Area COVID 19','Si');

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
