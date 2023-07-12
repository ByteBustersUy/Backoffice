/* 
----------------------
---  BASE DE DATOS ---
--- bytebusters_db ---
----------------------
*/


CREATE DATABASE IF NOT EXISTS bytebusters_db;

DROP TABLE IF EXISTS `bytebusters_db`.`USUARIOS_has_ROLES`;
DROP TABLE IF EXISTS `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS`;
DROP TABLE IF EXISTS `bytebusters_db`.`PRODUCTOS_has_PROMOCIONES`;
DROP TABLE IF EXISTS `bytebusters_db`.`EMPRESA`;
DROP TABLE IF EXISTS `bytebusters_db`.`RUTAS`;
DROP TABLE IF EXISTS `bytebusters_db`.`ROLES`;
DROP TABLE IF EXISTS `bytebusters_db`.`USUARIOS`;
DROP TABLE IF EXISTS `bytebusters_db`.`PROMOCIONES`;
DROP TABLE IF EXISTS `bytebusters_db`.`PRODUCTOS`;
DROP TABLE IF EXISTS `bytebusters_db`.`CATEGORIAS`;

/*
----------------------
-- TABLA DE EMPRESA --
----------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters_db`.`EMPRESA`(
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
  PRIMARY KEY(`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------
---- TABLA  ROLES ----
----------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters_db`.`ROLES` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------
---- TABLA  RUTAS ----
----------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters_db`.`RUTAS` (
  `ruta` VARCHAR(255) NOT NULL,
  `accion` VARCHAR(45) NOT NULL,
  `rolesId` INT(11) NOT NULL,
  PRIMARY KEY(`accion`,`rolesId`),
  FOREIGN KEY(`rolesId`)
    REFERENCES `bytebusters_db`.`ROLES`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------
--- TABLA USUARIOS ---
----------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters_db`.`USUARIOS` (
  `ci` varchar(8) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY(`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------------
--TABLA USUARIOS has ROLES--
----------------------------
*/

