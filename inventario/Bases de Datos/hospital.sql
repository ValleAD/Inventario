-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2021 a las 18:34:07
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
-- Base de datos: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_bodega`
--

CREATE TABLE `sol_bodega` (
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `U/M` text NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Cos_Unitario` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_compra`
--

CREATE TABLE `sol_compra` (
  `Renglon` int(11) NOT NULL,
  `Codigo_Producto` int(11) NOT NULL,
  `Cod_Cat_Nac_Uni` int(11) NOT NULL,
  `Des_Completa` int(11) NOT NULL,
  `U/M` text NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Pre_Uni` int(11) NOT NULL,
  `Monto_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_fon_cir`
--

CREATE TABLE `sol_fon_cir` (
  `Numero` int(11) NOT NULL,
  `Des_Mat_Ser_Sol` varchar(500) NOT NULL,
  `U/M` text NOT NULL,
  `Can_Sol` double NOT NULL,
  `Costo-Estimado` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_mat_alm`
--

CREATE TABLE `sol_mat_alm` (
  `Codigo` int(11) NOT NULL,
  `U/M` text NOT NULL,
  `Nombre_Articulo` varchar(250) NOT NULL,
  `Can_Sol` int(11) NOT NULL,
  `can_des` int(11) NOT NULL,
  `Cos_Uni` double NOT NULL,
  `Cos_Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vale`
--

CREATE TABLE `vale` (
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `U/M` text NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Cos_Unitario` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
