-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2024 a las 06:57:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hominis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliaciones`
--

CREATE TABLE `afiliaciones` (
  `id_afiliado` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `dni` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` text NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `afiliaciones`
--

INSERT INTO `afiliaciones` (`id_afiliado`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `email`, `fecha_nacimiento`) VALUES
(1, 'victoria', 'rios', 11234567, 'corrientes3934', 1122334455, 'mvriosdonadeo@emae.edu.ar', '2003-09-15'),
(2, 'erik', 'salinas', 99668452, 'corrientes3934', 1122334455, 'mvriosdonadeo@emae.edu.ar', '2003-09-14'),
(3, 'valeria', 'donadeo', 44632875, 'corrientes3934', 1166558899, 'v@gmail.com', '1974-11-08'),
(4, 'Luis', 'Ramírez', 11112222, 'Calle Uno 123', 555123456, 'luis.ramirez@example.com', '1982-03-15'),
(5, 'María', 'Fernández', 33334444, 'Avenida Dos 456', 555654321, 'maria.fernandez@example.com', '1975-06-22'),
(6, 'Miguel', 'Núñez', 55556666, 'Boulevard Tres 789', 555789123, 'miguel.nunez@example.com', '1990-09-30'),
(7, 'Laura', 'Jiménez', 77778888, 'Pasaje Cuatro 321', 555321789, 'laura.jimenez@example.com', '1988-12-12'),
(8, 'Brisa', 'Suraniti', 44852022, 'Brasil 3913', 1133078443, 'bri.suraniti@gmail.com', '2003-05-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `email` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `dni`, `telefono`, `direccion`, `email`, `fecha_nacimiento`, `user`, `password`) VALUES
(1, 'victoria', 'rios', 44938279, 1122334455, 'corrientes 3439', 'mvriosdonadeo@emae.edu.ar', '2003-09-15', 'vicky', '123'),
(2, 'Juan', 'Pérez', 12345678, 123456789, 'Calle Falsa 123', 'juan.perez@example.com', '1985-04-12', 'jperez', 'pass1234'),
(3, 'Ana', 'Gómez', 87654321, 987654321, 'Avenida Siempre Viva 456', 'ana.gomez@example.com', '1990-08-25', 'agomez', 'password567'),
(4, 'Carlos', 'López', 23456789, 456123789, 'Calle Luna 789', 'carlos.lopez@example.com', '1978-02-17', 'clopez', 'securepass890'),
(5, 'Lucía', 'Martínez', 34567890, 321654987, 'Avenida Sol 321', 'lucia.martinez@example.com', '1983-11-30', 'lmartinez', 'mypassword123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(1, 'Cardiología'),
(2, 'Pediatría'),
(3, 'Neurología'),
(4, 'Dermatología'),
(5, 'Ginecología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fecha_turno` date NOT NULL,
  `hora_turno` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `id_afiliado`, `id_empleado`, `id_especialidad`, `fecha_turno`, `hora_turno`) VALUES
(60, 1, 4, 1, '2222-02-22', '22:22:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliaciones`
--
ALTER TABLE `afiliaciones`
  ADD PRIMARY KEY (`id_afiliado`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_afiliado` (`id_afiliado`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliaciones`
--
ALTER TABLE `afiliaciones`
  MODIFY `id_afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_afiliado`) REFERENCES `afiliaciones` (`id_afiliado`),
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
