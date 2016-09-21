-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2013 a las 10:24:11
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cedit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analista`
--

CREATE TABLE IF NOT EXISTS `analista` (
  `idAnalista` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Nickname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenya` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Ciudad_idCiudad` int(3) NOT NULL,
  `Sexo_idSexo` int(1) NOT NULL,
  `Status_idStatus` int(2) NOT NULL,
  PRIMARY KEY (`idAnalista`,`Ciudad_idCiudad`,`Sexo_idSexo`,`Status_idStatus`),
  KEY `fk_Usuarios_Ciudad1_idx` (`Ciudad_idCiudad`),
  KEY `fk_Usuarios_Sexo1_idx` (`Sexo_idSexo`),
  KEY `fk_Analista_Status1_idx` (`Status_idStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `idCiudad` int(3) NOT NULL AUTO_INCREMENT,
  `Ciudad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `Ciudad`) VALUES
(1, 'Querétaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas`
--

CREATE TABLE IF NOT EXISTS `coordenadas` (
  `idCoordenadas` int(11) NOT NULL AUTO_INCREMENT,
  `Tiempo` time NOT NULL,
  `Ruta_idRuta` int(11) NOT NULL,
  PRIMARY KEY (`idCoordenadas`,`Ruta_idRuta`),
  KEY `fk_Coordenadas_Ruta1_idx` (`Ruta_idRuta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `latitud`
--

CREATE TABLE IF NOT EXISTS `latitud` (
  `idLatitud` int(11) NOT NULL AUTO_INCREMENT,
  `ltGrados` int(3) NOT NULL,
  `ltMinutos` int(2) NOT NULL,
  `ltSegundos` float NOT NULL,
  `coordenadas_idCoordenadas` int(11) NOT NULL,
  PRIMARY KEY (`idLatitud`,`coordenadas_idCoordenadas`),
  KEY `fk_Latitud_coordenadas1_idx` (`coordenadas_idCoordenadas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `longitud`
--

CREATE TABLE IF NOT EXISTS `longitud` (
  `idLongitud` int(11) NOT NULL AUTO_INCREMENT,
  `lgGrados` int(3) NOT NULL,
  `lgMinutos` int(2) NOT NULL,
  `lgSegundos` float NOT NULL,
  `coordenadas_idCoordenadas` int(11) NOT NULL,
  PRIMARY KEY (`idLongitud`,`coordenadas_idCoordenadas`),
  KEY `fk_Longitud_coordenadas1_idx` (`coordenadas_idCoordenadas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `idRuta` int(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Tipo_Transporte_idTipo_Transporte` int(2) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idRuta`,`Usuarios_idUsuarios`,`Tipo_Transporte_idTipo_Transporte`),
  KEY `fk_Ruta_Usuarios_idx` (`Usuarios_idUsuarios`),
  KEY `fk_Ruta_Tipo_Transporte1_idx` (`Tipo_Transporte_idTipo_Transporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `idSexo` int(1) NOT NULL AUTO_INCREMENT,
  `Sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idSexo`, `Sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(2) NOT NULL AUTO_INCREMENT,
  `Status` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`idStatus`, `Status`) VALUES
(1, 'Activo'),
(2, 'Suspendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_transporte`
--

CREATE TABLE IF NOT EXISTS `tipo_transporte` (
  `idTipo_Transporte` int(2) NOT NULL AUTO_INCREMENT,
  `Transporte` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipo_Transporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipo_transporte`
--

INSERT INTO `tipo_transporte` (`idTipo_Transporte`, `Transporte`) VALUES
(1, 'Bicicleta'),
(2, 'Automovil'),
(3, 'Motocicleta'),
(4, 'Caminando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Nickname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenya` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Ciudad_idCiudad` int(3) NOT NULL,
  `Sexo_idSexo` int(1) NOT NULL,
  `Status_idStatus` int(2) NOT NULL,
  PRIMARY KEY (`idUsuarios`,`Ciudad_idCiudad`,`Sexo_idSexo`,`Status_idStatus`),
  KEY `fk_Usuarios_Ciudad1_idx` (`Ciudad_idCiudad`),
  KEY `fk_Usuarios_Sexo1_idx` (`Sexo_idSexo`),
  KEY `fk_Usuarios_Status1_idx` (`Status_idStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analista`
--
ALTER TABLE `analista`
  ADD CONSTRAINT `fk_Analista_Status1` FOREIGN KEY (`Status_idStatus`) REFERENCES `status` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Ciudad10` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Sexo10` FOREIGN KEY (`Sexo_idSexo`) REFERENCES `sexo` (`idSexo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  ADD CONSTRAINT `fk_Coordenadas_Ruta1` FOREIGN KEY (`Ruta_idRuta`) REFERENCES `ruta` (`idRuta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `latitud`
--
ALTER TABLE `latitud`
  ADD CONSTRAINT `fk_Latitud_coordenadas1` FOREIGN KEY (`coordenadas_idCoordenadas`) REFERENCES `coordenadas` (`idCoordenadas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `longitud`
--
ALTER TABLE `longitud`
  ADD CONSTRAINT `fk_Longitud_coordenadas1` FOREIGN KEY (`coordenadas_idCoordenadas`) REFERENCES `coordenadas` (`idCoordenadas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `fk_Ruta_Tipo_Transporte1` FOREIGN KEY (`Tipo_Transporte_idTipo_Transporte`) REFERENCES `tipo_transporte` (`idTipo_Transporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ruta_Usuarios` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Sexo1` FOREIGN KEY (`Sexo_idSexo`) REFERENCES `sexo` (`idSexo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Status1` FOREIGN KEY (`Status_idStatus`) REFERENCES `status` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
