-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2016 a las 01:35:34
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `compramigov2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE IF NOT EXISTS `caracteristicas` (
`id` int(30) NOT NULL,
  `id_producto` int(30) NOT NULL,
  `caracteristica` varchar(250) DEFAULT NULL,
  `descripcion` longtext
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `id_producto`, `caracteristica`, `descripcion`) VALUES
(88, 30, 'teclado', 'peso:10gr'),
(89, 31, 'xcx', 'cxc'),
(90, 32, 'asdf', 'sadf'),
(91, 33, '1', '1'),
(92, 34, '12121', 'sdfsd'),
(93, 35, 'cama matrimonial', 'la cama debe ser justa para su comodidad'),
(94, 36, 'Monitor Dell de 24" que te brinda una experiencia visual única y llena de detalles. También te ofrece 60 Hz de velocidad de imagen', 'Conectividad EthernetWi-Fi. Definición:  Full HD.'),
(95, 37, 'Todo es más sencillo con esta calculadora científica Casio', 'Funcionamiento dual.Funciones:  417.'),
(96, 38, 'Este escritorio modelo Russo Chocolate concede un ambiente organizado y cómodo ', '1 cajón, espacio para CPU,monitor y teclado.'),
(97, 39, ' horno de microondas Daewoo es tu mejor opción. Con él podrás preparar, calentar y hasta descongelar tus alimentos ', 'Capacidad:  1.1 ft³\r\n Cuenta con:  reloj digital, seguro para niños y sistema CRS.'),
(100, 42, 'paquete de 4 dip-swich red', 'dip-swich red de 2,4,6,8 entradas'),
(101, 43, 'protoboard', 'protoboard para voltajes regulados.'),
(102, 44, 'El control remoto requiere 4 pilas tipo"D', 'Kit de brazo mecánico para armar, con control.'),
(103, 45, 'camara para exteriores con bateria incluida.', 'camara para exteriores con capacidad '),
(104, 46, 'Sillón Ejecutivo de respaldo slto con cabecera\r\nMecanismo de rodilla multiposiciones\r\nCabecera y brazos fijos\r\nSoporte lumbar ajustable\r\n', 'Base cromada\r\nTapizado en piel NEGRA\r\nGarantia de 5 años contra defecto de fabrica'),
(127, 69, 'minitor apple con gran res.', 'ultra Hd'),
(113, 55, 'carro rojo', 'carro rapido'),
(126, 68, 'monitor 24 pg. smat tv', 'monitor 24 pg. smat tv \r\ninstalacion facil'),
(123, 65, '1', '1'),
(124, 66, 'sdf', 'asdf'),
(125, 67, 'monitor lcd', '42 pulgadas'),
(119, 61, 'jkljlkj', 'lkjlkjlk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
`id` int(30) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `src` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `descripcion`, `src`) VALUES
(38, 'Monitor Dell de 24"', 'img/productos/1e07ef_863bccmonitor.jpg'),
(39, 'Calculadora Científica Casio', 'img/productos/a5a057_611731calculadora1.jpg'),
(40, 'Escritorio Russo Cho.', 'img/productos/ebbd45_a8835eescritorio_Russo.jpg'),
(41, 'Horno de Microondas Daewoo', 'img/productos/1594f9_de7162microondas_c.jpg'),
(44, 'dip-swich red', 'img/productos/5f7551_5bcde5dip-switch.jpg'),
(45, 'protoboard', 'img/productos/b63c72_c65450protoboard1.jpg'),
(46, 'KIT brazo', 'img/productos/814a9b_014b38kit-brazo.jpg'),
(47, '', 'img/productos/25d521_a2c79agama.jpg'),
(48, 'silla ejecutiva1', 'img/productos/4c1669_d21f85silla12.jpg'),
(49, 'silla ejecutiva2', 'img/productos/c9348a_2ab009silla13.jpg'),
(50, 'silla ejecutiva3', 'img/productos/dc8bdc_caabc1silla11.jpg'),
(92, '', 'img/productos/81febe_616c8252648-m.jpg'),
(93, '', 'img/productos/dd1df3_1ed5b652648-rs.jpg'),
(99, '', 'img/productos/4ce663_92dc54archiveros1.jpg'),
(100, '', 'img/productos/facf1a_904ac6base-para-cama-matrimonial.jpg'),
(101, '', 'img/productos/df3da5_01b660monitorasus.jpg'),
(102, '', 'img/productos/64e2ff_75ab2dmonitorlg.jpg'),
(103, '', 'img/productos/9fe889_6f9072monitoraple.jpg'),
(104, '', 'img/productos/b22ecd_508831cama.jpg'),
(105, '', 'img/productos/ff3bd7_28b4f2laptopAsus1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_producto`
--

