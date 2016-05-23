-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2016 a las 19:37:17
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `soportando`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`company_id`, `name`) VALUES
(1, 'Empresa 1'),
(2, 'Empresa 2'),
(3, 'Q-antica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`cid`, `tel`, `uid`, `company_id`) VALUES
(1, '123123', 1, 1),
(2, '1234566', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `module`
--

INSERT INTO `module` (`module_id`, `package_id`, `name`) VALUES
(1, 1, 'Módulo 1'),
(2, 1, 'Módulo 2'),
(3, 2, 'Módulo 1'),
(4, 2, 'Módulo 2'),
(5, 3, 'Módulo 1'),
(6, 3, 'Módulo 2'),
(7, 4, 'Módulo 1'),
(8, 4, 'Módulo 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `package`
--

INSERT INTO `package` (`package_id`, `project_id`, `name`) VALUES
(1, 1, 'Paquete 1'),
(2, 1, 'Paquete 2'),
(3, 2, 'Paquete 1'),
(4, 2, 'Paquete 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`project_id`, `name`) VALUES
(1, 'Proyecto 1'),
(2, 'Proyecto 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repository`
--

CREATE TABLE IF NOT EXISTS `repository` (
  `id_repository` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `company_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `repository`
--

INSERT INTO `repository` (`id_repository`, `description`, `url`, `active`, `company_id`, `date`) VALUES
(1, 'Archivo de prueba', 'archivos/pdf1.pdf', 1, 1, '2016-05-16 14:17:00'),
(2, 'Foto', 'archivos/campeon.jpg', 1, 1, '2016-05-16 19:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `rid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rid`, `name`) VALUES
(1, 'Ingeniero de soporte'),
(2, 'Jefe de desarrollo'),
(3, 'Ingeniero de desarrollo'),
(4, 'Ingeniero de calidad'),
(5, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `reproducibility` text COLLATE utf8_unicode_ci NOT NULL,
  `cid` int(11) NOT NULL,
  `engineer_id` int(11) NOT NULL,
  `ticket_type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `ticket_status_id` int(11) NOT NULL DEFAULT '1',
  `status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `description`, `reproducibility`, `cid`, `engineer_id`, `ticket_type_id`, `company_id`, `module_id`, `priority_id`, `ticket_status_id`, `status_date`) VALUES
(1, 'Error 1', 'Hacer prueba 1', 1, 1, 2, 1, 3, 2, 3, '2016-04-25 01:48:53'),
(3, 'Error 2 ', 'Hacer prueba 2', 1, 3, 1, 2, 1, 3, 4, '2016-05-16 14:00:00'),
(4, 'Error 3', 'Hacer prueba 3', 2, 6, 1, 1, 4, 1, 7, '2016-05-01 18:00:00');

--
-- Disparadores `ticket`
--
DELIMITER $$
CREATE TRIGGER `register_history_status` BEFORE UPDATE ON `ticket`
 FOR EACH ROW BEGIN
SET NEW.status_date = CURRENT_TIMESTAMP();
INSERT INTO ticket_history (ticket_status_id, status_date, uid, ticket_id) 
VALUES (OLD.ticket_status_id, OLD.status_date, OLD.engineer_id, OLD.ticket_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_comment`
--

CREATE TABLE IF NOT EXISTS `ticket_comment` (
  `ticket_comment_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_history`
--

CREATE TABLE IF NOT EXISTS `ticket_history` (
  `ticket_history_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `ticket_status_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticket_history`
--

INSERT INTO `ticket_history` (`ticket_history_id`, `ticket_id`, `status_date`, `uid`, `ticket_status_id`) VALUES
(1, 1, '0000-00-00 00:00:00', 1, 1),
(2, 1, '0000-00-00 00:00:00', 1, 2),
(3, 1, '2016-04-25 01:37:37', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_priority`
--

CREATE TABLE IF NOT EXISTS `ticket_priority` (
  `priority_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticket_priority`
--

INSERT INTO `ticket_priority` (`priority_id`, `name`, `order`) VALUES
(1, 'Alta', 1),
(2, 'Medio', 2),
(3, 'Baja', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_status`
--

CREATE TABLE IF NOT EXISTS `ticket_status` (
  `ticket_status_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticket_status`
--

INSERT INTO `ticket_status` (`ticket_status_id`, `name`) VALUES
(1, 'Ticket en soporte'),
(2, 'Ticket en área de desarrollo'),
(3, 'Ticket asignado a desarrollador'),
(4, 'Ticket en validación QA'),
(5, 'Ticket en validación Soporte'),
(6, 'Ticket en validación Cliente'),
(7, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_type`
--

CREATE TABLE IF NOT EXISTS `ticket_type` (
  `ticket_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticket_type`
--

INSERT INTO `ticket_type` (`ticket_type_id`, `name`) VALUES
(1, 'Soporte'),
(2, 'Error');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_access` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `recover_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recover_due` timestamp NULL DEFAULT NULL,
  `ucompany_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`uid`, `rid`, `name`, `login`, `pass`, `email`, `last_access`, `active`, `recover_code`, `recover_due`, `ucompany_id`) VALUES
(1, 1, 'Mario Soporte', 'soporte', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'felipecanol@gmail.com', '2016-03-12 11:28:12', 1, NULL, NULL, 3),
(2, 2, 'Jefe Rubiano', 'jefe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'felipecanol@gmail.com', '2016-03-11 13:08:00', 1, NULL, NULL, 3),
(3, 3, 'Pedro Desarrollo', 'desarrollo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'felipecanol@gmail.com', NULL, 1, NULL, NULL, 3),
(4, 4, 'Maria Calidad', 'calidad', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'felipecanol@gmail.com', NULL, 1, NULL, NULL, 3),
(5, 5, 'Pepe Cliente', 'cliente', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'felipecanol@gmail.com', NULL, 1, NULL, NULL, 1),
(6, 5, 'Juan Rubiano', 'jnrubiano', '123', 'jnrubiano@gmail.com', NULL, 1, NULL, NULL, 1),
(7, 5, 'Prueba Cliente', 'prueba', '123', 'prueba@cliente.com', '2016-05-16 05:00:00', 1, NULL, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`), ADD KEY `company_id` (`company_id`), ADD KEY `uid` (`uid`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`), ADD KEY `package_id` (`package_id`);

--
-- Indices de la tabla `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`), ADD KEY `project_id` (`project_id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indices de la tabla `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id_repository`), ADD KEY `FK_REPOSITORY_COMPANY` (`company_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rid`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`), ADD KEY `ticket_type_id` (`ticket_type_id`), ADD KEY `company_id` (`company_id`), ADD KEY `module_id` (`module_id`), ADD KEY `priority_id` (`priority_id`), ADD KEY `engineer_id` (`engineer_id`), ADD KEY `ticket_status_id` (`ticket_status_id`), ADD KEY `cid` (`cid`);

--
-- Indices de la tabla `ticket_comment`
--
ALTER TABLE `ticket_comment`
  ADD PRIMARY KEY (`ticket_comment_id`), ADD KEY `ticket_id` (`ticket_id`), ADD KEY `uid` (`uid`);

--
-- Indices de la tabla `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD PRIMARY KEY (`ticket_history_id`), ADD KEY `ticket_id` (`ticket_id`), ADD KEY `ticket_status_id` (`ticket_status_id`), ADD KEY `uid` (`uid`), ADD KEY `ticket_id_2` (`ticket_id`);

--
-- Indices de la tabla `ticket_priority`
--
ALTER TABLE `ticket_priority`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indices de la tabla `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`ticket_status_id`);

--
-- Indices de la tabla `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`ticket_type_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`), ADD KEY `rid` (`rid`), ADD KEY `FK_USER_COMPANY` (`ucompany_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `repository`
--
ALTER TABLE `repository`
  MODIFY `id_repository` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ticket_comment`
--
ALTER TABLE `ticket_comment`
  MODIFY `ticket_comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ticket_history`
--
ALTER TABLE `ticket_history`
  MODIFY `ticket_history_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ticket_priority`
--
ALTER TABLE `ticket_priority`
  MODIFY `priority_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `ticket_status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `customer_user` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `module`
--
ALTER TABLE `module`
ADD CONSTRAINT `package_module` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `package`
--
ALTER TABLE `package`
ADD CONSTRAINT `project_package` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repository`
--
ALTER TABLE `repository`
ADD CONSTRAINT `FK_REPOSITORY_COMPANY` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
ADD CONSTRAINT `ticket_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_customer` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_engineer` FOREIGN KEY (`engineer_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_module` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_priority` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priority` (`priority_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_status` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status` (`ticket_status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_type` FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_type` (`ticket_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket_comment`
--
ALTER TABLE `ticket_comment`
ADD CONSTRAINT `comment_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comment_ticket_user` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket_history`
--
ALTER TABLE `ticket_history`
ADD CONSTRAINT `ticket_history_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_history_user` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_status_history` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status` (`ticket_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `FK_USER_COMPANY` FOREIGN KEY (`ucompany_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `user_rol` FOREIGN KEY (`rid`) REFERENCES `rol` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
