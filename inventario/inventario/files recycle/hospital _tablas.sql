-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2022 a las 03:58:48
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
-- Estructura de tabla para la tabla `detalle_almacen`
--

CREATE TABLE `detalle_almacen` (
  `id` int(11) NOT NULL,
  `cod_producto` int(12) NOT NULL,
  `unidad_medida` varchar(12) NOT NULL,
  `nombre` varchar(350) NOT NULL,
  `cantidad` int(12) NOT NULL,
  `costo_unitario` decimal(12,0) NOT NULL,
  `cod_solicitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_almacen`
--

INSERT INTO `detalle_almacen` (`id`, `cod_producto`, `unidad_medida`, `nombre`, `cantidad`, `costo_unitario`, `cod_solicitud`) VALUES
(20, 68451, 'Pgo', 'dsfdgfhngjty', 87, '6', 1),
(21, 356478, 'mts', 'sdfghjkiuytr', 5, '3', 1),
(22, 78, 'lb', 'qewrtery', 52, '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `id` int(8) NOT NULL,
  `cod_solicitud` int(12) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `encargado` varchar(75) NOT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id`, `cod_solicitud`, `departamento`, `encargado`, `fecha_solicitud`) VALUES
(14, 1, 'Subdirección Hospital', 'Miguel Roscencio', '2022-02-02 03:37:24'),
(15, 2, 'Departamento Lavandería y Ropería', 'Juan Martinez', '2022-02-02 03:37:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_almacen`
--
ALTER TABLE `detalle_almacen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_almacen_detalle_compra` (`cod_solicitud`) USING BTREE;

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_almacen`
--
ALTER TABLE `detalle_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
