-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2023 a las 04:05:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmueble_ideal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `tamano` varchar(5) NOT NULL,
  `ciudad` varchar(40) NOT NULL,
  `barrio` varchar(40) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `tipo`, `categoria`, `precio`, `tamano`, `ciudad`, `barrio`, `foto`) VALUES
(1, 'Apartamento', 'Arriendo', 10000, '12222', 'Cucuta', 'LaFlorencia', '../upload/inmueble-2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_sol` int(11) NOT NULL,
  `id_inm` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `correo`, `clave`, `rol`) VALUES
(1234, 'UserX', 'X', 1234, 'UserX@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(2345, 'Pablo', 'martinez', 4333222, 'pablo@email.com', 'adcaec3805aa912c0d0b14a81bedb6ff', 'inmueble'),
(12334, 'nandn', 'dag', 3232, 'jaj@mail.com', 'de5b6e34f3a95c604b90801f619a81aa', 'usuarios'),
(21212, 'asudoausd', 'asndhauosdb', 1313, 'estivitonn19@gmail.com', 'a3dcb4d229de6fde0db5686dee47145d', '2'),
(111111, 'UserA', 'A', 111111, 'UserA@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2'),
(123456, 'Juan', 'Pablo', 32143, 'juan@emai.com', '827ccb0eea8a706c4c34a16891f84e7b', 'usuarios'),
(80356453, 'Jose Yesid', 'Garcia Romero', 3144046519, 'chatico19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(1011200847, 'nuevo usuarios', 'usuarios', 323232, 'mail@meil.com', '123', 'inmueble');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `id_inm` (`id_inm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_sol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011200851;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_inm`) REFERENCES `inmuebles` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
