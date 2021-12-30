-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2021 a las 05:07:14
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bodega`
--

CREATE TABLE `detalle_bodega` (
  `coddetallebodega` int(11) NOT NULL,
  `codigo` int(15) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `unidad_medida` varchar(11) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `odt_bodega` int(15) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_bodega`
--

INSERT INTO `detalle_bodega` (`coddetallebodega`, `codigo`, `descripcion`, `unidad_medida`, `stock`, `precio`, `odt_bodega`, `fecha_registro`) VALUES
(3, 1, 'nike', 'U', 22, '50.00', 2233, '2021-12-30 02:57:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `coddetallecompra` int(11) NOT NULL,
  `codigo` int(15) NOT NULL,
  `catalogo` int(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `unidad_medida` varchar(2) NOT NULL DEFAULT 'U',
  `stock` int(200) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `solicitud_compra` int(8) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`coddetallecompra`, `codigo`, `catalogo`, `descripcion`, `unidad_medida`, `stock`, `precio`, `solicitud_compra`, `fecha_registro`) VALUES
(1, 15, 15, 'caja', 'U', 15, '15.00', 503, '2021-12-30 03:29:10'),
(2, 133, 133, '133', 'U', 14, '14.00', 133, '2021-12-30 03:52:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vale`
--

CREATE TABLE `detalle_vale` (
  `coddetallevale` int(11) NOT NULL,
  `codigo` int(15) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `unidad_medida` varchar(11) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `numero_vale` int(15) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_vale`
--

INSERT INTO `detalle_vale` (`coddetallevale`, `codigo`, `descripcion`, `unidad_medida`, `stock`, `precio`, `numero_vale`, `fecha_registro`) VALUES
(1, 1, 'nike', 'U', 131232, '50.00', NULL, '2021-12-29 22:37:23'),
(2, 2, 'puma', 'M', 3434, '10.00', NULL, '2021-12-29 22:46:53'),
(3, 1, 'fpdflf', 'U', 545, '151.00', 3434, '2021-12-30 02:06:37'),
(4, 1, 'fpdflf', 'U', 545, '151.00', 3434, '2021-12-30 02:06:44'),
(5, 1, 'nike', 'U', 1, '50.00', 3434, '2021-12-30 02:12:17'),
(6, 2, 'puma', 'M', 3, '10.00', NULL, '2021-12-30 02:07:33'),
(11, 1, 'nike', 'U', 3, '50.00', 12515, '2021-12-30 02:33:11'),
(12, 1, 'nike', 'U', 4, '50.00', 12515, '2021-12-30 02:33:11'),
(13, 2, 'puma', 'M', 6, '10.00', 503, '2021-12-30 02:36:43'),
(14, 2, 'puma', 'M', 9, '10.00', 503, '2021-12-30 02:36:43'),
(15, 1, 'nike', 'U', 2, '50.00', 133, '2021-12-30 02:41:04'),
(16, 1, 'nike', 'U', 2, '50.00', 512, '2021-12-30 02:41:42'),
(17, 1, 'nike', 'U', 3, '50.00', 512, '2021-12-30 02:41:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bodega`
--

CREATE TABLE `tb_bodega` (
  `codBodega` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_bodega`
--

INSERT INTO `tb_bodega` (`codBodega`, `departamento`, `fecha_registro`) VALUES
(2233, 'gerencia', '2021-12-30 02:57:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compra`
--

CREATE TABLE `tb_compra` (
  `nSolicitud` int(11) NOT NULL,
  `dependencia` varchar(50) NOT NULL,
  `plazo` varchar(50) DEFAULT NULL,
  `unidad_tecnica` varchar(75) NOT NULL,
  `descripcion_solicitud` varchar(20) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_compra`
--

INSERT INTO `tb_compra` (`nSolicitud`, `dependencia`, `plazo`, `unidad_tecnica`, `descripcion_solicitud`, `fecha_registro`) VALUES
(133, 'almacen', 'xd', 'almacen', 'pastillas', '2021-12-30 03:52:51'),
(503, 'mantenimiento', 'jhhj', 'mantenimiento', '0', '2021-12-30 03:29:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `codProductos` int(15) NOT NULL,
  `catalogo` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `unidad_medida` varchar(10) NOT NULL DEFAULT 'U',
  `stock` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`codProductos`, `catalogo`, `nombre`, `descripcion`, `unidad_medida`, `stock`, `precio`, `fecha_registro`) VALUES
(1, 1, 'zapatos', 'nike', 'U', 145, '50.00', '2021-12-29 15:57:53'),
(2, 2, 'calzetas', 'puma', 'M', 15, '10.00', '2021-12-29 22:22:52');

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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `username`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'j', 'mario enrique ', 'rodas alvarado', 'mario@gmail.com', '123'),
(2, 'j', 'mario enrique ', 'rodas alvarado', 'mario@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vale`
--

CREATE TABLE `tb_vale` (
  `codVale` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_vale`
--

INSERT INTO `tb_vale` (`codVale`, `departamento`, `fecha_registro`) VALUES
(47, 'jojdogj', '2021-12-30 02:10:25'),
(55, 'sffff', '2021-12-29 22:46:03'),
(121, 'cagada', '2021-12-30 02:07:33'),
(133, 'charamusca', '2021-12-30 02:41:04'),
(503, 'paquete', '2021-12-30 02:09:22'),
(512, 'majeeee', '2021-12-30 02:41:42'),
(3434, 'dsfdf', '2021-12-29 22:46:53'),
(12515, 'mdnndknd', '2021-12-30 02:33:11'),
(26226, 'dsfkofk', '2021-12-30 02:10:35'),
(35656456, 'dsfsdfdsf', '2021-12-29 22:34:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD PRIMARY KEY (`coddetallebodega`),
  ADD KEY `fk_tb_bodega_detalle_bodeha` (`odt_bodega`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`coddetallecompra`),
  ADD KEY `fk_tb_compra_detalle_compra` (`solicitud_compra`);

--
-- Indices de la tabla `detalle_vale`
--
ALTER TABLE `detalle_vale`
  ADD PRIMARY KEY (`coddetallevale`),
  ADD KEY `fk_tb_vale_detalle_vale` (`numero_vale`);

--
-- Indices de la tabla `tb_bodega`
--
ALTER TABLE `tb_bodega`
  ADD PRIMARY KEY (`codBodega`);

--
-- Indices de la tabla `tb_compra`
--
ALTER TABLE `tb_compra`
  ADD PRIMARY KEY (`nSolicitud`);

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
-- AUTO_INCREMENT de la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  MODIFY `coddetallebodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `coddetallecompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_vale`
--
ALTER TABLE `detalle_vale`
  MODIFY `coddetallevale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_bodega`
--
ALTER TABLE `detalle_bodega`
  ADD CONSTRAINT `fk_tb_bodega_detalle_bodeha` FOREIGN KEY (`odt_bodega`) REFERENCES `tb_bodega` (`codBodega`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_tb_compra_detalle_compra` FOREIGN KEY (`solicitud_compra`) REFERENCES `tb_compra` (`nSolicitud`);

--
-- Filtros para la tabla `detalle_vale`
--
ALTER TABLE `detalle_vale`
  ADD CONSTRAINT `fk_tb_vale_detalle_vale` FOREIGN KEY (`numero_vale`) REFERENCES `tb_vale` (`codVale`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
