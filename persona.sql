-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-12-2024 a las 18:22:33
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `persona`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipdocum`
--

DROP TABLE IF EXISTS `tipdocum`;
CREATE TABLE IF NOT EXISTS `tipdocum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomTipDocum` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipdocum`
--

INSERT INTO `tipdocum` (`id`, `nomTipDocum`) VALUES
(1, 'CC'),
(2, 'TI'),
(3, 'RC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_documento` varchar(20) DEFAULT NULL,
  `tipo_documento` int DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_documento` (`tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `numero_documento`, `tipo_documento`, `nombre`, `telefono`, `foto`) VALUES
(1, '1234', 2, 'Albert', '147', 'Ofimatica.jpg'),
(2, '456', 2, 'Veronica B', '258', 'java.png'),
(3, '789', 1, 'Manuel', '369', 'MySQL.jpeg'),
(4, '321', 1, 'Paula M', '741', '11.png'),
(5, '654', 2, 'Marcela', '963', 'php.jpg'),
(6, '5825', 2, 'Andres', '3115', 'VOZ.png'),
(7, '1110234567', 3, 'Mariana', NULL, NULL),
(8, '1110234567', 3, 'Mariana', NULL, NULL),
(9, '987456', 2, 'Juanito', '7458', 'ADSI2.jpg'),
(10, NULL, NULL, NULL, NULL, NULL),
(11, '5789456', 3, 'Paulina', '3112356789', 'carro.jpg'),
(12, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_documento`) REFERENCES `tipdocum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
