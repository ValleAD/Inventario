-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 02:44:06
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codProducto` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `u/m` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precioUnitario` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_almacen`
--

CREATE TABLE `solicitud_almacen` (
  `idSolicitud_almacen` int(11) NOT NULL,
  `Cantidad_Solicitada` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad_Despachada` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Producto_CodProducto` int(11) NOT NULL,
  `Producto_Solicitud_Bodega_idBodega` int(11) NOT NULL,
  `Producto_Fondo_Circulante_idSolicitud_fondo_Circulante` int(11) NOT NULL,
  `Solicitud_Fondo_Circulante_Producto_Cod_Catalogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_bodega`
--

CREATE TABLE `solicitud_bodega` (
  `idBodega` int(11) NOT NULL,
  `Cantidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Total` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Producto_CodProducto` int(11) NOT NULL,
  `Producto_Solicitud_Bodega_idBodega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vale`
--

CREATE TABLE `vale` (
  `idVale` int(11) NOT NULL,
  `Cantidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Total` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Producto_CodProducto` int(11) NOT NULL,
  `Producto_Solicitud_Bodega_idBodega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `solicitud_almacen`
--
ALTER TABLE `solicitud_almacen`
  ADD PRIMARY KEY (`idSolicitud_almacen`),
  ADD KEY `Producto_Solicitud_Bodega_idBodega` (`Producto_Solicitud_Bodega_idBodega`),
  ADD KEY `Producto_Fondo_Circulante_idSolicitud_fondo_Circulante` (`Producto_Fondo_Circulante_idSolicitud_fondo_Circulante`),
  ADD KEY `Solicitud_Fondo_Circulante_Producto_Cod_Catalogo` (`Solicitud_Fondo_Circulante_Producto_Cod_Catalogo`);

--
-- Indices de la tabla `solicitud_bodega`
--
ALTER TABLE `solicitud_bodega`
  ADD PRIMARY KEY (`idBodega`),
  ADD KEY `Producto_Solicitud_Bodega_idBodega` (`Producto_Solicitud_Bodega_idBodega`);

--
-- Indices de la tabla `vale`
--
ALTER TABLE `vale`
  ADD PRIMARY KEY (`idVale`),
  ADD KEY `Producto_Solicitud_Bodega_idBodega` (`Producto_Solicitud_Bodega_idBodega`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_almacen`
--
ALTER TABLE `solicitud_almacen`
  MODIFY `idSolicitud_almacen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_bodega`
--
ALTER TABLE `solicitud_bodega`
  MODIFY `idBodega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vale`
--
ALTER TABLE `vale`
  MODIFY `idVale` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
