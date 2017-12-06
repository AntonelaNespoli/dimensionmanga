-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2017 a las 21:57:58
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dimensionmanga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(12, '+16'),
(13, 'ATP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fk_id_manga` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `comentario`, `puntaje`, `fk_id_manga`, `fk_id_usuario`) VALUES
(1, 'Recomendable, muy buen manga.', 5, 46, 1),
(2, 'Recomendable, muy buen manga.', 5, 46, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `fk_id_manga` int(11) NOT NULL,
  `ruta` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `fk_id_manga`, `ruta`) VALUES
(66, 46, 'images/5a130bf6eb92e.jpg'),
(67, 46, 'images/5a130bf6eba04.jpg'),
(68, 46, 'images/5a130bf6eba7d.jpg'),
(69, 47, 'images/5a130c5244de7.jpg'),
(70, 47, 'images/5a130c5244ec1.jpg'),
(71, 47, 'images/5a130c5244f32.jpg'),
(72, 48, 'images/5a130c6b1689d.jpg'),
(73, 48, 'images/5a130c6b16b62.jpg'),
(74, 48, 'images/5a130c6b16c1b.jpg'),
(75, 49, 'images/5a130c88046af.jpg'),
(76, 49, 'images/5a130c88051f4.jpg'),
(77, 49, 'images/5a130c88052ce.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manga`
--

CREATE TABLE `manga` (
  `id_manga` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `manga`
--

INSERT INTO `manga` (`id_manga`, `nombre`, `autor`, `descripcion`, `id_categoria`) VALUES
(46, 'One Piece', 'Eiichiro Oda', 'La serie comienza con la ejecución de Gol D. Roger, un hombre conocido como el Rey de los Piratas. Poco antes de su muerte, Roger hace mención a su gran tesoro legendario, el \"One Piece\", y a que puede ser tomado por todo aquél que lo desee. Ésto marca el inicio de una era conocida como la Gran Era Pirata. Como resultado, un sinnúmero de piratas zarparon hacia Grand Line con el objetivo de encontrarlo...', 12),
(47, 'One Puch-Man', 'One', 'La historia tiene lugar en una metrópolis ficticia conocida como Ciudad Z, en Japón. El mundo se ve invadido por extraños monstruos que aparecen misteriosamente y que causan numerosos desastres a la población. Saitama es un poderoso superhéroe calvo que derrota fácilmente a los monstruos u otros villanos con un único golpe de su puño. Debido a esto, Saitama ha encontrado aburrida su fuerza y siempre está tratando de encontrar rivales...', 12),
(48, 'Haikyuu', 'Haruichi Furudate', 'La historia da comienzo cuando Sh?y? Hinata, aún siendo un estudiante de primaria, ve un partido de voleibol por la televisión, en el cual jugaba un jugador al que él se refiere como \"Pequeño Gigante\". Desde entonces, pretende convertirse en alguien como el \"Pequeño Gigante\" debido a que ambos son bajos de estatura y comienza a aficionarse por este deporte. Sh?y? logra montar su propio club de voleibol...', 13),
(49, 'Boku no hero academia', 'Kohei Horikoshi', 'El 80% de la población mundial ha desarrollado superpoderes. Como consecuencia, han surgido tantos superhéroes como supervillanos. Izuku Midoriya es parte de ese 20% sin ningún poder sobrenatural. Sin embargo, su mayor deseo es poder estudiar en la U.A. y convertirse en un héroe como su ídolo All Might...', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `super_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `mail`, `clave`, `super_user`) VALUES
(1, 'Antonela_Admin', 'antonela@admin.php', '$2y$10$r5yosfSVwLgCbprBrolX9us1zbq2WkCQFCrd5PCxAC/kMsBfYrzey', 1),
(2, 'antonela93', 'user1@dimensionmanga.php', '$2y$10$LfBkxAtvphLHBApLMYyZJuaFik29bP0RRPir4pbPYLzfzHMQUk.yO', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_id_manga` (`fk_id_manga`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_id_manga` (`fk_id_manga`);

--
-- Indices de la tabla `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id_manga`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `manga`
--
ALTER TABLE `manga`
  MODIFY `id_manga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_id_manga`) REFERENCES `manga` (`id_manga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`fk_id_manga`) REFERENCES `manga` (`id_manga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
