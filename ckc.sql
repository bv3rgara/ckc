-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2018 a las 00:41:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ckc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `id_detalle_factura` int(10) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(7) NOT NULL,
  `id_kinesiologo` int(3) NOT NULL,
  `id_os` int(3) NOT NULL,
  `tipo` char(1) NOT NULL,
  `id_instituto` int(3) NOT NULL,
  `dni_paciente` int(8) NOT NULL,
  `nya_paciente` varchar(80) NOT NULL,
  `honorario` double(6,2) NOT NULL,
  `sesion` int(1) NOT NULL,
  `total` double(6,2) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL COMMENT 'P=pendiente y L=liquidado',
  `usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id_detalle_factura`),
  UNIQUE KEY `id_factura_2` (`id_detalle_factura`),
  KEY `id_factura` (`id_detalle_factura`),
  KEY `periodo` (`periodo`),
  KEY `periodo_2` (`periodo`),
  KEY `id_kinesiologo` (`id_kinesiologo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle_factura`, `periodo`, `id_kinesiologo`, `id_os`, `tipo`, `id_instituto`, `dni_paciente`, `nya_paciente`, `honorario`, `sesion`, `total`, `fecha`, `estado`, `usuario`) VALUES
(1, '2018-04', 2, 2, 'D', 0, 33636950, 'Rosa Lugo', 250.00, 2, 500.00, '2018-04-11', 'L', 'tpepe'),
(7, '2018-04', 5, 2, 'D', 0, 33333333, 'Ilda Fernandez', 25.00, 3, 75.00, '2010-04-15', 'L', 'tpepe'),
(8, '2018-04', 6, 2, 'I', 2, 16541551, 'Cintia Rojas', 150.00, 1, 150.00, '2011-08-16', 'L', 'vcuri'),
(9, '2018-03', 6, 1, 'D', 0, 11054656, 'Liliana Ojeda', 50.00, 1, 50.00, '2011-11-11', 'P', 'tpepe'),
(10, '2018-03', 5, 2, 'D', 0, 18978456, 'Pedro Duarte', 25.00, 4, 100.00, '2012-11-08', 'P', 'tpepe'),
(11, '2017-11', 6, 4, 'I', 2, 11236548, 'Fulano de Tal', 40.00, 5, 200.00, '2018-02-22', 'P', 'bvergara'),
(12, '2018-04', 2, 2, 'D', 0, 21654645, 'Tia Cuca', 58.00, 5, 290.00, '2008-12-11', 'L', 'bvergara'),
(13, '2018-04', 6, 2, 'I', 1, 12312544, 'Ramon Lopez', 425.00, 1, 425.00, '2011-02-11', 'L', 'vcuri'),
(14, '2018-01', 5, 2, 'D', 0, 33564654, 'Fede Rico', 45.00, 3, 135.00, '2018-02-11', 'P', 'bvergara'),
(15, '2018-03', 2, 2, 'D', 0, 20564465, 'Marcelo Gomez', 556.00, 1, 556.00, '2018-01-11', 'P', 'bvergara'),
(16, '2018-03', 2, 2, 'D', 0, 15464565, 'Jorge Espindola', 454.00, 1, 454.00, '2018-11-11', 'P', 'vcuri'),
(17, '2016-03', 2, 4, 'D', 0, 39654564, 'Pepe Sonza', 145.00, 3, 435.00, '2015-02-11', 'P', 'pepe'),
(18, '2018-03', 5, 1, 'D', 0, 12300355, 'Imelda Kriten', 587.00, 1, 587.00, '2014-03-11', 'P', 'bvergara'),
(19, '2017-11', 6, 2, 'D', 0, 33636987, 'Mario Ledesma', 90.00, 4, 360.00, '2018-07-22', 'P', 'vcuri'),
(20, '2018-03', 11, 2, 'I', 1, 11259846, 'Ruperta Perez', 450.00, 3, 1350.00, '2018-03-11', 'P', 'bvergara'),
(21, '2016-03', 5, 1, 'D', 0, 12077757, 'Rita Alfonso', 55.00, 2, 110.00, '2018-11-30', 'P', 'vcuri'),
(22, '2016-01', 2, 1, 'D', 0, 33547789, 'Pedro Duarte', 111.00, 1, 111.00, '2018-12-30', 'P', 'tpepe'),
(23, '2018-02', 11, 1, 'D', 0, 31033569, 'Romina Lopez', 150.00, 4, 600.00, '2018-11-30', 'P', 'vcuri'),
(24, '2018-01', 2, 4, 'D', 0, 14123456, 'Norma Soledad', 125.00, 4, 500.00, '2018-01-31', 'L', 'vcuri'),
(25, '2018-01', 2, 4, 'D', 0, 11234567, 'Guadalupe Curi', 350.00, 4, 1400.00, '2018-01-30', 'L', 'tpepe'),
(26, '2018-01', 2, 4, 'I', 1, 33948245, 'Rocio Soloaga', 150.00, 9, 1350.00, '2018-01-31', 'L', 'vcuri');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `id_especialidad` smallint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre`, `estado`, `descripcion`) VALUES
(105, 'Ortopedia', 'B', 'Rama de la cirugía que se refiere a desórdenes del aparato locomotor, de sus partes musculares, ósea'),
(104, 'Traumatología', 'A', 'Rama de la medicina que se dedica al estudio de las lesiones del aparato locomotor.'),
(106, 'Deporte', 'A', 'Deportologo'),
(107, 'Neurología', 'A', 'Se ocupa de la anatomía, la fisiología y las enfermedades del sistema nervioso.'),
(108, 'Cardio-respiratorio', 'A', ''),
(109, 'Pediatría', 'B', 'Se ocupa del estudio del crecimiento y el desarrollo de los niños hasta la adolescencia.'),
(110, 'Estética', 'A', ''),
(111, 'Masajista', 'A', 'Masajes en zonas puntuales de dolor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(4) NOT NULL AUTO_INCREMENT,
  `id_os` smallint(4) NOT NULL,
  `periodo` varchar(7) NOT NULL,
  `tipo` char(1) NOT NULL,
  `nro` varchar(8) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_os`, `periodo`, `tipo`, `nro`, `usuario`, `estado`) VALUES
