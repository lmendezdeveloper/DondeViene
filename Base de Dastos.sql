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
  PRIMARY KEY (`id_usuario`),
  KEY `fk_id_perfil_usuario` (`id_perfil`),
  CONSTRAINT `fk_id_perfil_usuario` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario` VALUES (null, 'Luis','Méndez Méndez', 'luis.mendez18@inacapmail.cl','950919446', 1, md5('t0w1tf1tr')), (null, 'Rodrigo','Manriquez Gonzalez', 'rodrigo.manriquez11@inacapmail.cl', '974489986', 1, md5('honda2013'));

DROP TABLE IF EXISTS `chofer`;
CREATE TABLE `chofer` (
  `id_chofer` int(11) AUTO_INCREMENT NOT NULL,
  `rut` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id_chofer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `chofer` VALUES (null, '18657448-6','LUIS NOLBERTO', 'MENDEZ', 'MENDEZ', '950919446', 'luis.mendez18@inacapmail.cl');