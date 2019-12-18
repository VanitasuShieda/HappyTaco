-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2019 a las 18:38:13
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descuento` float NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`id`, `nombre`, `codigo`, `descripcion`, `tipo`, `descuento`, `imagen`) VALUES
(98765, 'Descuento', 'desc15', 'descuento del 15% en el final', 'descuento', 0.85, 'img/cupones/descuento.jpg'),
(87654, 'Envio Gratis', 'free00', 'envio grtis', 'envio', 1, 'img/cupones/envio.jpg'),
(76543, '3 Tacos Gratis', 'FTacoF', '3 Tacos Gratis', 'gratis', 1, 'img/cupones/free.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