CREATE TABLE IF NOT EXISTS `bytebusters_db`.`USUARIOS_has_ROLES` (
  `USUARIOS_ci` varchar(15) NOT NULL,
  `ROLES_id` int(11) NOT NULL,
  PRIMARY KEY(`USUARIOS_ci`,`ROLES_id`),
  FOREIGN KEY(`USUARIOS_ci`)
    REFERENCES `bytebusters_db`.`USUARIOS`(`ci`),
  FOREIGN KEY(`ROLES_id`)
    REFERENCES `bytebusters_db`.`ROLES`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
-----------------------
--- TABLA PRODUCTOS ---
-----------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters_db`.`PRODUCTOS`(
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------
-- TABLA CATEGORIAS --
----------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters_db`.`CATEGORIAS`(
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
----------------------------------
--TABLA PRODUCTOS has CATEGORIAS--
----------------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (
  `PRODUCTOS_id` int(11) NOT NULL,
  `CATEGORIAS_id` int(11)NOT NULL,
  PRIMARY KEY(`PRODUCTOS_id`,`CATEGORIAS_id`),
  FOREIGN KEY(`PRODUCTOS_id`)
    REFERENCES `bytebusters_db`.`PRODUCTOS`(`id`),
  FOREIGN KEY(`CATEGORIAS_id`)
    REFERENCES `bytebusters_db`.`CATEGORIAS`(`id`)
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
-------------------------
--- TABLA PROMOCIONES ---
-------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters_db`.`PROMOCIONES`(
  `id` int (11) NOT NULL AUTO_INCREMENT,
  `precioPromo` DECIMAL(8,2) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*
----------------------------------
--TABLA PRODUCTOS has PROMOCIONES--
----------------------------------
*/
CREATE TABLE IF NOT EXISTS `bytebusters_db`.`PRODUCTOS_has_PROMOCIONES` (
  `PRODUCTOS_id` int(11) NOT NULL,
  `PROMOCIONES_id` int(11)NOT NULL,
  PRIMARY KEY(`PRODUCTOS_id`,`PROMOCIONES_id`),
  FOREIGN KEY(`PRODUCTOS_id`)
    REFERENCES `bytebusters_db`.`PRODUCTOS`(`id`),
  FOREIGN KEY(`PROMOCIONES_id`)
    REFERENCES `bytebusters_db`.`PROMOCIONES`(`id`)
	
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*
--------------------------------
--INSERT DE LA TABLA USUARIOS --
--------------------------------
*/
INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('55271656', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Angel', 'angellanzi.sl@gmail.com', 'Lanzi');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('46140143', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Federico', 'fdefortuny@gmail.com', 'de Fortuny');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('49273133', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Lucia', 'luciavinaf@gmail.com', 'Viña');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('51281100', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Anibal', 'anibalezequiel14@gmail.com', 'Almeida');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('49158527', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Damian', 'damiandespan@gmail.com', 'Despan');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('9168507', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Manolo', 'manopere@gmail.com', 'Perez');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('16850794', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Pepe', 'pepegome@gmail.com', 'Gomez');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('91827364', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Marcelo', 'torresmarce@gmail.com', 'Torres');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('56478921', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Cristina', 'borrazascristi@gmail.com', 'Borrazas');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('49862357', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Lorena', 'olivieralorena@gmail.com', 'Oliviera');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('9513674', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Carolina', 'caropollito123@gmail.com', 'Pollo');

INSERT INTO `bytebusters_db`.`USUARIOS` (`ci`, `pass`, `nombre`, `email`, `apellido`) VALUES
('28463971', '$2y$10$PCw18RCrV/ldpRTKpSVoXONKrAa/0YRLAceaGZxXKn/wW..UgiCg6', 'Pablo', 'pclavo@gmail.com', 'Clavo');


/*
-----------------------------
--INSERT DE LA TABLA ROLES --
-----------------------------
*/
INSERT INTO `bytebusters_db`.`ROLES` (`id`, `nombreRol`) VALUES ('1', 'admin');

INSERT INTO `bytebusters_db`.`ROLES` (`id`, `nombreRol`) VALUES ('2', 'vendedor');



/*
------------------------------------------
--INSERT RELACIONANDO USUARIOS CON ROLES--
------------------------------------------
*/
INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('55271656', '1'), ('55271656', '2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('46140143', '1'), ('46140143', '2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('49273133', '1'), ('49273133', '2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('51281100', '1'), ('51281100', '2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('49158527', '1'), ('49158527', '2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('9168507', '2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('16850794', '1');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('91827364', '1'), ('91827364','2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('56478921', '1'), ('56478921','2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('49862357', '1'), ('49862357','2');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('9513674', '1');

INSERT INTO `bytebusters_db`.`USUARIOS_has_ROLES` (`USUARIOS_ci`, `ROLES_id`) VALUES ('28463971','2');



/*
-----------------------------
--INSERT DE LA TABLA RUTAS --
-----------------------------
*/
INSERT INTO `bytebusters_db`.`RUTAS` (`ruta`, `accion`, `rolesId`) VALUES ('pages/menu-admin.php', 'ir_menu_admin', '1');

INSERT INTO `bytebusters_db`.`RUTAS` (`ruta`, `accion`, `rolesId`) VALUES ('pages/menu-vendedor.php', 'ir_menu_vendedor', '2');


/* 
-------------------------------
--INSERT DE LA TABLA EMPRESA --
-------------------------------
*/
INSERT INTO `bytebusters_db`.`empresa`(`logo`, `rubro`, `nombre`, `calle`, `numero`, `ciudad`, `telefono`, `instagram`, `whatsapp` , `email`, `pwd_email`, `comentarios`) 
VALUES ('Default' ,'Default' , 'Default' , 'Default' , '1' ,'Default', 'Default', 'Default', 'Default' , 'Default' , 'Default' , 'Default');


/*
----------------------------------
--INSERT DE LA TABLA CATEGORIAS --
----------------------------------
*/
INSERT INTO `bytebusters_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('1', 'Limpieza');

INSERT INTO `bytebusters_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('2', 'Papeleria');

INSERT INTO `bytebusters_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('3', 'Ferreteria');

INSERT INTO `bytebusters_db`.`CATEGORIAS` (`id`, `nombre`) VALUES ('4', 'Textil');




/*
---------------------------------
--INSERT DE LA TABLA PRODUCTOS --
---------------------------------
*/
INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('1', 'Pack 3 Rollos de Cocina NOVA Clásico', 'Rollos de papel doble hoja con alta absorción 
que permite retener mayor cantidad de líquido y aseguran un rendimiento más económico en todas las necesidades del hogar.', 'novaclassic.jpg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('2', 'Tijera MAPED Sensoft 13 cm mango de goma', 'Los Mejores útiles para escolares 
encontralos en la web', 'tijera.jpeg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('3','Lubricante WD-40 flexi tapa 220g','Lubricante WD-40 flexi tapa 220g, producto 
de excelente calidad.', 'dw-40.jpeg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('4','Toalla de Baño Azul Frape Bud 135 x 70 cm','Toalla de exelente calidad y textura', 'toalla.jpg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('5', 'Agua JANE 1L', 'El baño y la cocina son áreas altamente contaminadas de toda la casa, pero con 
agua Jane estan limpios en un segundo', 'aguajane.jpg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('6','Repasador Ajedrez Cuadros' ,'Varios colores, 100% algodón, Medidas: 41 x 66 cm','repasador.jpg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('7','Destornillador BRICOTECH','Destornillador BRICOTECH Mod. HL-S36-26 . 3.6 V','destornillador.jpg');

INSERT INTO `bytebusters_db`.`PRODUCTOS` (`id`, `nombre`, `descripcion`, `imagen`) VALUES ('8','Papel natural A4 250h','Papel natural A4 250h 75 g 100% caña de azúcar.','hojasA4.jpg');




/*
-----------------------------------------------
--INSERTS RELACIONANDO PRODUCTOS CON CATEGORIAS--
-----------------------------------------------

*/
INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('1', '1');
 
INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('2', '2');

INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('3', '3');

INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('4', '4');

INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('5', '1');

INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('6', '2');

INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('7', '3');

INSERT INTO `bytebusters_db`.`PRODUCTOS_has_CATEGORIAS` (`PRODUCTOS_id`, `CATEGORIAS_id`) VALUES ('8', '4');



/*
----------------------------------
--INSERT DE LA TABLA PROMOCIONES--
----------------------------------
*/
INSERT INTO `bytebusters_db`.`PROMOCIONES` (`id`,`precioPromo`,`fechaInicio`,`fechaFin`) VALUES ('1', 990,'7/7/23','14/7/23');
/*
------------------------------------------------
--INSER RELACIONANDO PRODUCTOS CON PROMOCIONES--
------------------------------------------------

*/
INSERT INTO `bytebusters_db`.`PRODUCTOS_has_PROMOCIONES` (`PRODUCTOS_id`, `PROMOCIONES_id`) VALUES ('2', '1');
INSERT INTO `bytebusters_db`.`PRODUCTOS_has_PROMOCIONES` (`PRODUCTOS_id`, `PROMOCIONES_id`) VALUES ('4', '1');
INSERT INTO `bytebusters_db`.`PRODUCTOS_has_PROMOCIONES` (`PRODUCTOS_id`, `PROMOCIONES_id`) VALUES ('6', '1');