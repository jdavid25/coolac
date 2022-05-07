-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2021 a las 19:51:41
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coolac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO'),
(3, 'PENDIENTE'),
(4, 'ELIMINADO'),
(5, 'RECHAZADO'),
(6, 'APROBADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `estado_id`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'USUARIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_saldo`
--

CREATE TABLE `solicitud_saldo` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado_id` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud_saldo`
--

INSERT INTO `solicitud_saldo` (`id`, `cantidad`, `usuario_id`, `estado_id`) VALUES
(1, 50000, 2, 6),
(2, 100000, 2, 5),
(3, 30000, 3, 6),
(4, 70000, 3, 6),
(5, 25000, 3, 6),
(6, 70000, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(255) NOT NULL,
  `num_documento` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `saldo` int(11) DEFAULT 0,
  `rol_id` int(11) DEFAULT 2,
  `estado_id` int(11) DEFAULT 1,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipo_documento`, `num_documento`, `nombre`, `apellido`, `email`, `nickname`, `clave`, `saldo`, `rol_id`, `estado_id`, `telefono`) VALUES
(1, 'cedula ciudadania', 11111, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', 0, 1, 1, '3217411595'),
(2, 'cedula extranjeria', 22222, 'Jose', 'Perez', 'perez@mail.com', 'perez', 'perez', 50000, 2, 1, '3621457895'),
(3, 'cedula ciudadania', 33333, 'Maria', 'Diaz', 'diaz@mail.com', 'diaz', 'diaz', 125000, 2, 1, '3254569874');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_saldo`
--
ALTER TABLE `solicitud_saldo`
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
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud_saldo`
--
ALTER TABLE `solicitud_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
