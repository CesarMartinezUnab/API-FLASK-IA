-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2025 a las 23:39:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

create database academia_virtual;
use academia_virtual;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academia_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE usuarios (
  id int(11) NOT NULL,
  nombre varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  contraseña varchar(255) NOT NULL,
  rol enum('estudiante','tutor') NOT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO usuarios (id, nombre, email, contraseña, rol, fecha_registro) VALUES
(1, 'Usuario 1', 'cr0622022022@unab.edu.sv', '$2y$10$rdqFQMRlEqfQlAZLSfDBoue.qlBH.Daq5m12hO6SsAHR5WJll.PVC', 'tutor', '2025-04-10 20:47:15'),
(2, 'Usuario 2', 're2430012022@unab.edu.sv', '$2y$10$rdqFQMRlEqfQlAZLSfDBoue.qlBH.Daq5m12hO6SsAHR5WJll.PVC', 'estudiante', '2025-04-10 20:47:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE usuarios
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY `email` (email);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE usuarios
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
