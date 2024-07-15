-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-07-2024 a las 06:15:01
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutrihealth`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_administrador` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_administrador`, `usuario`, `contrasena`) VALUES
(1, 'David', '1234'),
(2, 'Dafne', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaciones`
--

DROP TABLE IF EXISTS `colaciones`;
CREATE TABLE IF NOT EXISTS `colaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_colacion` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `calorias` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `colaciones`
--

INSERT INTO `colaciones` (`id`, `nombre_colacion`, `imagen`, `calorias`) VALUES
(21, 'Hotcakes', 'hotcakes.jpg', 500),
(22, 'Huevo con jamón', 'huevo_jamon.jpg', 200),
(23, 'Platano', 'platano.jpeg', 20),
(24, 'Pollo', 'pechuga_pollo.jpg', 350),
(25, 'Filete de pescado', 'filete.jpg', 240);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `id_publicacion` int NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_publicacion_FK` (`id_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_de_comentario`
--

DROP TABLE IF EXISTS `comentario_de_comentario`;
CREATE TABLE IF NOT EXISTS `comentario_de_comentario` (
  `id_comentario_comentario` int NOT NULL AUTO_INCREMENT,
  `id_comentario` int NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_comentario_comentario`),
  KEY `id_comentario_FK` (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas`
--

DROP TABLE IF EXISTS `dietas`;
CREATE TABLE IF NOT EXISTS `dietas` (
  `id_dieta` int NOT NULL AUTO_INCREMENT,
  `colacion1` int DEFAULT NULL,
  `colacion2` int DEFAULT NULL,
  `colacion3` int DEFAULT NULL,
  `colacion4` int DEFAULT NULL,
  `colacion5` int DEFAULT NULL,
  PRIMARY KEY (`id_dieta`),
  KEY `colacion1` (`colacion1`),
  KEY `colacion2` (`colacion2`),
  KEY `colacion3` (`colacion3`),
  KEY `colacion4` (`colacion4`),
  KEY `colacion5` (`colacion5`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `dietas`
--

INSERT INTO `dietas` (`id_dieta`, `colacion1`, `colacion2`, `colacion3`, `colacion4`, `colacion5`) VALUES
(5, 21, 22, 23, 24, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

DROP TABLE IF EXISTS `ejercicios`;
CREATE TABLE IF NOT EXISTS `ejercicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_ejercicio` varchar(255) NOT NULL,
  `duracion` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `id_tipo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id`, `nombre_ejercicio`, `duracion`, `descripcion`, `id_tipo`) VALUES
(1, 'Saltar la cuerda', '15 minutos', 'Brincale', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_ingrediente` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `id_colacion` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_colacion` (`id_colacion`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre_ingrediente`, `cantidad`, `id_colacion`) VALUES
(22, 'harina', '500gr', 21),
(23, 'Huevo entero fresco', '5', 22),
(24, 'Frijoles cocidos ', '90gr', 22),
(25, 'platano', '1 pieza', 23),
(26, 'pechuga de pollo ', '200gr', 24),
(27, 'filete', '240gr', 25),
(28, 'tortilla', '2 piezas', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) NOT NULL,
  `cuerpo` varchar(500) NOT NULL,
  `likes` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ejercicio`
--

DROP TABLE IF EXISTS `tipo_ejercicio`;
CREATE TABLE IF NOT EXISTS `tipo_ejercicio` (
  `id_tipo` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_ejercicio`
--

INSERT INTO `tipo_ejercicio` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'cardio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `calorias` decimal(5,2) DEFAULT NULL,
  `estatura` decimal(5,2) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `sexo` enum('M','F','Otro') DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `correo`, `usuario`, `contraseña`, `peso`, `calorias`, `estatura`, `edad`, `sexo`, `fecha_registro`) VALUES
(1, 'Jesús David Treviño Gandarilla', 'jdtrevinog@hotmail.com', 'DavidTrev', '1234', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Jesús David Treviño Gandarilla', 'jdtrevinog@gmail.com', 'DavidTrevino', '1234', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Jesús David Treviño Gandarilla', 'jdtrevinodg@gmail.com', 'DavidTrevin', '1234', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Mario C', 'coyoy@upv.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Mario Coyoy ', 'coyy@upv.com', 'Mario', '1234', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `id_publicacion_FK` FOREIGN KEY (`id_publicacion`) REFERENCES `publicacion` (`id_publicacion`);

--
-- Filtros para la tabla `comentario_de_comentario`
--
ALTER TABLE `comentario_de_comentario`
  ADD CONSTRAINT `id_comentario_FK` FOREIGN KEY (`id_comentario`) REFERENCES `comentario` (`id_comentario`);

--
-- Filtros para la tabla `dietas`
--
ALTER TABLE `dietas`
  ADD CONSTRAINT `dietas_ibfk_1` FOREIGN KEY (`colacion1`) REFERENCES `colaciones` (`id`),
  ADD CONSTRAINT `dietas_ibfk_2` FOREIGN KEY (`colacion2`) REFERENCES `colaciones` (`id`),
  ADD CONSTRAINT `dietas_ibfk_3` FOREIGN KEY (`colacion3`) REFERENCES `colaciones` (`id`),
  ADD CONSTRAINT `dietas_ibfk_4` FOREIGN KEY (`colacion4`) REFERENCES `colaciones` (`id`),
  ADD CONSTRAINT `dietas_ibfk_5` FOREIGN KEY (`colacion5`) REFERENCES `colaciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
