-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2019 a las 14:02:30
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--
CREATE DATABASE IF NOT EXISTS `libreria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libreria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idlibros` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idlibros`, `titulo`, `precio`) VALUES
(1, 'Cómo construir un condensador de fluzo', '57.00'),
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
(13, 'Enciclopedia de los miriapodos', '600.00'),
(22, 'bbbbb', '666.00'),
(45, 'milibro', '100.00'),
(46, 'tulibro', '89.00'),
(47, 'sulibro', '66.00'),
(49, 'zacarias y la noche perfecta', '56.00'),
(50, 'zacarias y su sueño', '45.00'),
(51, 'zacarias y su decisión', '22.00'),
(52, 'Cómo construir un condensador de fluzo II', '59.00'),
(54, 'milibrito', '12.00'),
(55, 'noches de color rosa', '99.00'),
(56, 'amanecer zulu ', '22.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idlibros`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idlibros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
