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
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (cod)
);

CREATE TABLE tb_usuarios (
  id int(11) NOT NULl AUTO_INCREMENT,
  username varchar(25) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  tipo_usuario int(15) NOT NULL,
    PRIMARY KEY (id)
); 
CREATE TABLE tb_bodega (
  codBodega int(11) NOT NULL,
  departamento varchar(50) NOT NULL,
    usuario varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codBodega)
);

CREATE TABLE tb_vale (
  codVale int(11) NOT NULL,
  departamento varchar(50) NOT NULL,
  usuario varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codVale)
);

CREATE TABLE tb_compra (
  nSolicitud int(11) NOT NULL,
  dependencia varchar(50) NOT NULL,
  plazo varchar(50) NULL,
  unidad_tecnica varchar(75) NOT NULL,
  descripcion_solicitud varchar(50) NOT NULL,
    usuario varchar (50)  NOT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (nSolicitud)
);

CREATE TABLE tb_almacen (
codigoalmacen int(11) NOT NULL AUTO_INCREMENT,
codigo int(15) NOT NULL,
nombre varchar(50)  NOT NULL,
unidad_medida varchar(5) NOT NULL,
cantidad_solicitada int(25) NOT NULL,
cantidad_despachada int(25) NOT NULL,
precio int(20) NOT NULL,
  usuario varchar (50)  NOT NULL,
fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codigoalmacen)
);

CREATE TABLE tb_circulante (
codigo int(15) NOT NULl AUTO_INCREMENT,
descripcion varchar(50) NOT NULL,
unidad_medida varchar(5) NOT NULL,
cantidad_solicitada int(25) NOT NULL,
costo int(50) NOT NULL,
  usuario varchar (50)  NOT NULL,
fecha_registro date NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (codigo)
);

CREATE TABLE detalle_bodega (
  codigodetallebodega int(15) NOT NULL AUTO_INCREMENT,
  codigo int(15) NOT NULL,
  descripcion varchar(50) NOT NULL,
  unidad_medida varchar(11) NOT NULL DEFAULT 'u',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  odt_bodega int(15),
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
  unidad_medida varchar(2) NOT NULL DEFAULT 'u',
  stock int(200) NOT NULL,
  precio decimal(6,2) NOT NULL,
  solicitud_compra int(8) DEFAULT NULL,
  fecha_registro date NOT NULL DEFAULT current_timestamp(),
     PRIMARY KEY (codigodetallecompra),
    CONSTRAINT fk_tb_compra_detalle_compra FOREIGN KEY (solicitud_compra)
    REFERENCES tb_compra(nSolicitud)
);

INSERT INTO `tb_usuarios` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `tipo_usuario`) 
VALUES (NULL, 'Admin', 'Admin', 'Master', 'Admin@mail.com', 'Admin', '1');
INSERT INTO `tb_productos` (`cod`, `codProductos`, `categoria`, `catalogo`, `nombre`, `descripcion`, `unidad_medida`, `stock`, `precio`) 
VALUES (NULL, '1', 'almacen', '1', 'martillo', 'herramientas', 'lb', '50', '12.25'),
       (NULL, '2', 'enfermeria', '2', 'mascarilla k-95', 'utensilio', 'cto', '70', '10'),
       (NULL, '3', 'computacion', '3', 'destornillador', 'herramienta', 'mto', '15', '7'),
       (NULL, '4', 'Químicos', '4', 'botella', 'herramientas', 'Qq', '25', '15'),
       (NULL, '5', 'Agropecuarios y Forestales', '5', 'hacha', 'herramientas', 'Pgo', '6', '25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
