CREATE DATABASE proyectoweb;
USE proyectoweb;

/*  PERFIL */
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id_perfil` int(11) AUTO_INCREMENT NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `perfil` VALUES (null, 'Desarrollador', 1),(null, 'Cliente', 1), (null, 'Pasajero', 1);

/*  EMPRESA  */

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) AUTO_INCREMENT NOT NULL,
  `rut` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `empresa` VALUES (null, '11.111.111-1', 1);

/*  USUARIOS  */

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) AUTO_INCREMENT NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_id_perfil_usuario` (`id_perfil`),
  CONSTRAINT `fk_id_perfil_usuario` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  KEY `fk_id_empresa_usuario` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_usuario` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `u6suario` VALUES (null, 'Luis','Méndez Méndez', 'luis.mendez18@inacapmail.cl','950919446', 1, md5('t0w1tf1tr'), 1), (null, 'Rodrigo','Manriquez Gonzalez', 'rodrigo.manriquez11@inacapmail.cl', '974489986', 1, md5('honda2013'), 1);

DROP TABLE IF EXISTS `chofer`;
CREATE TABLE `chofer` (
  `id_chofer` int(11) AUTO_INCREMENT NOT NULL,
  `rut` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_chofer`),
  KEY `fk_id_empresa_chofer` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_chofer` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `chofer` VALUES (null, '18657448-6','LUIS NOLBERTO', 'MENDEZ', 'MENDEZ', '950919446', 'LUISMENDEZ@OUTLOOK.CL', 1);

DROP TABLE IF EXISTS `micros`;
CREATE TABLE `micros` (
  `id_micros` int(11) AUTO_INCREMENT NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` varchar(50) NOT NULL,
  `patente` varchar(50) NOT NULL,
  `capacidad` varchar(50) NOT NULL,
  `kilometraje` varchar(50) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_micros`),
  KEY `fk_id_empresa_micros` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_micros` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `micros` VALUES (null, 'Mercedes Benz','915', '2010', 'FG9010', '25', '45000', 1);

DROP TABLE IF EXISTS `linea`;
CREATE TABLE `linea` (
  `id_linea` int(11) AUTO_INCREMENT NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_linea`),
  KEY `fk_id_empresa_linea` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_linea` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `linea` VALUES (null, 'LN-A','LINEA A', 1, 'LINEA A', 1);

DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `id_horario` int(11) AUTO_INCREMENT NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `fecha` date NOT NULL,
  `vigencia` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `fk_id_empresa_horario` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_horario` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `horario` VALUES (null, 'HRN-1','11:12:00', '11:12:00', '2018-03-25', '2019-03-25', 'HORARIO LUNES A VIERNES NORMAL', 1, 1);