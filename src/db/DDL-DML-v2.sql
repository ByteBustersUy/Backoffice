DROP DATABASE IF EXISTS bytebusters_db;
DROP DATABASE IF EXISTS bytebusters2_db;

/* 
----------------------
---  BASE DE DATOS ---
--- bytebusters2_db ---
----------------------
 



agregar productos y categorias,


*/


CREATE DATABASE IF NOT EXISTS bytebusters2_db;




/*
----------------------
---- TABLA  ROLES ----
----------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`ROLES` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
-------------------------
---- TABLA  PERMISOS ----
-------------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`PERMISOS` (
  `ruta` varchar(255) NOT NULL,
  `accion` varchar(45) NOT NULL,
   PRIMARY KEY(`accion`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*
------------------------------
-- TABLA ROLES has PERMISOS --
------------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`ROLES_has_PERMISOS`( 
 `PERMISOS_accion` varchar(255) NOT NULL,
 `ROLES_id` int(11) NOT NULL,
 PRIMARY KEY (`ROLES_id`,`PERMISOS_accion`),
 FOREIGN KEY(`ROLES_id`)
 REFERENCES `bytebusters2_db`.`ROLES`(`id`),
 FOREIGN KEY(`PERMISOS_accion`)
 REFERENCES `bytebusters2_db`.`PERMISOS`(`accion`) 
 )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*
----------------------
--- TABLA USUARIOS ---
----------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`USUARIOS` (
  `ci` varchar(8) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `activo` boolean NOT NULL DEFAULT 1,
  PRIMARY KEY(`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------
-- TABLA DE EMPRESA --
----------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`EMPRESA`(
  `logo` varchar(255) NOT NULL,
  `rubro` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pwd_email` varchar(255) NOT NULL,
  `comentarios` varchar(255) NOT NULL,
  `usuario_ci` varchar(8) ,
  `fecha` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,  
  PRIMARY KEY(`nombre`),
  FOREIGN KEY(`usuario_ci`)
 REFERENCES `bytebusters2_db`.`USUARIOS`(`ci`) 
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------------
--TABLA USUARIOS has ROLES--
----------------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`USUARIOS_has_ROLES` (
  `USUARIOS_ci` varchar(15) NOT NULL,
  `ROLES_id` int(11) NOT NULL,
  PRIMARY KEY(`USUARIOS_ci`,`ROLES_id`),
  FOREIGN KEY(`USUARIOS_ci`)
  	REFERENCES `bytebusters2_db`.`USUARIOS`(`ci`),
  FOREIGN KEY(`ROLES_id`)
   	REFERENCES `bytebusters2_db`.`ROLES`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
-----------------------
--- TABLA PRODUCTOS ---
-----------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`PRODUCTOS`(
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` decimal NOT NULL,
  `usuario_ci` varchar(8),
  `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
  `activo` boolean NOT NULL DEFAULT 1,
  PRIMARY KEY(`id`),
  FOREIGN KEY(`usuario_ci`)
  REFERENCES `bytebusters2_db`.`USUARIOS`(`ci`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------
-- TABLA CATEGORIAS --
----------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`CATEGORIAS`(
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------------------
--TABLA PRODUCTOS has CATEGORIAS--
----------------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (
  `PRODUCTOS_id` int(11) NOT NULL,
  `CATEGORIAS_id` int(11)NOT NULL,
   PRIMARY KEY(`PRODUCTOS_id`,`CATEGORIAS_id`),
  FOREIGN KEY(`PRODUCTOS_id`)
  	REFERENCES `bytebusters2_db`.`PRODUCTOS`(`id`),
  FOREIGN KEY(`CATEGORIAS_id`)
   	REFERENCES `bytebusters2_db`.`CATEGORIAS`(`id`)
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
-------------------------
--- TABLA PROMOCIONES ---
-------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`PROMOCIONES`(
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descuento` decimal NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `activo` boolean NOT NULL DEFAULT 1,
 PRIMARY KEY(`id`,`nombre`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*
----------------------------------
--TABLA PRODUCTOS has PROMOCIONES--
----------------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters2_db`.`PRODUCTOS_has_PROMOCIONES` (
  `PRODUCTOS_id` int(11) NOT NULL,
  `PROMOCIONES_id` int(11)NOT NULL,
   PRIMARY KEY(`PRODUCTOS_id`,`PROMOCIONES_id`),
  FOREIGN KEY(`PRODUCTOS_id`)
  	REFERENCES `bytebusters2_db`.`PRODUCTOS`(`id`),
  FOREIGN KEY(`PROMOCIONES_id`)
   	REFERENCES `bytebusters2_db`.`PROMOCIONES`(`id`)	
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ---------------------------------------------------------------


/*
--------------------------------
--INSERT DE LA TABLA USUARIOS --
--------------------------------
*/
INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('55271656', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Angel', 'angellanzi.sl@gmail.com', 'Lanzi',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('46140143', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Federico', 'fdefortuny@gmail.com', 'de Fortuny',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('49273133', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Lucia', 'luciavinaf@gmail.com', 'Viña',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('51281100', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Anibal', 'anibalezequiel14@gmail.com', 'Almeida',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('49158527', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Damian', 'damiandespan@gmail.com', 'Despan',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('9168507', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Manolo', 'manopere@gmail.com', 'Perez',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('16850794', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Pepe', 'pepegome@gmail.com', 'Gomez',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('91827364', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Marcelo', 'torresmarce@gmail.com', 'Torres',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('56478921', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Cristina', 'borrazascristi@gmail.com', 'Borrazas',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('49862357', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Lorena', 'olivieralorena@gmail.com', 'Oliviera',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('9513674', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Carolina', 'caropollito123@gmail.com', 'Pollo',1);

INSERT INTO `bytebusters2_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`,`activo`) VALUES
('28463971', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Pablo', 'pclavo@gmail.com', 'Clavo',1);


/*
-----------------------------
--INSERT DE LA TABLA ROLES --
-----------------------------
*/
INSERT INTO `bytebusters2_db`.`ROLES` (`id`, `nombreRol`) VALUES ('1', 'admin');

INSERT INTO `bytebusters2_db`.`ROLES` (`id`, `nombreRol`) VALUES ('2', 'vendedor');



/*
------------------------------------------
--INSERT RELACIONANDO USUARIOS CON ROLES--
------------------------------------------
*/
INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('55271656', '1'), ('55271656', '2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('46140143', '1'), ('46140143', '2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('49273133', '1'), ('49273133', '2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('51281100', '1'), ('51281100', '2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('49158527', '1'), ('49158527', '2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('9168507', '2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('16850794', '1');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('91827364', '1'), ('91827364','2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('56478921', '1'), ('56478921','2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('49862357', '1'), ('49862357','2');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('9513674', '1');

INSERT INTO `bytebusters2_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('28463971','2');



/*
-----------------------------
--INSERT DE LA TABLA PERMISOS --
-----------------------------
*/

INSERT INTO `bytebusters2_db`.`PERMISOS` (`ruta`, `accion`) VALUES ('pages/config-empresa.php', 'config_empresa');

INSERT INTO `bytebusters2_db`.`PERMISOS` (`ruta`, `accion`) VALUES ('pages/descargas.php', 'descargas_documentos');

INSERT INTO `bytebusters2_db`.`PERMISOS` (`ruta`, `accion`) VALUES ('pages/abm-permisos.php', 'gestion_permisos');

INSERT INTO `bytebusters2_db`.`PERMISOS` (`ruta`, `accion`) VALUES ('pages/abm-productos.php', 'gestion_productos');

INSERT INTO `bytebusters2_db`.`PERMISOS` (`ruta`, `accion`) VALUES ('pages/abm-promociones.php', 'gestion_promociones');

INSERT INTO `bytebusters2_db`.`PERMISOS` (`ruta`, `accion`) VALUES ('pages/abm-usuarios.php', 'gestion_usuarios');
/*
--------------------------------------------
-- INSERT RELACIONANDO ROLES CON PERMISOS --
--------------------------------------------
*/
INSERT INTO `bytebusters2_db`.`ROLES_has_PERMISOS`(`PERMISOS_accion`,`ROLES_id`) VALUES('config_empresa', '1');
INSERT INTO `bytebusters2_db`.`ROLES_has_PERMISOS`(`PERMISOS_accion`,`ROLES_id`) VALUES('descargas_documentos', '2');
INSERT INTO `bytebusters2_db`.`ROLES_has_PERMISOS`(`PERMISOS_accion`,`ROLES_id`) VALUES('gestion_permisos', '1');
INSERT INTO `bytebusters2_db`.`ROLES_has_PERMISOS`(`PERMISOS_accion`,`ROLES_id`) VALUES('gestion_productos', '2');
INSERT INTO `bytebusters2_db`.`ROLES_has_PERMISOS`(`PERMISOS_accion`,`ROLES_id`) VALUES('gestion_promociones', '2');
INSERT INTO `bytebusters2_db`.`ROLES_has_PERMISOS`(`PERMISOS_accion`,`ROLES_id`) VALUES('gestion_usuarios', '1');
/* 
-------------------------------
--INSERT DE LA TABLA EMPRESA --
-------------------------------
*/
INSERT INTO `bytebusters2_db`.`empresa`(`logo`, `rubro`, `nombre`, `calle`, `numero`, `ciudad`, `telefono`, `instagram`, `whatsapp` , `email`, `pwd_email`, `comentarios`,`usuario_ci`) 
VALUES ('Default' ,'Default' , 'Default' , 'Default' , '1' ,'Default', 'Default', 'Default', 'Default' , 'Default' , 'Default' , 'Default','55271656');


/*
----------------------------------
--INSERT DE LA TABLA CATEGORIAS --
----------------------------------
*/
INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('1', 'Limpieza');

INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('2', 'Papeleria');

INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('3', 'Ferreteria');

INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('4', 'Textil');

INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('5', 'Perfumeria');

INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('6', 'Deporte');

INSERT INTO `bytebusters2_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('7', 'Tecnologia');



/*
---------------------------------
--INSERT DE LA TABLA PRODUCTOS --
---------------------------------
*/
INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`precio`,`usuario_ci`,`activo`) VALUES ('1', 'Pack 3 Rollos de Cocina NOVA Clásico', 'Rollos de papel doble hoja con alta absorción 
que permite retener mayor cantidad de líquido y aseguran un rendimiento más económico en todas las necesidades del hogar.', '1.jpg','1200','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('2', 'Tijera MAPED Sensoft 13 cm mango de goma', 'Los Mejores útiles para escolares 
encontralos en la web', '2.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('3','Lubricante WD-40 flexi tapa 220g','Lubricante WD-40 flexi tapa 220g, producto 
de excelente calidad.', '3.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('4','Toalla de Baño Azul Frape Bud 135 x 70 cm','Toalla de exelente calidad y textura', '4.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('5', 'Agua JANE 1L', 'El baño y la cocina son áreas altamente contaminadas de toda la casa, pero con 
agua Jane estan limpios en un segundo', '5.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('6','Repasador Ajedrez Cuadros' ,'Varios colores, 100% algodón, Medidas: 41 x 66 cm','6.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('7','Destornillador BRICOTECH','Destornillador BRICOTECH Mod. HL-S36-26 . 3.6 V','7.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('8','Papel natural A4 250h','Papel natural A4 250h 75 g 100% caña de azúcar.','8.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('9','Bolsa De Residuos Jardín Y Edificios Herradura 85 X 105 10 U','Bolsa De Residuos Jardín Y Edificios Herradura 85 X 105 10 U','9.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('10','Pincel 2in Hometech','Pincel 2in Hometech','10.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('11','Jabón de Tocador DOVE Original en Barra 90 G Pack x8','Jabón de Tocador DOVE Original en Barra 90 G Pack x8','11.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('12','
Cinta adhesiva TEORIA + 24mm x 50 m','Cinta adhesiva TEORIA + 24mm x 50 m','12.jpg','55271656',1);

INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('13','Paño microfibra LIDER','Paño microfibra LIDER','13.jpg','55271656',1);
INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('14','Pinza BRICOTECH pico loro 10','Pinza BRICOTECH pico loro 10','14.jpg','55271656',1);
INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('15','Cartucho HP Mod. 3YM78AL (667) tricolor P/2375/2775','Obtené el mejor rendimiento de tu impresora utilizando insumos originales. Los cartuchos originales HP ofrecen un excelente rendimiento y la mejor calidad de impresión','15.jpg','55271656',1);
INSERT INTO `bytebusters2_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`,`usuario_ci`,`activo`) VALUES ('16','Pelota WILSON Castaway','Si lo que buscas es diversión, está pelota es la ideal para vos. Podrás compartir junto a tus amigos de momentos inolvidables, diviértete a lo grande y a toda hora!','16.jpg','55271656',1);




/*
-----------------------------------------------
--INSERTS RELACIONANDO PRODUCTOS CON CATEGORIAS--
-----------------------------------------------

*/
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('1', '1');
 
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('2', '2');

INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('3', '3');

INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('4', '4');

INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('5', '1');

INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('6', '2');

INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('7', '3');

INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('8', '4');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('9', '1');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('10', '3');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('11', '5');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('12', '2');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('13', '1');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('14', '3');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('15', '7');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('16', '6');


/*
----------------------------------
--INSERT DE LA TABLA PROMOCIONES--
----------------------------------
*/
INSERT INTO `bytebusters2_db`.`PROMOCIONES` (`id`,`nombre`,`descuento`,`fechaInicio`,`fechaFin`,`activo`) VALUES ('1','dia del niño','9,90','7/7/23','14/9/23',1);
/*
------------------------------------------------
--INSER RELACIONANDO PRODUCTOS CON PROMOCIONES--
------------------------------------------------

*/
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_PROMOCIONES` (`PRODUCTOS_id`, `PROMOCIONES_id`) VALUES ('2', '1');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_PROMOCIONES` (`PRODUCTOS_id`, `PROMOCIONES_id`) VALUES ('4', '1');
INSERT INTO `bytebusters2_db`.`PRODUCTOS_has_PROMOCIONES` (`PRODUCTOS_id`, `PROMOCIONES_id`) VALUES ('6', '1');