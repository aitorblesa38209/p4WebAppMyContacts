-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2016 a las 23:37:40
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mycontacts`
--
CREATE DATABASE IF NOT EXISTS `bd_mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_mycontacts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactos`
--

CREATE TABLE IF NOT EXISTS `tbl_contactos` (
  `con_id` int(11) NOT NULL,
  `con_nombre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `con_apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `con_mail` varchar(50) NOT NULL,
  `con_telefono` int(9) NOT NULL,
  `con_direccion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `con_coordenadas` varchar(50) NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contactos`
--

INSERT INTO `tbl_contactos` (`con_id`, `con_nombre`, `con_apellido`, `con_mail`, `con_telefono`, `con_direccion`, `con_coordenadas`, `usu_id`) VALUES
(1, 'mateo', 'hermosilla', 'mateo@gmail.com', 665443225, 'Carrer de Bellaterra, 23', '41.3587584278074,2.1081680059432983', 1),
(2, 'FELIPE', 'MACARRO', 'iglesias.pipe@gmail.com', 618555333, 'Rambla de la Marina 120', '41.35257348857752,2.0741790533065796', 1),
(3, 'jose', 'luis', 'felipe_iglesias@hotmail.com', 665652321, 'Rambla de la Marina 200', '41.37357412061872,2.0824187994003296', 1),
(4, 'armand', 'ter', 'arm@gmd.com', 652585321, 'calle alfarero', '41.38040108684917,2.1095412969589233', 1),
(5, 'sara', 'iglesias', 'igl@gmail.com', 554454362, 'La Maternitat i Sant Ramon, Barcelona, Barcelona, EspaÃ±a', '41.38040108684917,2.1095412969589233', 1),
(6, 'lara', 'gil', 'lara@gmail.com', 535252523, 'Vila de GrÃ cia, Barcelona, Barcelona, EspaÃ±a', '41.40216530678013,2.1617263555526733', 1),
(7, 'marcos', 'pÃ©rez', 'marcos@gmail.com', 665656565, 'Esplugues de Llobregat, Barcelona, EspaÃ±a', '41.37627923068766,2.087225317955017', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `usu_id` int(5) NOT NULL,
  `usu_nombre` varchar(25) NOT NULL,
  `usu_apellido` varchar(50) NOT NULL,
  `usu_mail` varchar(50) NOT NULL,
  `usu_pass` varchar(32) NOT NULL,
  `usu_telefono` int(9) NOT NULL,
  `usu_direccion` varchar(50) NOT NULL,
  `usu_latitud` float NOT NULL,
  `usu_longitud` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_pass`, `usu_telefono`, `usu_direccion`, `usu_latitud`, `usu_longitud`) VALUES
(1, 'Aitor', 'Blesa', 'aitor@gmail.com', '0d14d4eb90fa5b330167e4408b5c1d59', 666555444, 'Avinguda Mare de Deu 110', 41.35, 2.1077),
(2, 'Felipe', 'Iglesias', 'felipe@gmail.com', '7e04da88cbb8cc933c7b89fbfe121cca', 665443225, 'Avinguda d''Europa, 15-39', 41.3536, 2.11459);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  ADD PRIMARY KEY (`con_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
