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
  codProductos int(15) NOT NULL,
  catalogo int(15) NOT NULL,
  nombre varchar(50) NOT NULL,
  descripcion varchar(200) NOT NULL,
  unidad_medida varchar(10) NOT NULL DEFAULT 'U',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codProductos)
);

CREATE TABLE tb_usuarios (
  id int(11) NOT NULl AUTO_INCREMENT,
  username varchar(25) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE tb_bodega (
  codBodega int(11) NOT NULL,
  departamento varchar(50) NOT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codBodega)
);

CREATE TABLE tb_vale (
  codVale int(11) NOT NULL,
  departamento varchar(50) NOT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codVale)
);

CREATE TABLE tb_compra (
  nSolicitud int(11) NOT NULL,
  dependencia varchar(50) NOT NULL,
  plazo varchar(50) NULL,
  unidad_tecnica varchar(75) NOT NULL,
  descripcion_solicitud int(20) NOT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (nSolicitud)
);

CREATE TABLE detalle_bodega (
  codigo int(15) NOT NULL,
  descripcion varchar(50) NOT NULL,
  unidad_medida varchar(11) NOT NULL DEFAULT 'U',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  odt_bodega int(15),
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (codigo),
    CONSTRAINT fk_tb_bodega_detalle_bodeha FOREIGN KEY (odt_bodega)
    REFERENCES tb_bodega(codBodega)
);

CREATE TABLE detalle_vale (
  codigo int(15) NOT NULL,
  descripcion varchar(50) NOT NULL,
  unidad_medida varchar(11) NOT NULL DEFAULT 'U',
  stock int(11) NOT NULL,
  precio decimal(6,2) NOT NULL,
  numero_vale int(15),
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (coddetallevale),
    CONSTRAINT fk_tb_vale_detalle_vale FOREIGN KEY (numero_vale)
    REFERENCES tb_vale(codVale)
);


CREATE TABLE detalle_compra (
  codigo int(15) NOT NULL,
  catalogo int(20) NOT NULL,
  descripcion varchar(200) NOT NULL,
  unidad_medida varchar(2) NOT NULL DEFAULT 'U',
  stock int(200) NOT NULL,
  precio decimal(6,2) NOT NULL,
  solicitud_compra int(8) DEFAULT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
     PRIMARY KEY (codCompra),
    CONSTRAINT fk_tb_compra_detalle_compra FOREIGN KEY (solicitud_compra)
    REFERENCES tb_compra(nSolicitud)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;