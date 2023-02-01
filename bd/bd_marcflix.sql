-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-02-2023 a las 18:00:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_marcflix`
--
CREATE DATABASE IF NOT EXISTS `bd_marcflix` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_marcflix`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nombre`, `correo`, `password`) VALUES
(1, 'Marc Admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `id_serie` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_revision`
--

CREATE TABLE `tbl_revision` (
  `id_revision` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasenya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_revision`
--

INSERT INTO `tbl_revision` (`id_revision`, `nombre`, `correo`, `contrasenya`) VALUES
(32, 'Sergi', 'sergi@gmail.com', '123'),
(33, 'Lay', 'lay@gmail.com', '123'),
(34, 'Oscar', 'oscar@gmail.com', '123'),
(35, 'Alberto', 'alberto@gmail.com', '123'),
(36, 'Gerard Orobitg', 'gerard@gmail.com', '123'),
(37, 'Danny', 'danny@gmail.com', '123'),
(38, 'Agnes', 'agnes@gmail.cat', '123'),
(40, 'Silvia', 'silvia@hotmail.es', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_series`
--

CREATE TABLE `tbl_series` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `ruta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_series`
--

INSERT INTO `tbl_series` (`id`, `nombre`, `ruta`) VALUES
(55, 'Caida en Picado', '16738975371.jpg'),
(56, 'Abstract', '16738975422.jpg'),
(57, 'Spotify', '16738975483.jpg'),
(58, 'La Casa de Papel', '16738975534.jpg'),
(59, 'Stranger Things', '16738975625.jpg'),
(60, 'Outer Banks', '16738975676.jpg'),
(61, 'Caleidoscopio', '16738975727.jpg'),
(62, 'Manifest', '16738975778.jpg'),
(63, 'El Nuevo Empleado', '16738976059.jpg'),
(64, 'Merlí', '167389761310.jpg'),
(65, 'Black Mirror', '167389761811.jpg'),
(66, 'Smiley', '167389762212.jpg'),
(67, 'Miercoles', '167389762813.jpg'),
(68, 'Vikingos', '167389763314.jpg'),
(69, 'Los 100', '167389763815.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `contrasenya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuarios`, `nombre`, `correo`, `contrasenya`) VALUES
(21, 'Marc', 'marc@gmail.com', '123'),
(22, 'Toni', 'toni@hotmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_serie` (`id_serie`);

--
-- Indices de la tabla `tbl_revision`
--
ALTER TABLE `tbl_revision`
  ADD PRIMARY KEY (`id_revision`);

--
-- Indices de la tabla `tbl_series`
--
ALTER TABLE `tbl_series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `tbl_revision`
--
ALTER TABLE `tbl_revision`
  MODIFY `id_revision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tbl_series`
--
ALTER TABLE `tbl_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `tbl_likes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_likes_ibfk_2` FOREIGN KEY (`id_serie`) REFERENCES `tbl_series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
