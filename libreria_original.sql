-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2017 a las 19:06:47
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libreria`
--
CREATE DATABASE IF NOT EXISTS `libreria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libreria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `idlibros` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  PRIMARY KEY (`idlibros`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idlibros`, `titulo`, `precio`) VALUES
(1, 'Cómo construir un condensador de fluzo', '50.00'),
(2, '1001 utilidades de los clips', '120.00'),
(3, 'Aplicaciones prácticas de los neutrinos en la cocina', '15.00'),
(5, 'Don Pantuflo Zapatilla', '35.00'),
(6, 'Cocina creativa con escorpiones', '90.00'),
(7, '100 formas de cocinar un guisante', '78.00'),
(8, 'Zacarías Satrústegui: vida y milagros', '45.00'),
(9, 'Segismundo Picaporte', '560.00'),
(10, 'Zascandil y Zahorín: dos truhanes de postín', '76.00'),
(11, 'Testaferría avanzada', '35.00'),
(12, 'Como vivir como un Rey sin dar un palo al agua', '120.00'),
(13, 'Enciclopedia de los miriapodos', '600.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
