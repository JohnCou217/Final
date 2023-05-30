-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2023 a las 05:46:53
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuelav2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `IdAlumnos` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Institucion` varchar(255) NOT NULL,
  `TipoServ` varchar(130) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `NumCel` varchar(10) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `NumEmerg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`IdAlumnos`, `Nombre`, `Institucion`, `TipoServ`, `Direccion`, `NumCel`, `Correo`, `NumEmerg`) VALUES
(1, 'eric', 'itsz', 'residencias', 'norte 10', '234567890', 'er@itsz', '1234567'),
(2, '2eric', '2itsz', '2residencias', '2norte 10', '234567890', 'er@itsz', '1234567'),
(3, 'Jonathan Irvin Coutiño Paredes ', 'ITSZ', 'Residencias', 'Calle d la laguna #1223', '2929292929', '', '8383488438'),
(5, 'GIOVANNI EUGENIO HERNANDEZ', 'ITSZ', 'Practicas Profesionales', 'Nogales', '2993289348', '', '8383488438'),
(6, 'GIOVANNI EUGENIO HERNANDEZ', 'ITSZ', 'Practicas Profesionales', 'Nogales', '2993289348', 'gio@1124', '8383488438'),
(7, 'John', 'PH', 'Residencias', 'Calle d la laguna #122E3RFEVDFVSVSVSV', '2721258871', 'gio@11241', '2721700558'),
(8, 'John', 'PH', 'Residencias', 'Calle d la laguna #122E3RFEVDFVSVSVSV', '2721258871', 'gio@11241', '2721700558'),
(9, 'Jesus omar', 'ITSZ', 'Practicas Profesionales', 'Calle d la laguna #122E3RFEVDFVSVSVSV', '2929292929', 'gio@11241', '2721700558'),
(10, 'Jonathan Irvin Coutiño Paredes ', 'ITSZ', 'Practicas Profesionales', 'Calle d la laguna #122E3RFEVDFVSVSVSV', '2721258871', 'coutinoj22@gmail.com', '2277273829'),
(11, 'Alba Laura Mendoza Gutierrez', 'Ayuntamiento', 'Practicas Profesionales', 'Nogales', '2929292929', 'AlbaLau@gmail.com', '2288993344');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `IdDocs` int(11) NOT NULL,
  `nombreDoc` varchar(255) NOT NULL,
  `Id_Alumno_fk` int(255) NOT NULL,
  `ruta` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`IdDocs`, `nombreDoc`, `Id_Alumno_fk`, `ruta`) VALUES
(57, 'Presentación', 10, 'fpdf/PRESENTACIÓN - Impacto del desabasto de chips en la comunidad estudiantil de ISC del ITSZ extensión Nogales (2).pptx'),
(58, 'Carta de Aceptación', 6, 'fpdf/aaa12dbf-6a39-46c6-9d87-bb98c34b19d7.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(2) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `contraseña`) VALUES
(1, 'Admin1', 'x_wZ56oA3');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `misdocumentos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `misdocumentos` (
`IdDocs` int(11)
,`nombreDoc` varchar(255)
,`Nombre` varchar(255)
,`ruta` varchar(130)
,`Id_Alumno_fk` int(255)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `misdocumentos`
--
DROP TABLE IF EXISTS `misdocumentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `misdocumentos`  AS SELECT `d`.`IdDocs` AS `IdDocs`, `d`.`nombreDoc` AS `nombreDoc`, `a`.`Nombre` AS `Nombre`, `d`.`ruta` AS `ruta`, `d`.`Id_Alumno_fk` AS `Id_Alumno_fk` FROM (`documentos` `d` join `alumnos` `a` on(`d`.`Id_Alumno_fk` = `a`.`IdAlumnos`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`IdAlumnos`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`IdDocs`),
  ADD KEY `fk_documentos_alumnos` (`Id_Alumno_fk`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `IdAlumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `IdDocs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_documentos_alumnos` FOREIGN KEY (`Id_Alumno_fk`) REFERENCES `alumnos` (`IdAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
