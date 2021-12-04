-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2021 a las 17:24:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `codProductos` int(11) NOT NULL,
  `catalogo` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `unidad_medida` varchar(2) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_solicitud_almacen`
--

CREATE TABLE `tb_solicitud_almacen` (
  `codsolicitud_almacen` int(11) NOT NULL,
  `Cantidad_Solicitada` int(11) NOT NULL,
  `Cantidad Despachada` int(11) NOT NULL,
  `producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_solicitud_bodega`
--

CREATE TABLE `tb_solicitud_bodega` (
  `codBodega` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_solicitud_compra`
--

CREATE TABLE `tb_solicitud_compra` (
  `codSolicitud_Compra` int(11) NOT NULL,
  `codCatalogo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(10) NOT NULL DEFAULT 'U',
  `precioUnitario` decimal(6,2) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_solicitud_fondo_circulante`
--

CREATE TABLE `tb_solicitud_fondo_circulante` (
  `codfondo_circulante` int(11) NOT NULL,
  `Cantidad_Solicitada` int(11) NOT NULL,
  `Costo_Estimado` int(11) NOT NULL,
  `almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `firstname` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `lastname` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vale`
--

CREATE TABLE `tb_vale` (
  `codVale` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`codProductos`);

--
-- Indices de la tabla `tb_solicitud_almacen`
--
ALTER TABLE `tb_solicitud_almacen`
  ADD PRIMARY KEY (`codsolicitud_almacen`),
  ADD KEY `fk_Solicitud_Almacen_Producto1` (`producto`);

--
-- Indices de la tabla `tb_solicitud_bodega`
--
ALTER TABLE `tb_solicitud_bodega`
  ADD PRIMARY KEY (`codBodega`),
  ADD KEY `fk_Solicitud_Bodega_Producto1` (`producto`);

--
-- Indices de la tabla `tb_solicitud_compra`
--
ALTER TABLE `tb_solicitud_compra`
  ADD PRIMARY KEY (`codSolicitud_Compra`,`codCatalogo`);

--
-- Indices de la tabla `tb_solicitud_fondo_circulante`
--
ALTER TABLE `tb_solicitud_fondo_circulante`
  ADD PRIMARY KEY (`codfondo_circulante`),
  ADD KEY `fk_tb_solicitud_fondo_circulante_tb_solicitud_almacen1` (`almacen`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_vale`
--
ALTER TABLE `tb_vale`
  ADD PRIMARY KEY (`codVale`),
  ADD KEY `fk_Vale_Producto1` (`producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `codProductos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_solicitud_compra`
--
ALTER TABLE `tb_solicitud_compra`
  MODIFY `codSolicitud_Compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_solicitud_fondo_circulante`
--
ALTER TABLE `tb_solicitud_fondo_circulante`
  MODIFY `codfondo_circulante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_solicitud_almacen`
--
ALTER TABLE `tb_solicitud_almacen`
  ADD CONSTRAINT `fk_Solicitud_Almacen_Producto1` FOREIGN KEY (`producto`) REFERENCES `tb_productos` (`codProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_solicitud_bodega`
--
ALTER TABLE `tb_solicitud_bodega`
  ADD CONSTRAINT `fk_Solicitud_Bodega_Producto1` FOREIGN KEY (`producto`) REFERENCES `tb_productos` (`codProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_solicitud_fondo_circulante`
--
ALTER TABLE `tb_solicitud_fondo_circulante`
  ADD CONSTRAINT `fk_tb_solicitud_fondo_circulante_tb_solicitud_almacen1` FOREIGN KEY (`almacen`) REFERENCES `tb_solicitud_almacen` (`codsolicitud_almacen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_vale`
--
ALTER TABLE `tb_vale`
  ADD CONSTRAINT `fk_Vale_Producto1` FOREIGN KEY (`producto`) REFERENCES `tb_productos` (`codProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
