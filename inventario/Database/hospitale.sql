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
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bodega`
--

CREATE TABLE `detalle_bodega` (
  `coddetallebodega` int(11) NOT NULL,
  `codigo` int(15) NOT NULL,
  `nombre` int(15) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `unidadmedida` varchar(11) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `odtBodega` int(6) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vale`
--

CREATE TABLE `detalle_vale` (
  `coddetallevale` int(11) NOT NULL,
  `codigo` int(15) NOT NULL,
  `nombre` int(15) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `unidadmedida` varchar(11) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `odtVale` int(6) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bodega`
--

CREATE TABLE `tb_bodega` (
  `codBodega` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `odt` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compra`
--

CREATE TABLE `tb_compra` (
  `codCompra` int(11) NOT NULL,
  `codCatalogo` int(20) NOT NULL,
  `nombre` int(15) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `stock` int(200) NOT NULL,
  `unidad_medida` varchar(2) NOT NULL DEFAULT 'U',
  `precio` decimal(6,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `codProductos` int(11) NOT NULL,
  `catalogo` varchar(25) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `unidad_medida` varchar(10) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vale`
--

CREATE TABLE `tb_vale` (
  `codVale` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `odt` int(20) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD PRIMARY KEY (`coddetallebodega`),
  ADD KEY `fk_odtBodega` (`odtBodega`);

--
-- Indices de la tabla `detalle_vale`
--
ALTER TABLE `detalle_vale`
  ADD PRIMARY KEY (`coddetallevale`),
  ADD KEY `fk_odtVale` (`odtVale`);

--
-- Indices de la tabla `tb_bodega`
--
ALTER TABLE `tb_bodega`
  ADD PRIMARY KEY (`codBodega`);

--
-- Indices de la tabla `tb_compra`
--
ALTER TABLE `tb_compra`
  ADD PRIMARY KEY (`codCompra`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`codProductos`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_vale`
--
ALTER TABLE `tb_vale`
  ADD PRIMARY KEY (`codVale`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_bodega`
--
ALTER TABLE `tb_bodega`
  MODIFY `codBodega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_compra`
--
ALTER TABLE `tb_compra`
  MODIFY `codCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `codProductos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_vale`
--
ALTER TABLE `tb_vale`
  MODIFY `codVale` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD CONSTRAINT `fk_odtBodega` FOREIGN KEY (`odtBodega`) REFERENCES `tb_bodega` (`codBodega`);

--
-- Filtros para la tabla `detalle_vale`
--
ALTER TABLE `detalle_vale`
  ADD CONSTRAINT `fk_odtVale` FOREIGN KEY (`odtVale`) REFERENCES `tb_vale` (`codVale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
