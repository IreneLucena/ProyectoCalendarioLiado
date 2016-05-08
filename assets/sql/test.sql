-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2016 a las 12:48:46
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetoreservable`
--

CREATE TABLE IF NOT EXISTS `objetoreservable` (
  `nombre` varchar(30) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `num_aula` varchar(10) NOT NULL,
  `capacidad` int(3) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `num_equipos` int(3) DEFAULT NULL,
  `red` varchar(2) NOT NULL,
  `proyector` varchar(2) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `objetoreservable`
--

INSERT INTO `objetoreservable` (`nombre`, `tipo`, `num_aula`, `capacidad`, `categoria`, `num_equipos`, `red`, `proyector`, `id`) VALUES
('Salón de actos', 'aula', '101', 150, 'multiusos', NULL, 'NO', 'SI', 1),
(NULL, 'aula', '203', 20, 'multimedia', 1, 'SI', 'SI', 2),
(NULL, 'aula', '207', 25, 'multimedia', 1, 'SI', 'NO', 3),
('Gimnasio', 'aula', '200', 100, 'gimnasio', NULL, 'NO', 'NO', 4),
('Pista baloncesto', 'aula', '201', 50, 'patio', NULL, 'NO', 'NO', 5),
('Pista fútbol', 'aula', '202', 50, 'patio', NULL, 'NO', 'NO', 6),
('Pista voleibol', 'aula', '204', 50, 'patio', NULL, 'NO', 'NO', 7),
(NULL, 'aula', '107', 30, 'tic', NULL, 'SI', 'SI', 8),
(NULL, 'aula', '108', 20, 'tic', NULL, 'SI', 'NO', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `clave` varchar(6) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `nick` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `clave`, `rol`, `correo`, `nick`, `password`) VALUES
(1, 'Ana', 'Arévalo', NULL, 'admin', 'admin_reyfernando@gmail.com', 'admin', 'admin'),
(2, 'Susana', 'Rebollo Méndez', 'sraaa2', NULL, NULL, NULL, NULL),
(3, 'Irene', 'Lucena Prieto', 'ilaaa2', NULL, NULL, NULL, NULL),
(4, 'Manuel', 'Velasco Prieto', 'mvaaa2', NULL, 'eliascorreo@hotmail.com', 'asd', 'a'),
(5, 'Alberto', 'Garay Cañas', 'agaaa1', NULL, NULL, NULL, NULL),
(6, 'Álvaro', 'González Sotillo', 'agsaa1', NULL, NULL, NULL, NULL),
(7, 'Pilar', 'Velasco', 'pvaaa1', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `objetoreservable`
--
ALTER TABLE `objetoreservable`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `objetoreservable`
--
ALTER TABLE `objetoreservable`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
