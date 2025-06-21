-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2025 a las 23:20:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `google`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'Mariana Gongalez', 'Mariana_gonzales@gmail.com', '$2y$10$IW1bKfZpdAgy1Znkm2owSum5lAsLd57aYlvSkSY7WwXCHlDRxiK42'),
(2, 'Ana de Armas', 'Ana_07_08@gmail.com', '$2y$10$y5WGqmWzBMtJ9S/FDVghL.kl0u7quUiVBmcp5rDUDqRggpdoNDqcK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_google`
--

CREATE TABLE `usuarios_google` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `proveedor` varchar(50) DEFAULT 'google',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_google`
--

INSERT INTO `usuarios_google` (`id`, `nombre`, `email`, `foto`, `proveedor`, `creado_en`, `estado`) VALUES
(2, 'Ale C.', 'tenzarth@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocIo7Fj5jvMO0_AvYQ2tKE_c_VxrcGOGkk3onEuz7hQmBeurwkz8=s96-c', 'google', '2025-06-20 17:11:03', 0),
(3, 'Yasumy Pastor Sánchez', 'yasumy.pastor.19@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocLnWUqXTUuJELiMdpZAEPQwlpiUMHSt5yDP8VvrL6Ey5J1bB0I=s96-c', 'google', '2025-06-20 21:07:57', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios_google`
--
ALTER TABLE `usuarios_google`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios_google`
--
ALTER TABLE `usuarios_google`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