CREATE TABLE IF NOT EXISTS `imagen_producto` (
`id` int(30) NOT NULL,
  `id_imagen` int(30) NOT NULL,
  `id_producto` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `imagen_producto`
--

INSERT INTO `imagen_producto` (`id`, `id_imagen`, `id_producto`) VALUES
(26, 28, 26),
(27, 29, 27),
(28, 30, 28),
(29, 31, 28),
(30, 32, 30),
(31, 33, 31),
(32, 34, 32),
(33, 35, 33),
(34, 36, 34),
(36, 38, 36),
(37, 39, 37),
(38, 40, 38),
(39, 41, 39),
(42, 44, 42),
(43, 45, 43),
(44, 46, 44),
(45, 47, 45),
(46, 48, 46),
(47, 49, 46),
(48, 50, 46),
(90, 92, 61),
(91, 93, 61),
(97, 99, 55),
(98, 100, 66),
(99, 101, 67),
(100, 102, 68),
(101, 103, 69),
(102, 104, 35),
(103, 105, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
`id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `respuesta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id` int(30) NOT NULL,
  `id_vendedor` int(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(3) NOT NULL,
  `descuento` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_vendedor`, `nombre`, `precio`, `cantidad`, `descuento`, `activo`) VALUES
(35, 83, 'Cama', 2999, 1, 0, 1),
(36, 83, 'Monitor Dell 24"', 2099, 1, 0, 1),
(37, 83, 'Calculadora Científica', 399, 1, 0, 1),
(38, 83, 'Escritorio Russo.', 1399, 1, 0, 1),
(39, 83, 'Horno de Microondas Daewoo', 2099, 1, 0, 1),
(42, 84, 'dip-swich red', 20, 1, 0, 1),
(43, 84, 'protoboard', 80, 3, 0, 1),
(44, 84, 'Brazo mecánico ', 1099, 1, 0, 1),
(45, 84, 'Camara exterior', 1200, 1, 0, 1),
(46, 104, 'silla ejecutiva', 3800, 1, 0, 1),
(69, 83, 'monitor apple ', 6000, 2, 0, 1),
(68, 83, 'monitor Lg', 2000, 12, 0, 1),
(67, 83, 'monitor', 33, 23, 0, 1),
(55, 83, 'Carro', 50000, 1, 1, 1),
(66, 83, 'Camara exterior', 9000, 2, 10, 1),
(65, 83, 'x1', 1, 1, 1, 1),
(61, 83, 'asj', 33, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`id` int(30) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `nombre`) VALUES
(1, 'electronica'),
(2, 'hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_producto`
--

CREATE TABLE IF NOT EXISTS `tag_producto` (
`id` int(30) NOT NULL,
  `id_tag` int(30) NOT NULL,
  `id_producto` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `tag_producto`
--

INSERT INTO `tag_producto` (`id`, `id_tag`, `id_producto`) VALUES
(5, 1, 26),
(6, 1, 27),
(7, 2, 28),
(8, 1, 30),
(9, 1, 31),
(10, 1, 32),
(11, 1, 33),
(12, 1, 34),
(13, 2, 35),
(14, 1, 36),
(15, 1, 37),
(16, 2, 38),
(17, 1, 39),
(20, 1, 42),
(21, 1, 43),
(22, 1, 44),
(23, 1, 45),
(24, 2, 46),
(33, 5, 55),
(39, 1, 61),
(43, 1, 65),
(44, 2, 66),
(45, 1, 67),
(46, 1, 68),
(47, 1, 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Nombre`, `Apellidos`, `Email`, `Password`) VALUES
(83, 'Antonio', 'Mendez Juarez', 'alej-09@gmail.com', '12345'),
(84, 'Angel', 'Montes Murgas', 'angeloard@gmail.com', '12345'),
(85, 'esaud ', 'santiago', 'esa_cj27@hotmail.com', '2eab15fc72deb260bb01975f44d165'),
(86, 'angel', 'murgas', 'murgas@hotmail.com', '3e73eedab254fb225f946163ad7ad2'),
(87, 'leonardo', 'garcia ', 'leonardo@ndikandi.utm.mx', '020e60c6a84db8c5d4c2d56a4e4fe0'),
(88, 'carlos', 'peÃ±a', 'carlos12@ndikandi.utm', 'b6d3784d0de91cd568a6fe76dbe3f7'),
(100, 'Leonardo', 'Garcia', 'user@ndikandi.utm.mx', 'password'),
(101, 'monserrat', 'gonzalez', 'monserrat@ndikandi.utm.mx', 'c2625f56145c0b80157dbd4317fa50'),
(102, 'xyz', 'yyy', 'x@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0'),
(103, 'murgas', 'xox', 'm@gmail.com', '1234'),
(104, 'carlos', 'santos', 'carlos@utm.com.mx', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_producto` (`id_producto`), ADD FULLTEXT KEY `index_busqueda` (`caracteristica`), ADD FULLTEXT KEY `index_b` (`descripcion`,`caracteristica`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`id`), ADD KEY `id_vendedor` (`id_vendedor`,`id_cliente`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
 ADD PRIMARY KEY (`id`), ADD KEY `id_imagen` (`id_imagen`,`id_producto`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_vendedor` (`id_vendedor`,`id_producto`,`id_comprador`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id`), ADD KEY `id_vendedor` (`id_vendedor`), ADD FULLTEXT KEY `nombre` (`nombre`), ADD FULLTEXT KEY `index_busqueda` (`nombre`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag_producto`
--
ALTER TABLE `tag_producto`
 ADD PRIMARY KEY (`id`), ADD KEY `id_tag` (`id_tag`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tag_producto`
--
ALTER TABLE `tag_producto`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
