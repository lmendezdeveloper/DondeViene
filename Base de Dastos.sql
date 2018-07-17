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

INSERT INTO `usuario` VALUES (null, 'Luis','Méndez Méndez', 'luis.mendez18@inacapmail.cl','950919446', 1, md5('t0w1tf1tr'), 1), (null, 'Rodrigo','Manriquez Gonzalez', 'rodrigo.manriquez11@inacapmail.cl', '974489986', 1, md5('honda2013'), 1);

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

INSERT INTO `linea` VALUES (null, 'LN-D','LINEA D', 1, 'LINEA D', 1);

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

DROP TABLE IF EXISTS `tarifa`;
CREATE TABLE `tarifa` (
  `id_tarifa` int(11) AUTO_INCREMENT NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `tarifa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vigencia` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_tarifa`),
  KEY `fk_id_empresa_tarifa` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_tarifa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tarifa` VALUES (null, 'TRN-1','500', '2018-03-25', '2019-03-25', 'TARIFA LUNES A VIERNES NORMAL', 1, 1);

/* TIPO RECORRIDO */

DROP TABLE IF EXISTS `recorrido`;
CREATE TABLE `recorrido` (
  `id_recorrido` int(11) AUTO_INCREMENT NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,  
  `id_tarifa` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_recorrido`),
  KEY `fk_id_linea_recorrido` (`id_linea`),
  CONSTRAINT `fk_id_linea_recorrido` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`),
  KEY `fk_id_horario_recorrido` (`id_horario`),
  CONSTRAINT `fk_id_horario_recorrido` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`),
  KEY `fk_id_tarifa_recorrido` (`id_tarifa`),
  CONSTRAINT `fk_id_tarifa_recorrido` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifa` (`id_tarifa`),
  KEY `fk_id_empresa_recorrido` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_recorrido` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `recorrido` VALUES (null, 'RLDI', 'RECORRIDO LINEA D', 1, 1, 1, 1);

/* TIPO TRAYECTO */

DROP TABLE IF EXISTS `tipo_trayecto`;
CREATE TABLE `tipo_trayecto` (
  `id_tipo_trayecto` int(11) AUTO_INCREMENT NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_trayecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tipo_trayecto` VALUES (null, 'IDA'), (null, 'VUELTA'), (null, 'ESPECIAL');

/* TRAYECTO */

DROP TABLE IF EXISTS `trayecto`;
CREATE TABLE `trayecto` (
  `id_trayecto` int(11) AUTO_INCREMENT NOT NULL,
  `orden` int(11) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL,
  `id_recorrido` int(11) NOT NULL,
  `id_tipo_trayecto` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_trayecto`),
  KEY `fk_id_recorrido_trayecto` (`id_recorrido`),
  CONSTRAINT `fk_id_recorrido_trayecto` FOREIGN KEY (`id_recorrido`) REFERENCES `recorrido` (`id_recorrido`),
  KEY `fk_id_tipo_trayecto_trayecto` (`id_tipo_trayecto`),
  CONSTRAINT `fk_id_tipo_trayecto_trayecto` FOREIGN KEY (`id_tipo_trayecto`) REFERENCES `tipo_trayecto` (`id_tipo_trayecto`),
  KEY `fk_id_empresa_trayecto` (`id_empresa`),
  CONSTRAINT `fk_id_empresa_trayecto` FOREIGN KEY (`id_empresa`) REFERENCES `dv_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `trayecto` VALUES (null, 1, '-35429109', '-71629066', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 2, '-35429012', '-71629354', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 3, '-35426853', '-71628407', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 4, '-35429109', '-71629066', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 5, '-35424836', '-71624899', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 6, '-35424203', '-71624867', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 7, '-35424609', '-71627002', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 8, '-35424245', '-71627223', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 9, '-35423357', '-71628558', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 10, '-35428717', '-71632591', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 11, '-35432679', '-71634478', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 12, '-35431053', '-71639648', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 13, '-35429452', '-71640636', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 14, '-35429132', '-71641084', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 15, '-35428804', '-71645343', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 16, '-35425883', '-71645072', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 17, '-35425650', '-71645303', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 18, '-35425472', '-71646074', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 19, '-35425692', '-71647591', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 20, '-35425820', '-71647755', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 21, '-35426352', '-71647838', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 22, '-35426147', '-71650087', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 23, '-35428367', '-71650282', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 24, '-35429239', '-71650555', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 25, '-35429192', '-71650831', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 26, '-35429257', '-71651085', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 27, '-35429456', '-71651207', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 28, '-35429131', '-71655392', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 29, '-35428898', '-71655489', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 30, '-35428759', '-71657285', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 31, '-35428937', '-71657628', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 32, '-35427894', '-71670542', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 33, '-35429244', '-71672511', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 34, '-35433098', '-71675189', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 35, '-35433198', '-71675176', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 36, '-35434397', '-71672413', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 37, '-35441566', '-71675210', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 38, '-35441817', '-71675460', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 39, '-35440738', '-71677850', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 40, '-35442431', '-71679005', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 41, '-35443560', '-71678862', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 42, '-35444052', '-71679089', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 43, '-35444776', '-71679701', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 44, '-35444970', '-71680017', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 45, '-35445340', '-71680171', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 46, '-35447252', '-71681824', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 47, '-35456964', '-71682381', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 48, '-35457967', '-71682943', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 49, '-35456920', '-71685559', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 50, '-35453963', '-71683781', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 51, '-35453703', '-71685559', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 52, '-35453804', '-71686563', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 53, '-35453217', '-71689777', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 54, '-35453296', '-71690477', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 55, '-35454010', '-71690948', 1, 1, 1);
INSERT INTO `trayecto` VALUES (null, 56, '-35454986', '-71691959', 1, 1, 1);

DROP TABLE IF EXISTS `preferencia`;
CREATE TABLE `preferencia` (
  `id_preferencia` int(11) AUTO_INCREMENT NOT NULL,
  `puntuacion` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_preferencia`),
  KEY `fk_id_usuario_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `dv_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `preferencia`;
CREATE TABLE `preferencia` (
  `id_preferencia` int(11) AUTO_INCREMENT NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  PRIMARY KEY (`id_preferencia`),
  KEY `fk_id_usuario_preferencia` (`id_usuario`),
  CONSTRAINT `fk_id_usuario_preferencia` FOREIGN KEY (`id_usuario`) REFERENCES `dv_usuario` (`id_usuario`),
  KEY `fk_id_linea_preferencia` (`id_linea`),
  CONSTRAINT `fk_id_linea_preferencia` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `preferencia` VALUES (null, '2018-07-10', '18:00:00', 1, 1);