(5, 2, '2018-04', '', '', 'vcuri', 'L'),
(6, 4, '2018-01', '', '', 'vcuri', 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE IF NOT EXISTS `instituto` (
  `id_instituto` smallint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL,
  `tipo` int(2) NOT NULL COMMENT '1=privada y 2=publica',
  PRIMARY KEY (`id_instituto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`id_instituto`, `nombre`, `direccion`, `telefono`, `estado`, `tipo`) VALUES
(1, 'Instituto de Kinesiología', 'España 755', '0379 442-8195', 'A', 1),
(2, 'Centro Médico', 'Av 3 de Abril 869', '0379 443-5422', 'A', 2),
(3, 'Magin Vais Kinesiologia', ' Av. Juan Torres de Vera y Aragon 1458', '0379 448-9452', 'B', 1),
(5, 'Sanatorio San Juan', 'San Juan 1115', '0379-4-254877', 'A', 1),
(6, 'Hospital Escuela', 'Av. 3 De Abril 1224', ' 0370 421-8786', 'A', 2),
(7, 'Hospital Angela Llano', 'Ayacucho 3298', '0379 442-1081', 'A', 2),
(8, 'Hospital J.R. Vidal', 'Pje Vidal 1902', '0379 442-8453', 'A', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kinesiologo`
--

CREATE TABLE IF NOT EXISTS `kinesiologo` (
  `id_kinesiologo` bigint(10) NOT NULL AUTO_INCREMENT,
  `ayn` varchar(200) NOT NULL,
  `dom_cons` varchar(150) NOT NULL,
  `tel_cons` varchar(50) NOT NULL,
  `matricula` varchar(5) NOT NULL,
  `dni` int(8) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `dom_part` varchar(200) NOT NULL,
  `tel_part` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `cuit` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `id_especialidad` int(5) NOT NULL,
  PRIMARY KEY (`id_kinesiologo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100022 ;

--
-- Volcado de datos para la tabla `kinesiologo`
--

INSERT INTO `kinesiologo` (`id_kinesiologo`, `ayn`, `dom_cons`, `tel_cons`, `matricula`, `dni`, `observacion`, `dom_part`, `tel_part`, `mail`, `fecha_nac`, `cuit`, `sexo`, `estado`, `id_especialidad`) VALUES
(1, 'JOSE MARTINEZ', 'San Martin ', '44032456', '55592', 33948235, 'sin observacion', 'Castelli 899', '3794881778', 'jmartinez@outlook.com', '1988-12-18', '9339482355', 'M', 'A', 108),
(2, 'JUAN PEREZ', 'Bolivar 7601', '44500620', '96346', 21055879, 'buenas practicas', 'Gbor Ramirez 455', '656546545445645', 'vergara_bruno@outlook.com', '1975-01-23', '4210558790', 'M', 'A', 107),
(5, 'LORENA ESTEVEZ', 'Quintana 1800', '44110020', '21540', 12455690, 'RPG', 'Santa Fe 423', '555555', 'lorenita_45@hotmail.com', '1988-03-03', '6124556903', 'F', 'A', 110),
(6, 'JORGE QUINTEROS', 'Jujuy 776', '44636600', '41256', 31564165, 'especialista en rehabilitacion', 'Brandsen 3588', '', '', '1970-10-08', '4315641656', 'M', 'A', 108),
(11, 'JUAN ROMAN RIQUELME', 'Chaco 545', '45564456', '21540', 31258874, 'especialista en masajes', 'Jujuy 997', '3213214565', 'jrr@outlook.com', '1978-10-08', '0312588749', 'M', 'A', 111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra_social`
--

CREATE TABLE IF NOT EXISTS `obra_social` (
  `id_obra_social` smallint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL COMMENT 'A=activo - B=baja',
  `clasificacion` varchar(1) NOT NULL COMMENT '1=os, 2=mutual, , 3=prepaga',
  `cuit` int(20) NOT NULL,
  PRIMARY KEY (`id_obra_social`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10006 ;

--
-- Volcado de datos para la tabla `obra_social`
--

INSERT INTO `obra_social` (`id_obra_social`, `nombre`, `direccion`, `telefono`, `estado`, `clasificacion`, `cuit`) VALUES
(1, 'OSTRAC', 'san martin 1542', '4483964', 'A', '1', 458795560),
(2, 'OSPLAD', 'belgrano 88', '4458799', 'A', '1', 578998630),
(3, 'SCIS Prepaga', 'santa fe 755', '4452587', 'A', '3', 456687885),
(4, 'Medical Work', 'lavalle 546', '44520050', 'A', '2', 147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` mediumint(6) NOT NULL AUTO_INCREMENT,
  `doc` varchar(9) NOT NULL DEFAULT '',
  `apellido` varchar(40) NOT NULL DEFAULT '',
  `nombre` varchar(40) NOT NULL DEFAULT '',
  `direccion` varchar(60) NOT NULL DEFAULT '',
  `usuario` varchar(15) DEFAULT NULL,
  `categoria` varchar(30) NOT NULL,
  `vence` date NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `doc`, `apellido`, `nombre`, `direccion`, `usuario`, `categoria`, `vence`, `pass`) VALUES
(1, '33654565', 'Curi', 'Vanesa', 'Santa Fe 554', 'vcuri', 'ad', '0000-00-00', '123'),
(2, '33636988', 'Vergara', 'Bruno', 'Armenia 3548', 'bvergara', 'au', '0000-00-00', '123'),
(3, '31254588', 'Gomez', 'Lorena', 'Italia 545', 'lgomez', 'op', '0000-00-00', '123'),
(4, '30122564', 'Torales', 'Pepe', 'Marcito 545', 'tpepe', 'op', '0000-00-00', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
