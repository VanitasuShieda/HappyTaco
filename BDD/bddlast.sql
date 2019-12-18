-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2019 a las 18:16:26
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `user_destiny` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `username`, `msg`, `user_destiny`) VALUES
(1, 'cd', 'cds', 'root'),
(2, 'Arturo', 'Hola', 'root'),
(3, 'Omar', 'Hola', 'root'),
(4, 'Omar', 'Adiós', 'root'),
(5, 'Omar', 'Bye bye', 'root'),
(6, 'Omar', 'Están ahí?', 'root'),
(7, 'root', '[object HTMLTextAreaElement]', 'Omar'),
(8, 'root', 'Changos', 'Omar'),
(9, 'root', 'Changos', 'cd'),
(10, 'Sergio', 'Hola, soy Sergio y tengo una duda.', 'root'),
(11, 'Montoya', 'Ya monto o no ya jaja', 'root'),
(12, 'root', 'Jajajaja que gracioso eres amigo', 'Montoya'),
(13, 'Montoya', 'Si lo sé xD', 'root'),
(14, 'Juan', 'Hola hay alguien ahi?', 'root'),
(15, 'root', 'Si aqui estoy', 'Juan'),
(16, 'Susana', 'Hola hijo feo', 'root'),
(17, 'root', 'Hola mamita hermosa', 'Susana'),
(18, 'Daniela', 'HolaHola', 'root'),
(19, 'root', 'Hola soy administrador', 'Daniela'),
(20, 'Jaja', 'Changos', 'root'),
(21, 'root', 'Mocos', 'Jaja'),
(22, 'Omar', 'Sip', 'root'),
(23, 'Omar', 'Y tu como estas', 'root'),
(24, 'Omar', 'Estoy probando que se mande con el enter', 'root'),
(25, 'root', 'Yo tambien', 'Omar'),
(26, 'root', 'Ya funciona del todo bien', 'Omar'),
(27, 'xs', 'Hola', 'root'),
(28, 'root', 'En que puedo ayudarte?', 'Daniela'),
(29, 'root', 'Parece ser que si', 'Omar'),
(30, 'root', 'Ahora solo falta cambiarle el color al chat porque se ve muy feo', 'Omar'),
(31, 'ADMIN', 'Hola', 'root'),
(32, 'Omar', 'Hola', 'root'),
(33, 'Omar', 'Grybg', 'root'),
(34, 'Omar', 'Soy Omar otra vez', 'root'),
(35, 'root', 'Ya esta funcionando mi codigo desde la pagina de Marco :)', 'Omar'),
(36, 'Marco', 'Hola soy Marco', 'root'),
(37, 'root', 'Hola soy el admin', 'Marco'),
(38, 'root', 'Ah bueno, chinga tu madre', 'Marco'),
(39, 'Mariela', 'Hola niño', 'root'),
(40, 'root', 'Hola Tere', 'Mariela'),
(41, 'Mariela', 'Jajaja esta chido', 'root'),
(42, 'richie', 'holaaaaaaaaaaaaa', 'root'),
(43, 'root', 'Adiossssss', 'richie'),
(44, 'root', 'Hoal', 'Omar'),
(45, 'cortes', 'Hola', 'root'),
(46, 'root', 'Adios', 'cortes'),
(47, 'Gina', 'Hola  venden lecheros', 'root'),
(48, 'root', 'Si', 'Gina'),
(49, 'Gina', 'hay entrega a domicilio', 'root'),
(50, 'root', 'NO', 'Gina'),
(51, 'Gina', 'mmmmm', 'root'),
(52, 'Gina', 'voy a pedir en otro lado', 'root'),
(53, 'root', 'Ah bueno te me cuidas', 'Gina'),
(54, 'Omar', 'HOLA', 'root'),
(55, 'root', 'ADIOS', 'Omar');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
