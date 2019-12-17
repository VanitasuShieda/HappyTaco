-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2019 a las 19:06:46
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

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
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_prod` int(10) NOT NULL,
  `porcentaje` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_prod`, `porcentaje`) VALUES
(123456789, 50),
(456789123, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `existencia` int(2) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de productos';

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `categoria`, `descripcion`, `existencia`, `precio`, `imagen`) VALUES
(123456789, 'Taco de Bisteck', 'Tacos', 'Taco de dos tortillas con carne de bistec y verdura fresca', 15, 9, 'images/tacodebisteck.jpg'),
(234567891, 'Taco de Pastor', 'Tacos', 'Taco de dos tortillas con carne de pastor y verdura fresca', 10, 9, 'images/tacodepastor.jpg'),
(345678912, 'Quesadilla de Bistec', 'Quesadillas', 'Quesadilla de tortilla de harina de trigo con carne de bistec y verdura fresca', 5, 20, 'images/quesadilladebisteck.jpg'),
(456789123, 'Quesadilla de Pastor', 'Quesadillas', 'Quesadilla de tortilla de harina de trigo con carne de pastor y verdura fresca', 8, 22, 'images/quesadilladepastor.jpg'),
(567891234, 'Torta Mixta', 'Tortas', 'Bolillo relleno de carne de bistec y pastor con verdura fresca', 20, 30, 'images/tortamixta.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
