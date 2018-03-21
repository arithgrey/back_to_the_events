set global net_buffer_length=1000000;
set global max_allowed_packet=1000000000;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema enidserv_eniddbbbb3
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `enidserv_eniddbbbb3` ;
CREATE SCHEMA IF NOT EXISTS `enidserv_eniddbbbb3` DEFAULT CHARACTER SET utf8 ;
USE `enidserv_eniddbbbb3` ;

-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`countries` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`countries` (
  `idCountry` INT(5) NOT NULL AUTO_INCREMENT,
  `countryName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCountry`),
  UNIQUE INDEX `countryName_UNIQUE` (`countryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plan` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plan` (
  `idplan` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `Especificacionesplan` TEXT NULL,
  `numerousuarios` INT NULL,
  PRIMARY KEY (`idplan`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT,
  `nombreempresa` VARCHAR(200) NOT NULL,
  `idCountry` INT(5) NOT NULL DEFAULT 1,
  `fecha_registro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(45) NOT NULL DEFAULT '1',
  `idplan` INT NOT NULL DEFAULT 1,
  `quienes_somos` TEXT NULL,
  `mision` TEXT NULL,
  `vision` TEXT NULL,
  `years` INT NOT NULL DEFAULT 1,
  `mas_info` TEXT NULL,
  `slogan` VARCHAR(300) NOT NULL DEFAULT 'No sólo basta la musica el ingrediente principal eres tú!',
  `artistas` INT NOT NULL DEFAULT 1,
  `facebook` TEXT NULL,
  `tweeter` TEXT NULL,
  `gp` TEXT NULL,
  `www` TEXT NULL,
  `mensaje_comunidad` TEXT NULL,
  PRIMARY KEY (`idempresa`),
  INDEX `fk_empresa_countries1_idx` (`idCountry` ASC),
  INDEX `fk_empresa_plan1_idx` (`idplan` ASC),
  UNIQUE INDEX `nombreempresa_UNIQUE` (`nombreempresa` ASC),
  CONSTRAINT `fk_empresa_countries1`
    FOREIGN KEY (`idCountry`)
    REFERENCES `enidserv_eniddbbbb3`.`countries` (`idCountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_plan1`
    FOREIGN KEY (`idplan`)
    REFERENCES `enidserv_eniddbbbb3`.`plan` (`idplan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(55) NULL,
  `email` VARCHAR(250) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idempresa` INT NOT NULL,
  `descripcion` TEXT NULL,
  `puesto` VARCHAR(200) NULL,
  `status` VARCHAR(200) NOT NULL DEFAULT 'Usuario Activo',
  `apellido_paterno` VARCHAR(150) NULL,
  `apellido_materno` VARCHAR(150) NULL,
  `email_alterno` VARCHAR(250) NULL,
  `tel_contacto` BIGINT(10) NULL,
  `tel_contacto_alterno` BIGINT(10) NULL,
  `edad` INT NULL,
  `numero_empleado` INT NULL DEFAULT 0,
  `inicio_labor` VARCHAR(15) NULL DEFAULT '09:00 AM',
  `fin_labor` VARCHAR(15) NULL DEFAULT '18:00 PM',
  `grupo` VARCHAR(200) NULL,
  `cargo` VARCHAR(200) NULL,
  `rfc` VARCHAR(25) NULL,
  `turno` VARCHAR(15) NULL,
  `ultima_modificacion` TIMESTAMP NULL,
  `descripcion_usuario` TEXT NULL,
  `url_fb` TEXT NULL,
  `url_tw` TEXT NULL,
  `url_www` TEXT NULL,
  `sexo` VARCHAR(10) NULL,
  `tipo` INT(1) NOT NULL DEFAULT 0 COMMENT '0 para quien no paga ' /* comment truncated */ /*1 para aquel que configura */,
  `formatted_address` VARCHAR(200) NULL,
  `place_id` VARCHAR(55) NULL,
  `lng` VARCHAR(45) NULL,
  `lat` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_empresa1_idx` (`idempresa` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_usuario_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`perfil` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`perfil` (
  `idperfil` INT NOT NULL AUTO_INCREMENT,
  `nombreperfil` VARCHAR(45) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` TEXT NULL,
  `status` VARCHAR(55) NOT NULL DEFAULT 'Dispobible',
  PRIMARY KEY (`idperfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`recurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`recurso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`recurso` (
  `idrecurso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcionrecurso` TEXT NULL,
  `urlpaginaweb` VARCHAR(500) NOT NULL,
  `iconorecurso` VARCHAR(500) NULL,
  `status` VARCHAR(55) NULL,
  `order_negocio` INT NOT NULL,
  PRIMARY KEY (`idrecurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario_perfil` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario_perfil` (
  `idusuario` INT NOT NULL,
  `idperfil` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  INDEX `fk_usuario_has_perfil_perfil1_idx` (`idperfil` ASC),
  INDEX `fk_usuario_has_perfil_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_usuario_has_perfil_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_perfil_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`perfil_recurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`perfil_recurso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`perfil_recurso` (
  `idperfil` INT NOT NULL,
  `idrecurso` INT NOT NULL,
  INDEX `fk_perfil_has_recurso_recurso1_idx` (`idrecurso` ASC),
  INDEX `fk_perfil_has_recurso_perfil1_idx` (`idperfil` ASC),
  CONSTRAINT `fk_perfil_has_recurso_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_recurso_recurso1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `enidserv_eniddbbbb3`.`recurso` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario_roll`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario_roll` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario_roll` (
  `idusuario` INT NOT NULL,
  `idrecurso` INT NOT NULL,
  INDEX `fk_usuario_has_recurso_recurso1_idx` (`idrecurso` ASC),
  INDEX `fk_usuario_has_recurso_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_usuario_has_recurso_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_recurso_recurso1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `enidserv_eniddbbbb3`.`recurso` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`permiso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`permiso` (
  `idpermiso` INT NOT NULL AUTO_INCREMENT,
  `nombrepermiso` VARCHAR(250) NOT NULL,
  `descripcionpermiso` TEXT NULL,
  `idrecurso` INT NOT NULL,
  `urlpaginaweb` VARCHAR(500) NULL,
  `iconpermiso` VARCHAR(500) NULL,
  INDEX `fk_permiso_recurso1_idx` (`idrecurso` ASC),
  PRIMARY KEY (`idpermiso`),
  CONSTRAINT `fk_permiso_recurso1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `enidserv_eniddbbbb3`.`recurso` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`perfil_permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`perfil_permiso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`perfil_permiso` (
  `idperfil` INT NOT NULL,
  `idpermiso` INT NOT NULL,
  INDEX `fk_perfil_has_permiso_permiso1_idx` (`idpermiso` ASC),
  INDEX `fk_perfil_has_permiso_perfil1_idx` (`idperfil` ASC),
  CONSTRAINT `fk_perfil_has_permiso_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_permiso_permiso1`
    FOREIGN KEY (`idpermiso`)
    REFERENCES `enidserv_eniddbbbb3`.`permiso` (`idpermiso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`pregunta_respuesta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`pregunta_respuesta` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`pregunta_respuesta` (
  `idpregunta` INT NOT NULL,
  `idrespuesta` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`registrocliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`registrocliente` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`registrocliente` (
  `idusuario` INT NOT NULL,
  `idclienteorg` INT NOT NULL,
  INDEX `fk_usuario_has_clienteorg_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_usuario_has_clienteorg_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plan_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plan_perfil` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plan_perfil` (
  `idplan` INT NOT NULL,
  `idperfil` INT NOT NULL,
  INDEX `fk_plan_has_perfil_perfil1_idx` (`idperfil` ASC),
  INDEX `fk_plan_has_perfil_plan1_idx` (`idplan` ASC),
  CONSTRAINT `fk_plan_has_perfil_plan1`
    FOREIGN KEY (`idplan`)
    REFERENCES `enidserv_eniddbbbb3`.`plan` (`idplan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plan_has_perfil_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`newsletters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`newsletters` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`newsletters` (
  `idnewsletters` INT NOT NULL AUTO_INCREMENT,
  `mail` VARCHAR(50) NOT NULL,
  `seccion` VARCHAR(70) NOT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '0',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`idnewsletters`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`reportesystema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`reportesystema` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`reportesystema` (
  `idreportesystema` INT NOT NULL AUTO_INCREMENT,
  `reporte` VARCHAR(70) NOT NULL,
  `descripcionreporte` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tiporeporte` VARCHAR(70) NOT NULL,
  `status_repo` ENUM('Atendido','Rechazado','Pendiente','En proceso') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`idreportesystema`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`ci_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`ci_sessions` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`ci_sessions` (
  `session_id` VARCHAR(40) NOT NULL DEFAULT '0',
  `ip_address` VARCHAR(45) NOT NULL DEFAULT '0',
  `user_agent` VARCHAR(120) NOT NULL,
  `last_activity` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` TEXT NOT NULL,
  PRIMARY KEY (`session_id`),
  INDEX `last_activity_idx` (`last_activity` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`comentario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`comentario` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NULL,
  `status` VARCHAR(1) NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` VARCHAR(150) NULL,
  PRIMARY KEY (`idcomentario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`motivo_cancelacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`motivo_cancelacion` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`motivo_cancelacion` (
  `id_motivo` INT NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_motivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento` (
  `idevento` INT NOT NULL AUTO_INCREMENT,
  `nombre_evento` VARCHAR(400) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edicion` VARCHAR(100) NULL,
  `idempresa` INT NOT NULL,
  `idusuario` INT NOT NULL,
  `fecha_inicio` DATE NULL,
  `fecha_termino` DATE NULL,
  `descripcion_evento` TEXT NULL,
  `portada` VARCHAR(300) NULL,
  `ubicacion` TEXT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '0' COMMENT '1.- En edición  0 ' /* comment truncated */ /*
2.- Publicado 1  
3.- Cancelado  2 
4.- Programado*/,
  `url_social` TEXT NULL,
  `url_social_youtube` TEXT NULL,
  `politicas` TEXT NULL,
  `restricciones` TEXT NULL,
  `permitido` TEXT NULL,
  `breve_descripcion` VARCHAR(200) NULL,
  `eslogan` VARCHAR(255) NULL,
  `tipo` VARCHAR(300) NOT NULL DEFAULT 'Evento público',
  `periodo_publicacion` INT NULL DEFAULT 0,
  `programado` DATE NULL,
  `nota_cancelacion` TEXT NULL,
  `id_motivo_cancelacion` INT NULL,
  `feha_cancelacion` DATE NULL,
  `formatted_address` VARCHAR(200) NULL,
  `place_id` VARCHAR(55) NULL,
  `lng` VARCHAR(45) NULL,
  `lat` VARCHAR(45) NULL,
  PRIMARY KEY (`idevento`),
  INDEX `fk_evento_empresa1_idx` (`idempresa` ASC),
  INDEX `fk_evento_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_evento_motivo_cancelacion1_idx` (`id_motivo_cancelacion` ASC),
  CONSTRAINT `fk_evento_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_motivo_cancelacion1`
    FOREIGN KEY (`id_motivo_cancelacion`)
    REFERENCES `enidserv_eniddbbbb3`.`motivo_cancelacion` (`id_motivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`escenario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`escenario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`escenario` (
  `idescenario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NULL,
  `descripcion` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idevento` INT NULL,
  `tipoescenario` VARCHAR(200) NOT NULL DEFAULT 'General',
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `fecha_presentacion_inicio` DATE NULL,
  `fecha_presentacion_termino` DATE NULL,
  PRIMARY KEY (`idescenario`),
  INDEX `fk_esenario_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_esenario_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`artista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`artista` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`artista` (
  `idartista` INT NOT NULL AUTO_INCREMENT,
  `nombre_artista` VARCHAR(250) NOT NULL,
  `idsound` VARCHAR(5) NULL,
  `genre` VARCHAR(50) NULL,
  `uri` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idartista`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`escenario_artista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`escenario_artista` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`escenario_artista` (
  `idescenario` INT NOT NULL,
  `idartista` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hora_inicio` VARCHAR(20) NULL,
  `hora_termino` VARCHAR(20) NULL,
  `url_social_youtube` TEXT NULL,
  `url_sound_cloud` TEXT NULL,
  `status_confirmacion` VARCHAR(45) NOT NULL DEFAULT 'pendiente por confirmar',
  `nota` TEXT NULL,
  `tipo_artista` VARCHAR(300) NOT NULL,
  INDEX `fk_escenario_has_artista_artista1_idx` (`idartista` ASC),
  INDEX `fk_escenario_has_artista_escenario1_idx` (`idescenario` ASC),
  CONSTRAINT `fk_escenario_has_artista_escenario1`
    FOREIGN KEY (`idescenario`)
    REFERENCES `enidserv_eniddbbbb3`.`escenario` (`idescenario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_escenario_has_artista_artista1`
    FOREIGN KEY (`idartista`)
    REFERENCES `enidserv_eniddbbbb3`.`artista` (`idartista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tipo_acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tipo_acceso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tipo_acceso` (
  `idtipo_acceso` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `status` VARCHAR(1) NULL,
  PRIMARY KEY (`idtipo_acceso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`acceso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`acceso` (
  `idacceso` INT NOT NULL AUTO_INCREMENT,
  `descripcion` TEXT NULL,
  `precio` VARCHAR(45) NULL,
  `inicio_acceso` DATE NULL,
  `termino_acceso` DATE NULL,
  `status` VARCHAR(1) NULL,
  `idevento` INT NOT NULL,
  `idtipo_acceso` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` VARCHAR(150) NULL,
  `moneda` VARCHAR(10) NOT NULL DEFAULT 'mx',
  PRIMARY KEY (`idacceso`),
  INDEX `fk_acceso_evento1_idx` (`idevento` ASC),
  INDEX `fk_acceso_tipo_acceso1_idx` (`idtipo_acceso` ASC),
  CONSTRAINT `fk_acceso_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acceso_tipo_acceso1`
    FOREIGN KEY (`idtipo_acceso`)
    REFERENCES `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`servicio` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`servicio` (
  `idservicio` INT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(200) NOT NULL,
  `status` VARCHAR(1) NULL,
  `descripcion` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idservicio`),
  UNIQUE INDEX `servicio_UNIQUE` (`servicio` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_servicio` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_servicio` (
  `idevento` INT NOT NULL,
  `idservicio` INT NOT NULL,
  `nota` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_evento_has_servicio_servicio1_idx` (`idservicio` ASC),
  INDEX `fk_evento_has_servicio_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_servicio_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_servicio_servicio1`
    FOREIGN KEY (`idservicio`)
    REFERENCES `enidserv_eniddbbbb3`.`servicio` (`idservicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`objetopermitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`objetopermitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`objetopermitido` (
  `idobjetopermitido` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NULL,
  `status` VARCHAR(1) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idobjetopermitido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_objetopermitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_objetopermitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_objetopermitido` (
  `idevento` INT NOT NULL,
  `idobjetopermitido` INT NOT NULL,
  INDEX `fk_evento_has_objetopermitido_objetopermitido1_idx` (`idobjetopermitido` ASC),
  INDEX `fk_evento_has_objetopermitido_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_objetopermitido_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_objetopermitido_objetopermitido1`
    FOREIGN KEY (`idobjetopermitido`)
    REFERENCES `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`genero_musical`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`genero_musical` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`genero_musical` (
  `idgenero_musical` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(250) NOT NULL,
  `status` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idgenero_musical`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_genero_musical`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_genero_musical` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_genero_musical` (
  `idevento` INT NOT NULL,
  `idgenero_musical` INT NOT NULL,
  INDEX `fk_evento_has_genero_musical_genero_musical1_idx` (`idgenero_musical` ASC),
  INDEX `fk_evento_has_genero_musical_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_genero_musical_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_genero_musical_genero_musical1`
    FOREIGN KEY (`idgenero_musical`)
    REFERENCES `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tematica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tematica` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tematica` (
  `idtematica` INT NOT NULL AUTO_INCREMENT,
  `tematica_evento` VARCHAR(200) NOT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `descripcion` TEXT NULL,
  PRIMARY KEY (`idtematica`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_tematica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_tematica` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_tematica` (
  `idevento` INT NOT NULL,
  `idtematica` INT NOT NULL,
  INDEX `fk_evento_has_tematica_tematica1_idx` (`idtematica` ASC),
  INDEX `fk_evento_has_tematica_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_tematica_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_tematica_tematica1`
    FOREIGN KEY (`idtematica`)
    REFERENCES `enidserv_eniddbbbb3`.`tematica` (`idtematica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`contacto` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`contacto` (
  `idcontacto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `organizacion` VARCHAR(200) NULL,
  `tel` VARCHAR(10) NULL,
  `movil` VARCHAR(15) NULL,
  `correo` VARCHAR(255) NULL,
  `direccion` TEXT NOT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'Contacto disponible para ser usado',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` VARCHAR(20) NOT NULL,
  `idusuario` INT NOT NULL,
  `nota` TEXT NULL,
  `pagina_web` TEXT NULL,
  `pagina_fb` TEXT NULL,
  `pagina_tw` TEXT NULL,
  `correo_alterno` VARCHAR(255) NULL,
  `extension` VARCHAR(5) NULL,
  `formatted_address` VARCHAR(200) NULL,
  `place_id` VARCHAR(55) NULL,
  `lng` VARCHAR(45) NULL,
  `lat` VARCHAR(45) NULL,
  PRIMARY KEY (`idcontacto`),
  INDEX `fk_contacto_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_contacto_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`log_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`log_evento` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`log_evento` (
  `idlog_evento` INT NOT NULL AUTO_INCREMENT,
  `actividad` TEXT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` INT NOT NULL,
  `idempresa` INT NOT NULL,
  `id_evento` INT NULL,
  `tipo` INT NULL COMMENT '1.- para los eventos' /* comment truncated */ /*2.-Para los escenarios
3.-Para los accesos
4.-Para los artistas 
5.-Para los generos
*/,
  `accion` VARCHAR(20) NULL,
  `id_genero` INT NULL,
  `id_escenario` INT NULL,
  `id_artista` INT NULL,
  PRIMARY KEY (`idlog_evento`),
  INDEX `fk_log_evento_empresa1_idx` (`idempresa` ASC),
  CONSTRAINT `fk_log_evento_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tipo_plantilla`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tipo_plantilla` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tipo_plantilla` (
  `idtipo_plantilla` INT NOT NULL AUTO_INCREMENT,
  `tipo_plantilla` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtipo_plantilla`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plantilla`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plantilla` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plantilla` (
  `idplantilla` INT NOT NULL AUTO_INCREMENT,
  `nombre_platilla` VARCHAR(75) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `idusuario` INT NOT NULL,
  `idtipo_plantilla` INT NOT NULL,
  PRIMARY KEY (`idplantilla`),
  INDEX `fk_plantilla_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_plantilla_tipo_plantilla1_idx` (`idtipo_plantilla` ASC),
  CONSTRAINT `fk_plantilla_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plantilla_tipo_plantilla1`
    FOREIGN KEY (`idtipo_plantilla`)
    REFERENCES `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`contenido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`contenido` (
  `idcontenido` INT NOT NULL AUTO_INCREMENT,
  `nombre_contenido` VARCHAR(70) NOT NULL,
  `descripcion_contenido` TEXT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `type` VARCHAR(1) NOT NULL COMMENT '1 para descripciones de eventos , 3 para restricciones, 4 para politicas. 5 para descripcion de escenarios',
  PRIMARY KEY (`idcontenido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`permitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`permitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`permitido` (
  `idpermitido` INT NOT NULL,
  `nombre_permitido` VARCHAR(45) NOT NULL,
  `descripcion_permitido` TEXT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`idpermitido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa_objetopermitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa_objetopermitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa_objetopermitido` (
  `idempresa` INT NOT NULL,
  `idobjetopermitido` INT NOT NULL,
  INDEX `fk_empresa_has_objetopermitido_objetopermitido1_idx` (`idobjetopermitido` ASC),
  INDEX `fk_empresa_has_objetopermitido_empresa1_idx` (`idempresa` ASC),
  CONSTRAINT `fk_empresa_has_objetopermitido_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_objetopermitido_objetopermitido1`
    FOREIGN KEY (`idobjetopermitido`)
    REFERENCES `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plantilla_contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plantilla_contenido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plantilla_contenido` (
  `idplantilla` INT NOT NULL,
  `idcontenido` INT NOT NULL,
  INDEX `fk_plantilla_has_contenido_contenido1_idx` (`idcontenido` ASC),
  INDEX `fk_plantilla_has_contenido_plantilla1_idx` (`idplantilla` ASC),
  CONSTRAINT `fk_plantilla_has_contenido_plantilla1`
    FOREIGN KEY (`idplantilla`)
    REFERENCES `enidserv_eniddbbbb3`.`plantilla` (`idplantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plantilla_has_contenido_contenido1`
    FOREIGN KEY (`idcontenido`)
    REFERENCES `enidserv_eniddbbbb3`.`contenido` (`idcontenido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_contenido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_contenido` (
  `idevento` INT NOT NULL,
  `idcontenido` INT NOT NULL,
  INDEX `fk_evento_has_contenido_contenido1_idx` (`idcontenido` ASC),
  INDEX `fk_evento_has_contenido_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_contenido_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_contenido_contenido1`
    FOREIGN KEY (`idcontenido`)
    REFERENCES `enidserv_eniddbbbb3`.`contenido` (`idcontenido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`punto_venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`punto_venta` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`punto_venta` (
  `idpunto_venta` INT NOT NULL AUTO_INCREMENT,
  `razon_social` VARCHAR(250) NULL,
  `status` VARCHAR(300) NOT NULL DEFAULT 'DIsponible',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idempresa` INT NOT NULL,
  `descripcion` TEXT NULL,
  `zona` VARCHAR(25) NULL,
  `hora_inicio` TIME NULL,
  `hora_fin` TIME NULL,
  `L` INT(1) NOT NULL DEFAULT 0,
  `M` INT(1) NOT NULL DEFAULT 0,
  `MM` INT(1) NOT NULL DEFAULT 0,
  `J` INT(1) NOT NULL DEFAULT 0,
  `V` INT(1) NOT NULL DEFAULT 0,
  `S` INT(1) NOT NULL DEFAULT 0,
  `D` INT(1) NOT NULL DEFAULT 0,
  `horario_atencion` VARCHAR(15) NULL,
  `sitio_web` TEXT NULL,
  `formatted_address` VARCHAR(200) NULL,
  `place_id` VARCHAR(55) NULL,
  `lat` VARCHAR(45) NULL,
  `lng` VARCHAR(45) NULL,
  PRIMARY KEY (`idpunto_venta`),
  INDEX `fk_punto_venta_empresa1_idx` (`idempresa` ASC),
  CONSTRAINT `fk_punto_venta_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`punto_venta_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`punto_venta_usuario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`punto_venta_usuario` (
  `idpunto_venta` INT NOT NULL,
  `idusuario` INT NOT NULL,
  INDEX `fk_punto_venta_has_usuario_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_punto_venta_has_usuario_punto_venta1_idx` (`idpunto_venta` ASC),
  CONSTRAINT `fk_punto_venta_has_usuario_punto_venta1`
    FOREIGN KEY (`idpunto_venta`)
    REFERENCES `enidserv_eniddbbbb3`.`punto_venta` (`idpunto_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_punto_venta_has_usuario_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`punto_venta_contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`punto_venta_contacto` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`punto_venta_contacto` (
  `idpunto_venta` INT NOT NULL,
  `idcontacto` INT NOT NULL,
  INDEX `fk_punto_venta_has_contacto_contacto1_idx` (`idcontacto` ASC),
  INDEX `fk_punto_venta_has_contacto_punto_venta1_idx` (`idpunto_venta` ASC),
  CONSTRAINT `fk_punto_venta_has_contacto_punto_venta1`
    FOREIGN KEY (`idpunto_venta`)
    REFERENCES `enidserv_eniddbbbb3`.`punto_venta` (`idpunto_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_punto_venta_has_contacto_contacto1`
    FOREIGN KEY (`idcontacto`)
    REFERENCES `enidserv_eniddbbbb3`.`contacto` (`idcontacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_punto_venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_punto_venta` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_punto_venta` (
  `idevento` INT NOT NULL,
  `idpunto_venta` INT NOT NULL,
  INDEX `fk_evento_has_punto_venta_punto_venta1_idx` (`idpunto_venta` ASC),
  INDEX `fk_evento_has_punto_venta_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_punto_venta_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_punto_venta_punto_venta1`
    FOREIGN KEY (`idpunto_venta`)
    REFERENCES `enidserv_eniddbbbb3`.`punto_venta` (`idpunto_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen` (
  `idimagen` INT NOT NULL AUTO_INCREMENT,
  `nombre_imagen` TEXT NOT NULL,
  `type` INT NOT NULL DEFAULT 0 COMMENT '1 para los eventos ' /* comment truncated */ /*2 Escenarios
3 Logo empresa 
4 punto de venta 
5 Para los accesos
6 Para contactos
7 artistas
8 usuarios de la empresa

*/,
  `size` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` INT NOT NULL DEFAULT 1 COMMENT '1 cuando es disponble  ',
  `id_usuario` INT NULL,
  `id_empresa` INT NULL,
  `img` MEDIUMBLOB NOT NULL,
  `extension` VARCHAR(10) NULL,
  PRIMARY KEY (`idimagen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_escenario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_escenario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_escenario` (
  `id_imagen` INT NOT NULL,
  `id_escenario` INT NOT NULL,
  `seccion` VARCHAR(250) NOT NULL,
  INDEX `fk_imagen_has_escenario_escenario1_idx` (`id_escenario` ASC),
  INDEX `fk_imagen_has_escenario_imagen1_idx` (`id_imagen` ASC),
  CONSTRAINT `fk_imagen_has_escenario_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_has_escenario_escenario1`
    FOREIGN KEY (`id_escenario`)
    REFERENCES `enidserv_eniddbbbb3`.`escenario` (`idescenario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_contacto` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_contacto` (
  `id_contacto` INT NOT NULL,
  `id_imagen` INT NOT NULL,
  INDEX `fk_contacto_has_imagen_imagen1_idx` (`id_imagen` ASC),
  INDEX `fk_contacto_has_imagen_contacto1_idx` (`id_contacto` ASC),
  CONSTRAINT `fk_contacto_has_imagen_contacto1`
    FOREIGN KEY (`id_contacto`)
    REFERENCES `enidserv_eniddbbbb3`.`contacto` (`idcontacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contacto_has_imagen_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_punto_venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_punto_venta` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_punto_venta` (
  `idpunto_venta` INT NOT NULL,
  `id_imagen` INT NOT NULL,
  INDEX `fk_punto_venta_has_imagen_imagen1_idx` (`id_imagen` ASC),
  INDEX `fk_punto_venta_has_imagen_punto_venta1_idx` (`idpunto_venta` ASC),
  CONSTRAINT `fk_punto_venta_has_imagen_punto_venta1`
    FOREIGN KEY (`idpunto_venta`)
    REFERENCES `enidserv_eniddbbbb3`.`punto_venta` (`idpunto_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_punto_venta_has_imagen_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_acceso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_acceso` (
  `id_imagen` INT NOT NULL,
  `id_acceso` INT NOT NULL,
  INDEX `fk_imagen_has_acceso_acceso1_idx` (`id_acceso` ASC),
  INDEX `fk_imagen_has_acceso_imagen1_idx` (`id_imagen` ASC),
  CONSTRAINT `fk_imagen_has_acceso_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_has_acceso_acceso1`
    FOREIGN KEY (`id_acceso`)
    REFERENCES `enidserv_eniddbbbb3`.`acceso` (`idacceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_artista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_artista` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_artista` (
  `id_imagen` INT NOT NULL,
  `id_artista` INT NOT NULL,
  INDEX `fk_imagen_has_artista_artista1_idx` (`id_artista` ASC),
  INDEX `fk_imagen_has_artista_imagen1_idx` (`id_imagen` ASC),
  CONSTRAINT `fk_imagen_has_artista_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_has_artista_artista1`
    FOREIGN KEY (`id_artista`)
    REFERENCES `enidserv_eniddbbbb3`.`artista` (`idartista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa_contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa_contacto` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa_contacto` (
  `id_empresa` INT NOT NULL,
  `id_contacto` INT NOT NULL,
  INDEX `fk_empresa_has_contacto_contacto1_idx` (`id_contacto` ASC),
  INDEX `fk_empresa_has_contacto_empresa1_idx` (`id_empresa` ASC),
  CONSTRAINT `fk_empresa_has_contacto_empresa1`
    FOREIGN KEY (`id_empresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_contacto_contacto1`
    FOREIGN KEY (`id_contacto`)
    REFERENCES `enidserv_eniddbbbb3`.`contacto` (`idcontacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa_genero_musical`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa_genero_musical` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa_genero_musical` (
  `id_empresa` INT NOT NULL,
  `idgenero_musical` INT NOT NULL,
  INDEX `fk_empresa_has_genero_musical_genero_musical1_idx` (`idgenero_musical` ASC),
  INDEX `fk_empresa_has_genero_musical_empresa1_idx` (`id_empresa` ASC),
  CONSTRAINT `fk_empresa_has_genero_musical_empresa1`
    FOREIGN KEY (`id_empresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_genero_musical_genero_musical1`
    FOREIGN KEY (`idgenero_musical`)
    REFERENCES `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_empresa` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_empresa` (
  `id_imagen` INT NOT NULL,
  `id_empresa` INT NOT NULL,
  INDEX `fk_imagen_has_empresa_empresa1_idx` (`id_empresa` ASC),
  INDEX `fk_imagen_has_empresa_imagen1_idx` (`id_imagen` ASC),
  CONSTRAINT `fk_imagen_has_empresa_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_has_empresa_empresa1`
    FOREIGN KEY (`id_empresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tipo_incidencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tipo_incidencia` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tipo_incidencia` (
  `idtipo_incidencia` INT NOT NULL AUTO_INCREMENT,
  `tipo_incidencia` TEXT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` INT(1) NOT NULL COMMENT '1.- INCIDENCIA ,' /* comment truncated */ /*2.- Mejora 
3.- Propuesta de software 
*/,
  PRIMARY KEY (`idtipo_incidencia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`calificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`calificacion` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`calificacion` (
  `idcalificacion` INT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` TEXT NULL,
  `tipo` INT NOT NULL DEFAULT 1 COMMENT '1.-Para modulo de errores ',
  PRIMARY KEY (`idcalificacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`incidencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`incidencia` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`incidencia` (
  `id_incidencia` INT NOT NULL AUTO_INCREMENT,
  `descripcion_incidencia` TEXT NULL,
  `status` INT NULL DEFAULT 1 COMMENT '1.- Para cuando se ha registrada ' /* comment truncated */ /*2.-*/,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idtipo_incidencia` INT NOT NULL,
  `idcalificacion` INT NOT NULL,
  `pagina_error` TEXT NULL,
  `id_user` INT NOT NULL DEFAULT 0,
  `tipo_propuesta` INT NOT NULL,
  PRIMARY KEY (`id_incidencia`),
  INDEX `fk_incidencia_tipo_incidencia1_idx` (`idtipo_incidencia` ASC),
  INDEX `fk_incidencia_calificacion1_idx` (`idcalificacion` ASC),
  CONSTRAINT `fk_incidencia_tipo_incidencia1`
    FOREIGN KEY (`idtipo_incidencia`)
    REFERENCES `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencia_calificacion1`
    FOREIGN KEY (`idcalificacion`)
    REFERENCES `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`estado` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`estado` (
  `id_estado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL,
  `idCountry` INT(5) NOT NULL,
  PRIMARY KEY (`id_estado`),
  INDEX `fk_estado_countries1_idx` (`idCountry` ASC),
  CONSTRAINT `fk_estado_countries1`
    FOREIGN KEY (`idCountry`)
    REFERENCES `enidserv_eniddbbbb3`.`countries` (`idCountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_evento` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_evento` (
  `id_imagen` INT NOT NULL,
  `id_evento` INT NOT NULL,
  INDEX `fk_evento_has_imagen_imagen1_idx` (`id_imagen` ASC),
  INDEX `fk_evento_has_imagen_evento1_idx` (`id_evento` ASC),
  CONSTRAINT `fk_evento_has_imagen_evento1`
    FOREIGN KEY (`id_evento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_imagen_imagen1`
    FOREIGN KEY (`id_imagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa_experiencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa_experiencia` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa_experiencia` (
  `idempresa` INT NOT NULL,
  `calificacion` INT NOT NULL DEFAULT 1,
  `nombre` VARCHAR(200) NULL,
  `mail` VARCHAR(300) NULL,
  `tel` BIGINT(8) NULL,
  `fecha_registro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` TEXT NULL,
  `status` INT(1) NOT NULL DEFAULT 0 COMMENT '0 Por default' /* comment truncated */ /*1 para lo que está aprobado 
2 visible solo para administradores 
*/,
  `idexperiencia` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_empresa_has_contenido_empresa1_idx` (`idempresa` ASC),
  PRIMARY KEY (`idexperiencia`),
  CONSTRAINT `fk_empresa_has_contenido_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`solicitud_artista_org`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`solicitud_artista_org` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`solicitud_artista_org` (
  `id_artista` INT NOT NULL,
  `id_empresa` INT NOT NULL,
  `id_Country` INT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` INT(1) NOT NULL DEFAULT 0,
  INDEX `fk_artista_has_empresa_empresa1_idx` (`id_empresa` ASC),
  INDEX `fk_artista_has_empresa_artista1_idx` (`id_artista` ASC),
  CONSTRAINT `fk_artista_has_empresa_artista1`
    FOREIGN KEY (`id_artista`)
    REFERENCES `enidserv_eniddbbbb3`.`artista` (`idartista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_artista_has_empresa_empresa1`
    FOREIGN KEY (`id_empresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`event_palabra_clave_default`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`event_palabra_clave_default` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`event_palabra_clave_default` (
  `id_evento` INT NOT NULL,
  `palabra_clave` TEXT NOT NULL,
  `tipo_busqueda` INT NOT NULL COMMENT '1 para el nombre ' /* comment truncated */ /*2 para el genero 
3 artista  
4 locacion
5Tipo*/,
  PRIMARY KEY (`id_evento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_artista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_artista` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_artista` (
  `id_evento` INT NOT NULL,
  `id_artista` INT NOT NULL,
  `artista` VARCHAR(250) NULL,
  INDEX `fk_evento_has_artista_artista1_idx` (`id_artista` ASC),
  INDEX `fk_evento_has_artista_evento1_idx` (`id_evento` ASC),
  CONSTRAINT `fk_evento_has_artista_evento1`
    FOREIGN KEY (`id_evento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_artista_artista1`
    FOREIGN KEY (`id_artista`)
    REFERENCES `enidserv_eniddbbbb3`.`artista` (`idartista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_genero`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_genero` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_genero` (
  `id_evento` INT NOT NULL,
  `id_genero` INT NOT NULL,
  `genero` VARCHAR(250) NULL,
  PRIMARY KEY (`id_evento`, `id_genero`),
  INDEX `fk_evento_has_genero_musical_genero_musical2_idx` (`id_genero` ASC),
  INDEX `fk_evento_has_genero_musical_evento2_idx` (`id_evento` ASC),
  CONSTRAINT `fk_evento_has_genero_musical_evento2`
    FOREIGN KEY (`id_evento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_genero_musical_genero_musical2`
    FOREIGN KEY (`id_genero`)
    REFERENCES `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`imagen_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`imagen_usuario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`imagen_usuario` (
  `idimagen` INT NOT NULL,
  `idusuario` INT NOT NULL,
  INDEX `fk_imagen_has_usuario_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_imagen_has_usuario_imagen1_idx` (`idimagen` ASC),
  CONSTRAINT `fk_imagen_has_usuario_imagen1`
    FOREIGN KEY (`idimagen`)
    REFERENCES `enidserv_eniddbbbb3`.`imagen` (`idimagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_has_usuario_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`log` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`log` (
  `id_log` INT NOT NULL AUTO_INCREMENT,
  `navegador` VARCHAR(200) NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` VARCHAR(15) NULL,
  `modulo` INT(1) NOT NULL COMMENT '1.- Para eventos' /* comment truncated */ /*2.-Para escenarios 
3.- Para artistas 
*/,
  `tipo_evento` INT NOT NULL COMMENT '1.-Insertar ' /* comment truncated */ /*2.-Actualizar
3.-Eliminar

*/,
  `descripcion` TEXT NULL,
  `id_modulo` INT NULL COMMENT 'Este es el id de la tabla o mejor dicho la primary key del modulo al que nos referimos. ',
  PRIMARY KEY (`id_log`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario_log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario_log` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario_log` (
  `id_usuario` INT NOT NULL,
  `id_log` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_usuario_has_log_log1_idx` (`id_log` ASC),
  INDEX `fk_usuario_has_log_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_usuario_has_log_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_log_log1`
    FOREIGN KEY (`id_log`)
    REFERENCES `enidserv_eniddbbbb3`.`log` (`id_log`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `enidserv_eniddbbbb3` ;

-- -----------------------------------------------------
-- procedure delere_all_artistas
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`delere_all_artistas`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE delere_all_artistas ()

BEGIN
  DELETE  FROM artista;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insertartista
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`insertartista`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure insertartista(in  seg varchar(200) )
begin
insert into plan(nombre) values(seg);
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insertartasasasista
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`insertartasasasista`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure insertartasasasista(in  seag varchar(200) )
begin
insert into plan(nombre) values(seag);
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_evento_all_data
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`delete_evento_all_data`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure delete_evento_all_data(in id_ev int , id_u int) 
begin

delete from log_evento 
where
    idevento = id_ev;

delete from escenario 
where
    idevento = id_ev;
delete from acceso 
where
    idevento = id_ev;
delete from evento_servicio 
where
    idevento = id_ev;
delete from evento_objetopermitido 
where
    idevento = id_ev;
delete from evento_genero_musical 
where
    idevento = id_ev;
delete from evento_tematica 
where
    idevento = id_ev;
delete from evento 
where
    idevento = id_ev;

end;
 $$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_escenacio_evento
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`delete_escenacio_evento`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure delete_escenacio_evento (in id_escenariodb int )
begin
DELETE FROM escenario_artista   WHERE idescenario = id_escenariodb;
DELETE FROM escenario 
WHERE
    idescenario = id_escenariodb;
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure all_in_event_obj_inter
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`all_in_event_obj_inter`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure all_in_event_obj_inter(in id_ev int )
begin
INSERT INTO evento_objetopermitido SELECT  id_ev , idobjetopermitido FROM objetopermitido;
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_all_obj_in_event
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`update_all_obj_in_event`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure update_all_obj_in_event(id_event int , idemp int )
BEGIN
IF NOT EXISTS(SELECT  * FROM  evento_objetopermitido where idevento= id_event limit 1) THEN
  INSERT INTO evento_objetopermitido 
  SELECT  id_event , o.idobjetopermitido FROM objetopermitido  as o  
  inner join empresa_objetopermitido as eo 
  on o.idobjetopermitido = eo.idobjetopermitido and eo.idempresa = idemp; 
ELSE
  DELETE FROM evento_objetopermitido WHERE idevento = id_event;
END IF;
END
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_all_servicios_in_event
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`update_all_servicios_in_event`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE  update_all_servicios_in_event(id_event INT)
BEGIN 
IF NOT EXISTS(SELECT * FROM evento_servicio WHERE idevento= id_event) THEN 
  
  INSERT INTO evento_servicio( idevento, idservicio) SELECT id_event , idservicio FROM servicio;

ELSE 
  DELETE FROM evento_servicio WHERE idevento = id_event;
END IF;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure onupdate
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`onupdate`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$


create procedure onupdate( stado_evento char(1) , id_evento int , id_user int )
begin 
UPDATE  evento SET status=stado_evento WHERE idevento = id_evento;  
INSERT INTO log_evento (actividad , idevento , id_usuario ) VALUES ("Cambió el stado del evento" , id_evento , id_user);
end;
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure contenidos_por_usuario_tipo
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`contenidos_por_usuario_tipo`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure contenidos_por_usuario_tipo(id_user int , id_type int )
begin 
SELECT  * FROM  contenido AS  c 
INNER JOIN  plantilla AS p
ON  c.idplantilla  =  p.idplantilla 
WHERE  p.idusuario = id_user  AND  p.idtipo_plantilla =  id_type
ORDER BY  c.fecha_registro DESC;
end;$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insert_punto_venta_empresa_usuario
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`insert_punto_venta_empresa_usuario`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure insert_punto_venta_empresa_usuario(r_social  varchar(100) ,   estatus varchar(300) , empresa int , descripcion_punto text, zona_punto varchar(25) ,  id_user int )
begin 
INSERT INTO punto_venta(razon_social,  status , descripcion, zona , idempresa ) VALUES ( r_social,  estatus  , descripcion_punto , zona_punto, empresa );
INSERT INTO punto_venta_usuario ( SELECT LAST_INSERT_ID() ,   id_user );

end;
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure funnel
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`funnel`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE funnel(emp int) 
BEGIN 

/*para los escenarios y  artistas*/
DROP TABLE IF EXISTS r_escenarios_artistas;
CREATE TABLE r_escenarios_artistas AS select e.idevento,
    sum(case
        when ea.idescenario is not null then 1
        else 0
    end) artistas from
    escenario e
        left outer join
    escenario_artista ea ON e.idescenario = ea.idescenario
group by e.idevento;


DROP TABLE IF EXISTS r_evento_puntos_venta;
CREATE TABLE r_evento_puntos_venta AS select ep . *, count(idevento) evento_punto_venta from
    evento_punto_venta ep
group by idevento;
 


DROP TABLE IF EXISTS r_evento_servicios;
CREATE TABLE r_evento_servicios AS select es . *, count(idevento) servicios from
    evento_servicio es
group by idevento;



DROP TABLE IF EXISTS rrte_evento_accesos;
CREATE TABLE rrte_evento_accesos AS select a.idevento, count(0) accesos from
    acceso a
group by a.idevento;


DROP TABLE IF EXISTS r_evento_generos_musicales;
CREATE TABLE r_evento_generos_musicales AS select idevento, count(*) generos_musicales from
    evento_genero_musical
group by idevento;



DROP TABLE IF EXISTS r_eventos_escenarios;
CREATE TABLE r_eventos_escenarios AS select e.idevento,
    e.nombre_evento,
    e.fecha_inicio,
    e.fecha_termino,
    e.status,
    e.edicion,
    e.descripcion_evento,
    sum(case
        when es.idescenario is not null then 1
        else 0
    end) escenarios from
    evento e
        left outer join
    escenario es ON e.idevento = es.idevento
where
    e.idempresa = emp
group by e.idevento; 






END 
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure data_event_public
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`data_event_public`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE data_event_public(id_event  int , flag int , num int ) 
begin
    
    

  


    IF flag = 0 THEN 
    
    SET @tmp =  CONCAT('drop table if exists v_escenarios_artistas_e_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_evento_punto_v_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_event_serv_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_evento_sound_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_eventos_escena_e_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;




    SET @tmp =  CONCAT('CREATE TABLE v_escenarios_artistas_e_', num ,' AS select e.idevento,
        sum(case
            when ea.idescenario is not null then 1
            else 0
        end) artistas from
        escenario e
            left outer join
        escenario_artista ea ON e.idescenario = ea.idescenario
    where
        e.idevento = ', id_event ,'
    group by e.idevento');
    PREPARE stmtd from @tmp; 
    EXECUTE stmtd;




    SET @tmp =  CONCAT('CREATE TABLE v_evento_punto_v_', num ,' AS select ep . *, count(*) evento_punto_venta from
        evento_punto_venta ep
    where
        idevento = ', id_event ,'
    group by idevento');
    PREPARE stmtd from @tmp; 
    EXECUTE stmtd;

     


    SET @tmp =  CONCAT('CREATE TABLE v_event_serv_', num , ' AS select es.idevento, es.idservicio, es.nota, count(*) servicios from
        evento_servicio es
    where
        idevento = ', id_event ,'
    group by idevento');
    PREPARE stmtd from @tmp; 
    EXECUTE stmtd;



    
    SET @tmp =  CONCAT('CREATE TABLE v_evento_sound_', num ,' AS select idevento, count(*) generos_musicales from
        evento_genero_musical
    where
        idevento = ', id_event ,'
    group by idevento');
    PREPARE stmtd from @tmp; 
    EXECUTE stmtd;





    SET @tmp =  CONCAT('CREATE TABLE v_eventos_escena_e_', num ,' AS select e.idevento,
        sum(case
            when es.idescenario is not null then 1
            else 0
        end) escenarios from
        evento e
            left outer join
        escenario es ON e.idevento = es.idevento
    where
        e.idevento = ', id_event ,'
    group by e.idevento'); 
    PREPARE stmtd from @tmp; 
    EXECUTE stmtd;

    ELSE
  
    
    
    SET @tmp =  CONCAT('drop table if exists v_escenarios_artistas_e_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_evento_punto_v_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_event_serv_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_evento_sound_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;

    SET @tmp =  CONCAT('DROP TABLE IF EXISTS v_eventos_escena_e_' ,  num ); 
            PREPARE stmtd from @tmp; 
            EXECUTE stmtd;





    
    END IF;     






END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure repo_eventos_admin
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`repo_eventos_admin`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE enidserv_eniddbbbb3.repo_eventos_admin(num_a int , flag int , emp int  ) 
BEGIN 
SET @num =  num_a; 
SET @empr = emp;  

    IF flag = 0  THEN

            /**************************************ESCENARIOS ARTISTAS INICIA *****************************************************/
            SET @c_repo_escenarios_artistas = 'select e.idevento,
                sum(case
                    when ea.idescenario is not null then 1
                    else 0
                end) artistas from
                escenario e
                    left outer join
                escenario_artista ea ON e.idescenario = ea.idescenario
            group by e.idevento';
            SET @dinamic_eac =  CONCAT('CREATE TABLE repo_escenarios_artistas_' ,  @num  , ' AS '  ,  @c_repo_escenarios_artistas); 
            PREPARE stmtc from @dinamic_eac; 
            EXECUTE stmtc;

            /**************************************** PUNTOS VENTA  INICIA ***************************************************/

            SET @d =  CONCAT('CREATE TABLE repo_evento_puntos_venta_', @num , ' AS ' ,  'select ep . *, 
                count(idevento) evento_punto_venta from
                evento_punto_venta ep group by idevento' );
              
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


            /**************************************INICIA SERVICIOS ***************************************************/
           
            SET @d =  CONCAT('CREATE TABLE repo_evento_servicios_' , @num , ' AS ' , 'select es.idevento , es.idservicio , es.nota, 
                count(es.idevento) servicios from
                evento_servicio es
            group by es.idevento' );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


            /**************************************INICIA ACCESOS AL EVENTO ********************************/

            SET @d =  CONCAT( 'CREATE TABLE reporte_evento_accesos_', @num , ' AS ' , 'select a.idevento, count(0) accesos from acceso a
            group by a.idevento');
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


            SET @d =  CONCAT('CREATE TABLE repo_eventos_escenarios_' , @num , ' AS ' , ' select e.idevento,
                e.nombre_evento,
                e.status,
                e.edicion,
                e.descripcion_evento,    
                e.idempresa,
                e.idusuario,
                e.fecha_inicio,
                e.fecha_termino,
                e.ubicacion,
                e.url_social,
                e.url_social_youtube,
                e.eslogan,
                e.tipo,
                sum(case
                    when es.idescenario is not null then 1
                    else 0
                end) escenarios from
                evento e
                    left outer join
                escenario es ON e.idevento = es.idevento
            where
                e.idempresa =' , @empr , ' group by e.idevento');
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


    ELSE 

            SET @dinamic_ead =  CONCAT('DROP TABLE IF EXISTS repo_escenarios_artistas_'  , @num  ); 
            PREPARE stmtd from @dinamic_ead; 
            EXECUTE stmtd;

            SET @d =  CONCAT('DROP TABLE IF EXISTS repo_evento_puntos_venta_' ,  @num  ); 
            PREPARE stmtd from @d; 
            EXECUTE stmtd;    

            SET @d =  CONCAT('DROP TABLE IF EXISTS repo_evento_servicios_' ,  @num  );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;
            
            SET @d =  CONCAT('DROP TABLE IF EXISTS reporte_evento_accesos_' ,  @num  );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;

            SET @d =  CONCAT('DROP TABLE IF EXISTS repo_eventos_escenarios_' ,  @num  );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;

 

    END IF;         

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure estado_empresa
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`estado_empresa`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE estado_empresa(emp int)
BEGIN 
    
    /****/
    SET @num =  emp;    
    SET @tmp_global =  CONCAT('DROP TABLE IF EXISTS ' , 'tmp_global_'  , @num ); 
    PREPARE stmtd from @tmp_global; 
    EXECUTE stmtd;
    
    SET @tmp_global =  CONCAT('create table tmp_global_' , @num ,  ' as  
        select 
sum(case when month(fecha_inicio) = month(current_date()) and  year(fecha_inicio) = year(current_date())  then 1 else 0 end ) eventos_mes, 
sum(case when DATE_ADD(current_date(), INTERVAL -1  MONTH)  then 1 else 0 end ) eventos_menos_1 ,
sum(case when DATE_ADD(current_date(), INTERVAL +1  MONTH) then 1 else 0 end ) eventos_mas_1 ,
sum(case when yearweek(fecha_inicio) = yearweek(current_date()) then 1 else 0 end ) semana,
sum(case when yearweek(fecha_inicio) = yearweek(current_date())+1 then 1 else 0 end ) semana_mas_uno,
sum(case when yearweek(fecha_inicio) = yearweek(current_date())-1 then 1 else 0 end ) semana_menos_uno
from evento where idempresa = ', @num,'
and 
fecha_inicio between 
DATE_ADD(current_date(), INTERVAL -1  MONTH)
and 
DATE_ADD(current_date(), INTERVAL 1  MONTH)'); 

    PREPARE stmtd from @tmp_global; 
    EXECUTE stmtd;

END 
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure global_org
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`global_org`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE global_org(emp int, dinamic_where text , flag int) 
BEGIN 




DROP TABLE IF EXISTS tmp_evento_escenarios;
SET @dinamic_where_enid =  dinamic_where;  

CASE flag
    WHEN 1    
    THEN 
      SET @dinamic_where_enid = ' yearweek(e.fecha_inicio) = yearweek(current_date())-1 '; 
    WHEN 2    
    THEN 
      SET  @dinamic_where_enid =  ' yearweek(e.fecha_inicio) = yearweek(current_date())';
    WHEN 3    
    THEN 
      SET @dinamic_where_enid =   ' yearweek(e.fecha_inicio) = yearweek(current_date())+1 ';
        
        WHEN 4      
        THEN 
            SET @dinamic_where_enid =   ' month(e.fecha_inicio) = month(current_date()) -1 and  year(e.fecha_inicio) = year(current_date()) ';

    

        WHEN 5      
        THEN 
            SET @dinamic_where_enid =   ' month(e.fecha_inicio) = month(current_date()) -1 and  year(e.fecha_inicio) = year(current_date()) ';    
        

        WHEN 6      
        THEN 
            SET @dinamic_where_enid =   ' month(e.fecha_inicio) = month(current_date()) and  year(e.fecha_inicio) = year(current_date())';    
        
        WHEN 7      
        THEN 
            SET @dinamic_where_enid =   ' month(e.fecha_inicio) = month(current_date()) + 1 ';    
        

            
    ELSE

      SET @dinamic_where_enid =  dinamic_where;
  END CASE;


SET @a = emp;



SET @tmp_global =  CONCAT('CREATE TABLE tmp_evento_escenarios AS select e.idevento,
    sum(case
        when es.idescenario is not null then 1
        else 0
    end) escenarios from
    evento e
        left outer join
    escenario es ON e.idevento = es.idevento
where e.idempresa =' , @a, ' and ' , @dinamic_where_enid , ' group by e.idevento' ); 

    PREPARE stmtd from @tmp_global; 
    EXECUTE stmtd;






DROP TABLE IF EXISTS tmp_info_evento;
CREATE TABLE tmp_info_evento AS SELECT idevento,
    nombre_evento,
    periodo_publicacion,
    edicion,
    ubicacion,
    eslogan,
    fecha_inicio,
    fecha_termino FROM
    evento
WHERE
    idempresa = emp
        AND idevento IN (SELECT 
            idevento
        FROM
            tmp_evento_escenarios);


/*ok*/
DROP TABLE IF EXISTS tmp_puntos_venta;
CREATE TABLE tmp_puntos_venta AS SELECT ep.idevento, COUNT(idevento) evento_punto_venta FROM
    evento_punto_venta ep
WHERE
    ep.idevento IN (SELECT 
            idevento
        FROM
            tmp_evento_escenarios)
GROUP BY idevento;
 





DROP TABLE IF EXISTS tmp_evento_servicios;
CREATE TABLE tmp_evento_servicios AS SELECT es.idevento, COUNT(idevento) servicios FROM
    evento_servicio es
WHERE
    es.idevento IN (SELECT 
            idevento
        FROM
            tmp_evento_escenarios)
GROUP BY idevento;


DROP TABLE IF EXISTS tmp_evento_accesos;
CREATE TABLE tmp_evento_accesos AS SELECT a.idevento, COUNT(0) accesos FROM
    acceso a
WHERE
    a.idevento IN (SELECT 
            idevento
        FROM
            tmp_evento_escenarios)
GROUP BY a.idevento;




DROP TABLE IF EXISTS tmp_evento_gmusical;
CREATE TABLE tmp_evento_gmusical AS SELECT idevento, COUNT(*) generos_musicales FROM
    evento_genero_musical
WHERE
    idevento IN (SELECT 
            idevento
        FROM
            tmp_evento_escenarios)
GROUP BY idevento;



/*para los escenarios y  artistas*/
DROP TABLE IF EXISTS tmp_escenarios_artistas;
CREATE TABLE tmp_escenarios_artistas AS SELECT e.idevento,
    SUM(CASE
        WHEN ea.idescenario IS NOT NULL THEN 1
        ELSE 0
    END) artistas FROM
    escenario e
        LEFT OUTER JOIN
    escenario_artista ea ON e.idescenario = ea.idescenario
WHERE
    e.idevento IN (SELECT 
            idevento
        FROM
            tmp_evento_escenarios)
GROUP BY e.idevento;


END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_tmp_img
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`create_tmp_img`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure create_tmp_img(a int  , num int  , flag int )
begin
  IF flag = 0 THEN 
    SET @tmp =  CONCAT('drop table if exists tmp_img_' ,  num ); 
      PREPARE stmtd from @tmp; 
      EXECUTE stmtd;

    SET @tmp =  CONCAT('create table tmp_img_' ,  num , ' as select idimagen, nombre_imagen,  img  from
      imagen where type =' , a ); 
    PREPARE stmtd from @tmp; 
      EXECUTE stmtd;

      
  ELSE  
    SET @tmp =  CONCAT('drop table if exists tmp_img_' ,  num ); 
      PREPARE stmtd from @tmp; 
      EXECUTE stmtd;

  END IF;     


end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure top_artistas_emp
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`top_artistas_emp`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE enidserv_eniddbbbb3.top_artistas_emp(num_a int , flag int , emp int  )
BEGIN 

  SET @num =  num_a; 
  SET @empr = emp;  

  IF flag = 0  THEN

    SET @tmp =  CONCAT('DROP TABLE IF exists tmp_solicitudes_artistas_' ,  @num ); 
      PREPARE stmtd from @tmp; 
      EXECUTE stmtd;

    SET @tmp =  CONCAT('CREATE TABLE tmp_solicitudes_artistas_' ,  @num , ' AS  select   id_artista, count(*)solicitudes 
              from solicitud_artista_org WHERE id_empresa   = ', @empr  ,'  and 
              DATE(fecha_registro) BETWEEN  DATE_ADD(CURRENT_DATE() , INTERVAL -1  MONTH) AND  CURRENT_DATE() group  by id_artista');     
    
    PREPARE stmtd from @tmp; 
      EXECUTE stmtd;

    
  ELSE 

    SET @tmp =  CONCAT('DROP TABLE IF exists tmp_solicitudes_artistas_' ,  @num ); 
      PREPARE stmtd from @tmp; 
      EXECUTE stmtd;


    END IF;         

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure experiencia_publico
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`experiencia_publico`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure experiencia_publico(emp int , num int  , flag int )
begin
    IF flag = 0 THEN 
    

        SET @tmp =  CONCAT('drop table if exists tmp_empresa_experiencia_' ,  num ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;

         SET @tmp =  CONCAT('drop table if exists tmp_contenido_' ,  num ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;

        

        SET @tmp =  CONCAT('create table tmp_empresa_experiencia_' ,  num , ' 
                        as 
                        select *  from
                        empresa_experiencia where idempresa = ', emp ,' and
                        DATE(fecha_registro) 
                        BETWEEN  DATE_ADD(CURRENT_DATE() , 
                        INTERVAL -1  MONTH) AND  CURRENT_DATE()  and fecha_registro is not null  group by id_empresa_experiencia'); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;


        SET @tmp =  CONCAT('create table tmp_contenido_' ,  num , ' 
                        as 
                        select  
                        idcontenido ,         
                        nombre_contenido     ,
                        descripcion_contenido ,
                        
                        status               ,
                        type                 

                        from contenido where type="7" and
                        DATE(fecha_registro) 
                        BETWEEN  DATE_ADD(CURRENT_DATE() , 
                        INTERVAL -1  MONTH) AND  CURRENT_DATE() group by idcontenido'); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;



        


        
    ELSE  
        SET @tmp =  CONCAT('drop table if exists tmp_empresa_experiencia_' ,  num ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;

         SET @tmp =  CONCAT('drop table if exists tmp_contenido_' ,  num ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;


    END IF;     


end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure expreriencia_iconos
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`expreriencia_iconos`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure expreriencia_iconos(emp int , num int  , flag int )
BEGIN 




 IF flag = 0 THEN 



  SET @tmp_global =  CONCAT("drop table if exists tmp_img_exp_1_" , num  ,  " "); 

      PREPARE stmtd from @tmp_global; 
      EXECUTE stmtd;

  SET @tmp_global =  CONCAT("drop table if exists tmp_img_exp_2_" , num, " "); 

      PREPARE stmtd from @tmp_global; 
      EXECUTE stmtd;


  SET @tmp_global =  CONCAT("drop table if exists tmp_img_exp_7_" , num, " "); 

      PREPARE stmtd from @tmp_global; 
      EXECUTE stmtd;



  SET @tmp_global =  CONCAT("CREATE TABLE tmp_img_exp_1_" , num , " AS SELECT idimagen, nombre_imagen, type , img , extension FROM
      imagen
  WHERE
      id_empresa =  ", emp ," 
          AND fecha_registro BETWEEN DATE_ADD(CURRENT_DATE(),
          INTERVAL - 30 DAY) AND CURRENT_DATE()
          AND type = 1
  ORDER BY fecha_registro DESC
  LIMIT 3");
  PREPARE stmtd from @tmp_global; 
  EXECUTE stmtd; 
   


  SET @tmp_global =  CONCAT("CREATE TABLE tmp_img_exp_2_" , num , " AS SELECT idimagen, nombre_imagen, type , img , extension FROM
      imagen
  WHERE
      id_empresa =  ", emp ," 
          AND fecha_registro BETWEEN DATE_ADD(CURRENT_DATE(),
          INTERVAL - 30 DAY) AND CURRENT_DATE()
          AND type = 2
  ORDER BY fecha_registro DESC
  LIMIT 3");
  PREPARE stmtd from @tmp_global; 
  EXECUTE stmtd; 
  

  SET @tmp_global =  CONCAT("CREATE TABLE tmp_img_exp_7_" , num , " AS SELECT idimagen, nombre_imagen, type , img , extension FROM
      imagen
  WHERE
      id_empresa =  ", emp ," 
          AND fecha_registro BETWEEN DATE_ADD(CURRENT_DATE(),
          INTERVAL - 30 DAY) AND CURRENT_DATE()
          AND type = 7
  ORDER BY fecha_registro DESC
  LIMIT 3");

  PREPARE stmtd from @tmp_global; 
  EXECUTE stmtd; 

  ELSE  

  SET @tmp_global =  CONCAT("drop table if exists tmp_img_exp_1_" , num  ,  " "); 

      PREPARE stmtd from @tmp_global; 
      EXECUTE stmtd;

  SET @tmp_global =  CONCAT("drop table if exists tmp_img_exp_2_" , num, " "); 

      PREPARE stmtd from @tmp_global; 
      EXECUTE stmtd;


  SET @tmp_global =  CONCAT("drop table if exists tmp_img_exp_7_" , num, " "); 

      PREPARE stmtd from @tmp_global; 
      EXECUTE stmtd;

  END IF; 


END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure proximos_eventos
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`proximos_eventos`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure proximos_eventos( num int  , flag int , condicion_extra text  )
begin
    IF flag = 0 THEN 
    
        SET @tmp =  CONCAT('drop table if exists tmp_proximos_eventos_' ,  num ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;

         SET @tmp =  CONCAT('create table tmp_proximos_eventos_', num , ' as  
            select
            idevento,
            nombre_evento, 
            edicion,
            fecha_inicio,
            fecha_termino,
            descripcion_evento,
            ubicacion,
            eslogan,
            tipo 
            from evento 
            where fecha_inicio >= CURRENT_DATE() ', condicion_extra  ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;        
        
    ELSE  
       
        SET @tmp =  CONCAT('drop table if exists tmp_proximos_eventos_' ,  num ); 
        PREPARE stmtd from @tmp; 
        EXECUTE stmtd;

    END IF;     


end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure repo_eventos_public
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`repo_eventos_public`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE enidserv_eniddbbbb3.repo_eventos_public( flag int , num_a int , extra text , extra2 text ) 
BEGIN 
SET @num =  num_a; 
SET @ext = extra; 
SET @ext2 = extra2; 



    IF flag = 0  THEN

            /**************************************ESCENARIOS ARTISTAS INICIA *****************************************************/
            SET @c_repo_escenarios_artistas = CONCAT('select e.idevento,
                sum(case
                    when ea.idescenario is not null then 1
                    else 0
                end) artistas from
                escenario e
                    left outer join
                escenario_artista ea ON e.idescenario = ea.idescenario

                where 1=1 ', @ext2 ,'

            group by e.idevento');
            SET @dinamic_eac =  CONCAT('CREATE TABLE repo_escenarios_artistas_' ,  @num  , ' AS '  ,  @c_repo_escenarios_artistas); 
            PREPARE stmtc from @dinamic_eac; 
            EXECUTE stmtc;

            /**************************************** PUNTOS VENTA  INICIA ***************************************************/

            SET @d =  CONCAT('CREATE TABLE repo_evento_puntos_venta_', @num , ' AS ' ,  'select e . *, 
                count(idevento) evento_punto_venta from
                evento_punto_venta e  
                where 1=1 ', @ext2 ,'
                group by idevento' );
              
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


            /**************************************INICIA SERVICIOS ***************************************************/
           
            SET @d =  CONCAT('CREATE TABLE repo_evento_servicios_' , @num , ' AS ' , 'select e.idevento , e.idservicio , e.nota, 
                count(e.idevento) servicios from
                evento_servicio e  
                where 1=1 ', @ext2 ,'    
                group by e.idevento' );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


            /**************************************INICIA ACCESOS AL EVENTO ********************************/

            SET @d =  CONCAT( 'CREATE TABLE reporte_evento_accesos_', @num , ' AS ' , 'select e.idevento, count(0) accesos from acceso e    
                     
            group by e.idevento');
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


            SET @d =  CONCAT('CREATE TABLE repo_eventos_escenarios_' , @num , ' AS ' , ' select e.idevento,
                e.nombre_evento,
                e.status,
                e.edicion,
                e.descripcion_evento,    
                e.idempresa,
                e.idusuario,
                e.fecha_inicio,
                e.fecha_termino,
                e.ubicacion,
                e.url_social,
                e.url_social_youtube,
                e.eslogan,
                e.tipo,
                sum(case
                    when es.idescenario is not null then 1
                    else 0
                end) escenarios from
                evento e
                    left outer join
                escenario es ON e.idevento = es.idevento ', @ext  ,' 
                ', @ext2 , '
               
                group by e.idevento');
            PREPARE stmtd from @d; 
            EXECUTE stmtd;


    ELSE 

            SET @dinamic_ead =  CONCAT('DROP TABLE IF EXISTS repo_escenarios_artistas_'  , @num  ); 
            PREPARE stmtd from @dinamic_ead; 
            EXECUTE stmtd;

            SET @d =  CONCAT('DROP TABLE IF EXISTS repo_evento_puntos_venta_' ,  @num  ); 
            PREPARE stmtd from @d; 
            EXECUTE stmtd;    

            SET @d =  CONCAT('DROP TABLE IF EXISTS repo_evento_servicios_' ,  @num  );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;
            
            SET @d =  CONCAT('DROP TABLE IF EXISTS reporte_evento_accesos_' ,  @num  );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;

            SET @d =  CONCAT('DROP TABLE IF EXISTS repo_eventos_escenarios_' ,  @num  );
            PREPARE stmtd from @d; 
            EXECUTE stmtd;

 

    END IF;         

END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure create_temp_palabra_clave
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`create_temp_palabra_clave`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE  create_temp_palabra_clave(condicional text , num int  , flag int  ,  keyword text  )
      BEGIN 

      IF flag = 0 THEN 
      set  @c =  condicional; 



      SET @tmp_query =  CONCAT('DROP TABLE  if EXISTS evento_palabra_clave_' , num ); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;


      SET @tmp_query =  CONCAT('DROP TABLE  if EXISTS evento_tmp_' , num ); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;


      SET @tmp_query =  CONCAT('CREATE TABLE evento_tmp_', num , ' AS SELECT 
idevento           ,
nombre_evento      ,
edicion            ,
fecha_inicio       ,
fecha_termino      ,
ubicacion          ,
status             ,
url_social         ,
url_social_youtube ,
eslogan            ,
tipo                FROM
          evento e ', @c  ); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;



      SET @tmp_query =  CONCAT('CREATE TABLE evento_palabra_clave_', num , ' AS SELECT * FROM
          event_palabra_clave_default'); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;

      /*insertamos palabras claves para evento por nombre**/
      SET @tmp_query =  CONCAT('INSERT INTO evento_palabra_clave_', num , ' 
          SELECT  idevento ,  nombre_evento , 1   FROM evento_tmp_', num ,'  e  ' ,  @c ,  " and  e.nombre_evento like '%", keyword  ,"%'  "); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;





      /********************************** ********************************** **********************************/

      SET @tmp_query =  CONCAT('INSERT INTO evento_palabra_clave_', num , ' 
      SELECT 
          idevento, artista , 3
      FROM
          evento_tmp_', num ,'  e 
              inner join  
          evento_artista ON idevento = id_evento

      ' ,  @c , 'and  evento_artista.artista like "%', keyword,'%" ' ); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;


      /********************************** ********************************** **********************************/




      SET @tmp_query =  CONCAT('INSERT INTO evento_palabra_clave_', num , ' 
      SELECT e.idevento , eg.genero  , 2  FROM  evento_tmp_', num ,'  e 
      INNER JOIN evento_genero eg 
      ON
      e.idevento = eg.id_evento  and eg.genero 
      ' ,  @c ,  ' and   eg.genero  like "%', keyword,'%"  ' ); 
      PREPARE stmtd from @tmp_query; 
      EXECUTE stmtd;


      ELSE  



        SET @tmp_query =  CONCAT('DROP TABLE  if EXISTS evento_tmp_' , num ); 
        PREPARE stmtd from @tmp_query; 
        EXECUTE stmtd;


        SET @tmp_query =  CONCAT('DROP TABLE  if EXISTS evento_palabra_clave_' , num ); 
        PREPARE stmtd from @tmp_query; 
        EXECUTE stmtd;




      END IF;     




END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`countries`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (1, 'Argentina');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (2, 'Bolivia');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (3, 'Brasil');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (4, 'Canada');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (5, 'Chile');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (6, 'Colombia');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (7, 'Costa Rica');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (8, 'Cuba');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (9, 'Ecuador');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (10, 'El Salvador');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (11, 'España');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (12, 'Estados Unidos');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (13, 'Guatemala');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (14, 'Honduras');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (15, 'México');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (16, 'Nicaragua');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (17, 'Panama');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (18, 'Paraguay');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (19, 'Peru');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (20, 'Puerto Rico');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (21, 'Uruguay');
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryName`) VALUES (0, 'Aún sin definir');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`plan`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`plan` (`idplan`, `nombre`, `Especificacionesplan`, `numerousuarios`) VALUES (1, 'standar', 'Uso estandar, su precio puede cambiar porteriormente', 4);
INSERT INTO `enidserv_eniddbbbb3`.`plan` (`idplan`, `nombre`, `Especificacionesplan`, `numerousuarios`) VALUES (2, 'Goldenroot', 'Todo', 10000);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`empresa`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`empresa` (`idempresa`, `nombreempresa`, `idCountry`, `fecha_registro`, `status`, `idplan`, `quienes_somos`, `mision`, `vision`, `years`, `mas_info`, `slogan`, `artistas`, `facebook`, `tweeter`, `gp`, `www`, `mensaje_comunidad`) VALUES (1, 'Enid service', 1, NULL, '\'1\'', 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.}+', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'No sólo basta la musica el ingrediente principal eres tú!', 2, NULL, NULL, NULL, NULL, ' simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.');
INSERT INTO `enidserv_eniddbbbb3`.`empresa` (`idempresa`, `nombreempresa`, `idCountry`, `fecha_registro`, `status`, `idplan`, `quienes_somos`, `mision`, `vision`, `years`, `mas_info`, `slogan`, `artistas`, `facebook`, `tweeter`, `gp`, `www`, `mensaje_comunidad`) VALUES (2, 'Developer', 2, NULL, '\'1\'', 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 8, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'No sólo basta la musica el ingrediente principal eres tú!', 5, NULL, NULL, NULL, NULL, 'No sólo basta la musica el ingrediente principal eres tú!');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`, `apellido_paterno`, `apellido_materno`, `email_alterno`, `tel_contacto`, `tel_contacto_alterno`, `edad`, `numero_empleado`, `inicio_labor`, `fin_labor`, `grupo`, `cargo`, `rfc`, `turno`, `ultima_modificacion`, `descripcion_usuario`, `url_fb`, `url_tw`, `url_www`, `sexo`, `tipo`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (1, 'arithgrey', 'arithgrey@gmail.com', '870058cbcebe244bce513be539acd6905bca8d99', NULL, 1, NULL, 'Presidente ejecutivo', 'Usuario Activo', 'Medrano', 'Salazar', 'enidservice@gmail.com', 5573355891, 5545444823, 25, NULL, '09:00 AM', '18:00 PM', 'Desarrollo', 'Presidente Ejecutivo', NULL, 'Matutino', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`, `apellido_paterno`, `apellido_materno`, `email_alterno`, `tel_contacto`, `tel_contacto_alterno`, `edad`, `numero_empleado`, `inicio_labor`, `fin_labor`, `grupo`, `cargo`, `rfc`, `turno`, `ultima_modificacion`, `descripcion_usuario`, `url_fb`, `url_tw`, `url_www`, `sexo`, `tipo`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (2, 'estratega test', 'estrategatest@gmail.com', '870058cbcebe244bce513be539acd6905bca8d99', NULL, 1, NULL, 'Presidente ejecutivo', 'Usuario Activo', NULL, NULL, NULL, NULL, NULL, 25, NULL, '09:00 AM', '18:00 PM', 'Desarrollo', 'Presidente Ejecutivo', NULL, 'Matutino', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`, `apellido_paterno`, `apellido_materno`, `email_alterno`, `tel_contacto`, `tel_contacto_alterno`, `edad`, `numero_empleado`, `inicio_labor`, `fin_labor`, `grupo`, `cargo`, `rfc`, `turno`, `ultima_modificacion`, `descripcion_usuario`, `url_fb`, `url_tw`, `url_www`, `sexo`, `tipo`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (3, 'administradortest', 'administradortest@gmail.com', '870058cbcebe244bce513be539acd6905bca8d99', NULL, 1, NULL, 'Administrador', 'Usuario Activo', NULL, NULL, NULL, NULL, NULL, 18, NULL, '09:00 AM', '18:00 PM', NULL, NULL, NULL, 'Matutino', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`, `apellido_paterno`, `apellido_materno`, `email_alterno`, `tel_contacto`, `tel_contacto_alterno`, `edad`, `numero_empleado`, `inicio_labor`, `fin_labor`, `grupo`, `cargo`, `rfc`, `turno`, `ultima_modificacion`, `descripcion_usuario`, `url_fb`, `url_tw`, `url_www`, `sexo`, `tipo`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (4, 'tester', 'tester@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 2, NULL, NULL, 'Usuario Activo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09:00 AM', '18:00 PM', NULL, NULL, NULL, 'Matutino', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (3, 'Super administrador', NULL, 'Usuario tiene derecho a todas las funciones del sistema', 'No Disponible ');
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (4, 'Administrador de cuenta', NULL, 'Administrador de la cuenta en la empresa ', 'Dispobible');
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (5, 'Estratega digital', NULL, 'Persona que realiza la estrategia de los eventos musicales ', 'Dispobible');
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (6, 'Director de la empresa', NULL, 'Director de la empresa', 'Dispobible');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`recurso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (1, 'Miembros', NULL, 'Matriz que tiene que ver con los Usuarios', 'index.php/recursocontroller/usuarios', 'fa fa-users', 'Disponible', 3);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (5, 'Módulos', NULL, 'Cambios en los perfiles del sistema', 'index.php/recursocontroller/perfiles', 'fa fa-cogs', 'No Disponible', 11);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (6, 'Log', NULL, 'Modulo para ver los reportes por parte de los usuarios', 'index.php/reportecontrolador/listarReportes', 'fa fa-tasks', 'No Disponible', 10);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (7, 'Tendencias', NULL, 'Como director, quiero entender las tendencias del mercado, tomando en cuenta artistas y géneros musicales, con la finalidad de cuantificar la eficiencia y eficacia de las acciones de mi organización.', 'index.php/tendencias', 'fa fa-line-chart', 'No Disponible', 2);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (8, 'General', NULL, 'Como director, quiero  visualizar histogramas, estadísticas y gráficos resultantes de los diversos análisis efectuados por el sistema, con la finalidad de evaluar las fortalezas, oportunidades, riesgos y debilidades de mi negocio. ', 'index.php/general', 'fa fa-angle-double-right', 'No Disponible', 12);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (9, 'Seguimiento', NULL, 'Como estratega digital, quiero saber que personas se interesan por la marca con la finalidad de  dar seguimiento a los clientes y tener nuevas alternativas para ampliar el negocio. ', 'index.php/seguimiento', 'fa fa-heartbeat', 'No Disponible', 13);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (10, 'Eventos', NULL, 'Como estratega digital, quiero poder  filtrar la promoción de eventos los cuales integren funcionalidades de las plataformas Youtube y soundcloud, con la finalidad de potencializar  la imagen de los eventos y las experiencias se hagan palpables  previos a cada  suceso. ', 'index.php/inicio/eventos', 'fa fa-headphones', 'Disponible', 7);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (12, 'Disfruta la experiencia', '', 'Como público que frecuenta al sistema, quiero poder requerir a las organizaciones la  presentación de sus eventos en mi país, con la finalidad de disfrutar la experiencia que se vive en otras naciones.\n', 'index.php/disfrutalaexperiencia', 'fa fa-fighter-jet', 'No Disponible', 15);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (13, 'Directorio', NULL, NULL, 'index.php/directorio', 'fa fa-book', 'Disponible', 4);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (14, 'Plantillas', NULL, 'Plantillas comunes en el sistema y su uso', 'index.php/template', 'fa fa-file-text-o', 'Disponible', 6);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (16, 'Puntos de venta', NULL, NULL, 'index.php/puntosventa', 'fa fa-credit-card', 'Disponible', 5);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (17, 'Actividades', NULL, '', 'index.php/actividades', 'fa fa-calendar', 'Disponible', 8);
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`, `status`, `order_negocio`) VALUES (18, 'Organización', NULL, '', 'index.php/emp/lahistoria', 'fa fa-building', 'Disponible', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`usuario_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`, `fecha_registro`) VALUES (1, 3, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`, `fecha_registro`) VALUES (2, 5, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`, `fecha_registro`) VALUES (3, 4, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`, `fecha_registro`) VALUES (4, 4, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`perfil_recurso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 5);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 6);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 8);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 9);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 14);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 14);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 14);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 16);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 17);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 17);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 18);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 18);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 18);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`permiso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (1, 'Miembros de la cuenta', '', 1, 'index.php/recursocontroller/usuarios', 'fa fa-user-plus');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (8, 'Configuración', NULL, 5, 'index.php/recursocontroller/perfiles', 'fa fa-wrench');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (9, 'general', NULL, 6, 'index.php/reportecontrolador/listarReportes', 'fa fa-th');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (10, 'Administrar eventos', 'Como estratega digital, quiero poder  filtrar la promoción de eventos los cuales integren funcionalidades de las plataformas Youtube y soundcloud, con la finalidad de potenciar la imagen de los eventos y las experiencias se hagan palpables  previos a cada  suceso. \n', 10, 'index.php/inicio/eventos', 'fa fa-star');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (12, 'Contactos', NULL, 13, 'index.php/directorio/contactos', 'fa fa-cart-plus');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (13, 'Mis plantillas', 'plantillas de uso común al crear eventos', 14, 'index.php/templates/eventos', 'fa fa-play');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (16, 'Permisos', NULL, 1, 'index.php/recursocontroller/perfilconfig', 'fa fa-wrench');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (18, 'Eventos por usuario', NULL, 7, 'index.php/tendencias/eventosporusuario', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (19, 'Tendencias', NULL, 7, 'index.php/tendencias/', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (20, 'Rendimiento', NULL, 7, 'index.php/tendencias/tendenciasportipoevento', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (21, 'Próximamente', NULL, 17, 'index.php/actividades/proximamente', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (22, 'Administrar', NULL, 16, 'index.php/puntosventa/administrar', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (23, 'Mis eventos administrados', NULL, 7, 'index.php/tendencias/miseventos', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (24, 'Configuración', NULL, 18, 'index.php/emp/lahistoria', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (26, 'Por mejorar', NULL, 7, 'index.php/tendencias/gestionar', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (27, 'Solicitudes', NULL, 7, 'index.php/tendencias/solicitudes', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`perfil_permiso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 8);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 9);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 16);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 21);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 22);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 21);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 24);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 24);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`plan_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (1, 4);
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (2, 3);
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (1, 5);
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (1, 6);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`motivo_cancelacion`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`motivo_cancelacion` (`id_motivo`, `descripcion`) VALUES (1, 'El artista tuvo problemas para presentarse');
INSERT INTO `enidserv_eniddbbbb3`.`motivo_cancelacion` (`id_motivo`, `descripcion`) VALUES (2, 'Se presentaron problemas con la contratación del lugar del evento');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tipo_acceso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (1, 'Día del evento', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (2, 'Preventa 1', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (3, 'Preventa 2', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (4, 'Preventa 3', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (5, 'Preventa 4', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (6, 'Preventa 5', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (7, 'Preventa 6', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (8, 'Único día', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (9, 'Promoción', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (10, 'General H', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (11, 'General M', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (12, 'General H & M', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`servicio`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (1, 'Estacionamiento', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (2, 'Parque de diversiones dentro del evento', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (3, 'Alberca', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (4, 'Fuegos artificiales ', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (5, 'Efectos especiales e iluminación', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (6, 'Video', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (7, 'Fotografía', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (8, 'Artistas internacionales', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (9, 'Representantes de la escena', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (10, 'Seguridad', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (11, 'Audio Profesional', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (12, 'Baños H & M', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (13, 'Performance', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (14, 'Iluminación Profesional', NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`, `fecha_registro`) VALUES (15, 'Instalaciones de arte', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`objetopermitido`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (1, 'Bolsas pequeñas', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (2, 'Mochilas de un solo compartimento', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (3, 'Bolsas de mano', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (4, 'Celulares', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (5, 'Lentes de sol', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (6, 'Encendedores ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (7, 'Tapones de oído ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (8, 'Pomada de labios y lipgloss cerrado', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (9, 'Maquillaje en polvo ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (10, 'Tampones/toallas sanitarias en empaque cerrado', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (11, 'Paquetes de chicles cerrado ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (12, 'Medicinas de prescripción (Con prescripción de un doctor)', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (13, 'Hula hoops', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (14, 'Muñecos inflables', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (15, 'Banderas o pancartas hechas a mano (sin material dañino)', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (16, 'Cameras no profesionales de flash', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (17, 'Bloqueador solar ', NULL, '1', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`genero_musical`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (1, 'House', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (2, 'Minimal', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (3, 'Bass‎ ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (4, 'Hip hop & Rap', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (5, 'Jazz‎ ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (6, 'Dance‎ ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (7, 'Soul‎', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (8, 'Pop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (9, 'Rock', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (10, 'Musica electrónica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (11, 'Rap', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (12, 'Rock alternativo', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (13, 'Hip-Hop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (14, 'Rock and roll', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (15, 'Clasica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (16, 'Rock progresivo', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (17, 'Trash metal', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (18, 'Punk', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (19, 'Rock sinfonico', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (20, 'Grunge', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (21, 'Ska', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (22, 'Tecno', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (23, 'Disco', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (24, 'Country', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (25, 'Rhythm and Blues (R&B)', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (26, 'Blues', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (27, 'Tango', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (28, 'Vallenato', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (29, 'Samba', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (30, 'Trance', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (31, 'R&B & Soul', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (32, 'Electroacustica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (33, 'Art-rock', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (34, 'Sicodelica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (35, 'Underground', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (36, 'Swing', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (37, 'New age', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (38, 'Free-Jazz', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (39, 'Bossa nova', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (40, 'Eurobeat', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (41, 'Cool-Jazz', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (42, 'Nueva onda', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (43, 'Break-beat', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (44, 'Acid', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (45, 'Bebop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (46, 'Zarzuela', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (47, 'Garage', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (48, 'Ragtime', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (49, 'Ambient', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (50, 'Deep House', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (51, 'Drum & Bass', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (52, 'Dubstep', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (53, 'Metal', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (54, 'Indie', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (55, 'Jazz & Blues', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (56, 'piano', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (57, 'Soundtrack', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (58, 'Trap', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (59, 'Trip Hop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (60, 'World', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tematica`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (1, 'Fiestas de disfraces', '1', '');
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (2, 'Fiesta retro', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (3, 'Ambientado a los 70', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (4, 'Fiestas patrias', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (5, 'Medieval', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (6, 'Circo', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (7, 'Carnaval', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (8, 'Hollywood', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (9, 'Fantasía', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (10, 'Fiesta de sembrinas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (11, 'Una noche de Película', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (12, 'Alebrijes', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (13, 'Hawaiana', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (14, 'Rock & Roll', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (15, 'Vampiros', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (16, 'Sombreros', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (17, 'Antifaces', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (18, 'Terrorífica', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (19, 'De los ochentas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (20, 'Fiesta griega', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (21, 'Fiesta Black & White.', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (22, 'Futurista', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (23, 'Tipo las vegas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (24, 'Piratas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (25, 'Súper Héroes', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (26, 'Primer Aniversario', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (27, 'Segundo Aniversario', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (28, 'Tercer Aniversario', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (29, 'Cuarto Aniversario', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (30, 'Quinto Aniversario', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (31, 'Aniversario', '1', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`contacto`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (1, 'monica  soto garcia', NULL, '7151214957', NULL, 'monica@hotmail.com', '   AV. INDEPENDENCIA N0.677  COL. LA PIRAGUA TUXTEPEC', 'Contacto disponible para ser usado', NULL, 'Proveedor', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (2, 'lorenzo  gordial araiza', NULL, '3334551953', NULL, 'dr.lorenzo@gmail.com', 'AV. INDEPENDENCIA NO. 241  COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Proveedor', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (3, 'leocaria  tamayo quiroz', NULL, '3349594021', NULL, 'leokarr122@hotmail.com', '   AV. 5 DE MAYO NO 1100-A   CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Proveedor', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (4, 'patricia  moreno hernandez', NULL, '3310263136', NULL, 'pnoo120487@live.com.mx', '  AV. 20 DE NOVIEMBRE NO.1024   COL.CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Proveedor', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (5, 'fimitrio  medina mejia', NULL, '3317472403', NULL, 'fisilicapolanco@hotmail.com', '   CALLE MATAMOROS NO.280  COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Proveedor', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (6, 'ricardo constantino antonio calva', NULL, '5556000096', NULL, 'ricardoccr@live.com', '  AV.INDEPENDENCIA NO. 574  COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Proveedor', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (7, 'david  velazquez carrillo', NULL, '3319557839', NULL, 'dvc_airam@hotmail.com', '  AV. 18 DE MARZO ESQ. BLVD.M. AVILA CAMACHO NO. 1372   COL. LAZARO CARDENAS TUXTEPEC   68340   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (8, 'lillian del rocio de la parra gonzalez', NULL, '3315248491', NULL, 'lilianher911@gmail.com', '  AV. INDEPENDENCIA N0.670  COL. CENTRO TUXTEPEC', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (9, 'mauricio  españa trinidad', NULL, '3315603228', NULL, 'trinidad_1_lo12@hotmail.com', '  20 DE NOVIEMBRE NO. 955   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (10, 'luis armando gonzalez perez', NULL, '5577118051', NULL, 'loica765@gmail.com', '  AV. LIBERTAD NO. 56   COL. CENTRO TUXTEPEC  68300', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (11, 'maria guadalupe rodriguez ortega', NULL, '5552771621', NULL, 'maria_oo1151@homail.com', '  AV.INDEPEND.NO. 1065  COL. LA PIRAGUA   68380', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (12, 'luis  zapata arguello', NULL, '2381203542', NULL, 'liogt6y_er@hotmail.com', '  CALLE MORELOS NO.426  COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (13, 'jose manuel saucedo lopez', NULL, '3312699458', NULL, 'loseuigiarma@hotmail.com', '20 DE NOVIEMBRE NO. 1081  CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (14, 'jose antonio alferes santos', NULL, '3334530354', NULL, 'jaas@gmail.com', '  CALLE MATAMOROS NO. 40  COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (15, 'jose edgar hernandez luz', NULL, '5583823327', NULL, 'jh_231901@outlook.com', '  BLVD. MANUEL AVILA CAMACHO 435  MARIA LUISA TUXTEPEC  68320   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (16, 'miguel angel panuco ayala', NULL, '5513261681', NULL, 'migue_gezzy.96@gmail.com', '  AV. 20 DE NOVIEMBRE NO. 1105 ESQ.OCAMPO   COL. LA PIRAGUA TUXTEPEC  68380   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (17, 'carlos martin guzman rodriguez', NULL, '5527425070', NULL, 'skate_toxina@hotmail.com', 'AV. JESUS CARRANZA NO. 123   COL. LAZARO CARDENAZ TUXTEPEC   68340   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (18, 'cruz maria velazquez carrion', NULL, '5555174618', NULL, 'cruz.carrion@live.com.mx', '   AV. JESUS CARRANZA NO. 123  COL. LAZARO CARDENAZ TUXTEPEC   68340   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (19, 'luis alberto peralta barcenas', NULL, '56076247', NULL, 'edel_barcenas@hotmail.com', '   PROLONG. INDEPENDENCIA NO. 2237   COL. OAXACA TUXTEPEC  68350', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (20, 'maria de los angeles elena preciado venegas', NULL, '5531510331', NULL, 'vanegas_122@gmail.com', '   CALLE ALDAMA NO.233-A   COL.CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (21, 'tania nayeli montoya sierra', NULL, '5515391025', NULL, 'tania.nayeli.montoya.sierra@homail.com', '  INDEPENDENCIA NO. 569 B   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (22, 'luis miguel torres manzo', NULL, '5539185152', NULL, 'tmanzo_98@yahoo.com.mx', '   AV. FERROCARRIL S/N.  COL. CENTRO PUEBLO NUEVO. PAPALOAPAN  68441   ', 'Contacto disponible para ser usado', NULL, 'Contacto personal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (23, 'ramon  casillas mojarro', NULL, '5518384897', NULL, 'rcmaipa69@hotmail.com', '   MATAMOROS No. 138   CENTRO TUXPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto personal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (24, 'pedro  villaneda marquez', NULL, '5530751218', NULL, 'pilarvalencia@gmail.com', '  AV. 20 DE NOVIEMBRE No. 1037  CENTRO TUXTEPEC   68380   ', 'Contacto disponible para ser usado', NULL, 'Contacto personal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (25, 'jesus  mesa vazques', NULL, '5568344206', NULL, 'jethzavaqla83@gmail.com', '   AV. 20 DE NOVIEMBRE NO. 1139-B  COL.CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto personal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (26, 'catalina mireya trejo pichardo', NULL, '5564153568', NULL, 'pichardo@gmail.com', '   CALLE MORELOS NO. 330 INT.2   COL.CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto personal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (27, 'ana laura cruz martinez', NULL, '5560416505', NULL, 'ana.laura.cruz.martinez_nys@hotmail.com', '   AV. 5 DE MAYO NO. 1401  COL. CENTRO   68300   ', 'Contacto disponible para ser usado', NULL, 'Artista', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (28, 'manuel alejandro olivares brito', NULL, '5555956414', NULL, 'maobao7@hotmail.com', '   AV. 20 DE NOVIEMBRE ESQ.EMILIANO ZAPATA S/N   COL. CENTRO   68300   ', 'Contacto disponible para ser usado', NULL, 'Artista', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (29, 'mario alberto corona inclan', NULL, '5532436635', NULL, 'maci_norma1251@hotmail.com', '  AV. LIBERTAD NO. 1207   COL. CENTRO   68300', 'Contacto disponible para ser usado', NULL, 'Artista', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (30, 'siria lizeth herrera aguilar', NULL, '5537098560', NULL, 'blackpanther04@hotmail.com', '   AV. ALFONSO CASO NO. 15   CENTRO TUXTEPEC   70215   ', 'Contacto disponible para ser usado', NULL, 'Artista', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (31, 'raul alfonso gonzalez melendez', NULL, '5515400128', NULL, 'mel_bas_tida@hotmail.com', '   CALLE ALDAMA NO.70  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Artista', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (32, 'maria xochitl perea morales', NULL, '5565861859', NULL, 'xoch_ag@gmial.com', '   AV. 20 DE NOVIEMBRE NO. 1960  COL.CENTRO TUXTEPEC.  68300   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (33, 'maria isidra ortiz tarazua', NULL, '5553237801', NULL, 'tarazua_1520@hotmail.com', '   INDEPENDENCIA 623   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (34, 'luis enrique larrea rivera', NULL, '5533775865', NULL, 'lelr13@hotmail.com', '   KM.5 CARRET.TUX-PTE. CARACOL  TUXTEPEC.   68310   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (35, 'silvia irene martinez nuñez', NULL, '5522951469', NULL, 'silvia_mimñ_jt@hotmail.com', '  AV. INDEPENDENCIA NO 511 A  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (36, 'carlos domingo sandoval morales', NULL, '5544725282', NULL, 'cadsamd@hotmail.com', '   KM 3.5 CARRETERA TUXTEPEC CD. ALEMAN  FRACCIONAMIENTO COSTA VERDE   68310   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (37, 'luciana cristina renteria romero', NULL, '5559137222', NULL, 'g.g_13@hotmail.com', '   AV. REFORMA NO.587  COL.EL CASTILLO   68360   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (38, 'juan pablo guiterrez ayala', NULL, '3318866115', NULL, 'romero_an_chavid@hotmail.com', '   AV. INDEPENDENCIA NO. 377   COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Productora', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (39, 'kiabet anay rolon iñiguez', NULL, '6143447545', NULL, 'kiabet_md@gmail.com', '   AV. INDEPENDENCIA NO. 727   COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Productora', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (40, 'julio cesar rojas pineda', NULL, '9983035654', NULL, 'julio_p@hotmail.com', '  PROLONG.INDEPENDENCIA NO.468-B  COL.OAXACA  68360   ', 'Contacto disponible para ser usado', NULL, 'Productora', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (41, 'miguel angel carrillo candia', NULL, '9983033598', NULL, 'a.cando.en@gmail.com', '   CALLE GUERRERO ESQ. MURO BLVD.  COL. CENTRO   68300   ', 'Contacto disponible para ser usado', NULL, 'Productora', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (42, 'tania isela beltran perez', NULL, '9983011190', NULL, 'taryz26@gmail.com', '   BLVD.BENITO JUAREZ NO. 42-C   COL.COSTA VERDE   68310   ', 'Contacto disponible para ser usado', NULL, 'Productora', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (43, 'daniela paola tobias flores', NULL, '9982936912', NULL, 'tob_daniela68.ap@gmail.com', '  AV. MANCILLA ESQ. ALDAMA S/N.   COL. LAZARO CARDENAS TUXTEPEC   68340   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (44, 'norma patricia hernandez olivares', NULL, '9982424661', NULL, 'oli_r12@hotmail.com', '   KM.2 CARR.FEDERAL TUX-OAXACA.   EX-HACIENDA EL YUCAL  68310   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (45, 'teodoro enrique pino leal', NULL, '9982329107', NULL, 'pino_l_memo@hotmail.com', '   AV. INDEPENDENCIA NO. 643 (425)   COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (46, 'jose luis melgarejo gonzalez', NULL, '9982152580', NULL, 'jlmmg858@gmail.com', '   C. ZARAGOZA NO. 329   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (47, 'jose javier perez flores', NULL, '9982073343', NULL, 'jjperes_2er@gmail.com', '  C. MARINA HERNANDEZ N. 5  COL. MARIA LUISA TUXTEPEC   68320   ', 'Contacto disponible para ser usado', NULL, 'Contacto Comercial', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (48, 'julio cristian romero tenorio', NULL, '9982043571', NULL, 'julio_cristian_romero@gmail.com', '   AV. INDEPENDENCIA NO. 405   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (49, 'jesus alberto garcia pedro', NULL, '9982026782', NULL, 'jszn1406@gmail.com', '   AV. 5 DE MAYO ESQ. MATAMOROS NO 1070  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (50, 'ivan pavel escamilla garcia', NULL, '9982013131', NULL, 'abg.j.garcia@gmail.com', '  BLVD. BENITO JUAREZ NO 568  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (51, 'victor hugo valencia fernandez', NULL, '9982001476', NULL, 'vic_djz@hotmail.com', '  AV. 20 DE NOVIEMBRE NO 822  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (52, 'maria del pilar rivera aguillon', NULL, '9932327172', NULL, 'mari_amos531@gmail.com', '  CALLE PRINCIPAL S/N.  SN.MIGUEL SOYALTEPEC(TEMASCAL   68430   ', 'Contacto disponible para ser usado', NULL, 'Colaborador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (53, 'sergio  castillo nuñez', NULL, '9932323181', NULL, 'serlpako14@yahoo.com', 'CARR. A OJITLAN NO. 951-A  COL. 5 DE MAYO TUXTEPEC   68360   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (54, 'sandra guadalupe cortes jimenez', NULL, '9932202393', NULL, 'correo_jimenez@gmail.com', '  AV. INDENDENCIA NO. 1381  LA PIRAGUA  68380   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (55, 'pedro  herrera cortina', NULL, '9932200234', NULL, 'cortina@gmail.com', '  AV. INDEPENDENCIA NO. 346   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (56, 'hortencia  ramos sanchez', NULL, '9932136299', NULL, 'ramosngf_777@gmail.com', '   AV. MANCILLA ESQ. ALDAMA S/N  LAZARO CARDENAS   68340   ', 'Contacto disponible para ser usado', NULL, 'Patrocinador', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (57, 'maria elena quiles estrada', NULL, '9932171000', NULL, 'dox._@hotmail.com', '  AV. INDEPENDENCIA NO. 858   COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (58, 'francisco javier maldonado hernandez', NULL, '9932164117', NULL, 'maldonado_cloks@hotmail.com', '  C. ALDAMA NO. 25  COL.CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (59, 'gustavo alberto rodriguez pacheco', NULL, '9932158446', NULL, 'rpgaa@hotmail.com', 'AV. INDEPENDENCIA NO 49  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (60, 'omar eduardo nuñez escobedo', NULL, '9932150092', NULL, 'oma_ranita_rtm75@gmail.com', '  KM. 2 CARRETERA TUXTEPEC- VALLE NACIONAL  CONJUNTO HABITACIONAL DE CERVECERA  68365   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (61, 'jose de jesus mora nuño', NULL, '9932117518', NULL, 'j.i.s.195954@gmail.com', 'ARTEAGA NO 729  LAZARO CARDENAS TUXTEPEC  68340   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (62, 'luis antonio torres castillo', NULL, '9932110298', NULL, 'zyeklam_tz7@hotmail.com', '  AV. INDEPENDENCIA N. 1282-A   CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (63, 'luis alfredo bravo velasco', NULL, '9932104669', NULL, 'bravo_7279@hotmail.com', 'BLVD. BENITO JUAREZ ESQ. AV. 5 DE MAYO NO 670  LA PIRAGUA TUXTEPEC   68380   01 ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (64, 'miguel angel almadas grano', NULL, '9932082848', NULL, 'boni-zereo@hotmail.com', '   MATAMOROS NO 350  CENTRO TUXTEPEC   68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (65, 'marta patricia diaz garcia', NULL, '9932068227', NULL, 'diaz.midnight@gmail.com', '  KM. 2 CARRETERA TUXTEPEC- VALLE NACIONAL  CONJUNTO HABITACIONAL DE CERVECERA  68365   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (66, 'miguel  perez martinez', NULL, '9932064723', NULL, 'for.snopy@outlook.com', '  INDEPENDENCIA NO 1231 A   LA PIRAGUA TUXTEPEC   68320   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (67, 'gabriel  perez gonzalez', NULL, '9932063806', NULL, 'gpgonzales@hotmail.com', '  CALLE OCAMPO NO.  COL. CENTRO TUXTEPEC  68300   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (68, 'maria esther colin maya', NULL, '9932050850', NULL, 'mardm523784@gmail.com', '   AV INDEPENDENCIA NO 1189  CENTRO  68300   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (69, 'luis  sibrian manzano', NULL, '9932011319', NULL, 'lmanzely_doll@hotmail.com', '   BOULEVARD BENITO JUAREZ ESQ. INDEPENDENCIA  LA PIRAGUA  68380   ', 'Contacto disponible para ser usado', NULL, 'Cliente', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (70, 'carmelo  quezada ochoa', NULL, '9932102100', NULL, 'ochoa54328@gmail.com', '   AV. INDEPENDENCIA NO. 608   COL.CENTRO TUXTEPEC.OAX.  68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`contacto` (`idcontacto`, `nombre`, `organizacion`, `tel`, `movil`, `correo`, `direccion`, `status`, `fecha_registro`, `tipo`, `idusuario`, `nota`, `pagina_web`, `pagina_fb`, `pagina_tw`, `correo_alterno`, `extension`, `formatted_address`, `place_id`, `lng`, `lat`) VALUES (71, 'alva luz resendiz guerrero', NULL, '9932067598', NULL, 'liz_resendiz@yahoo.com', '   INDEPENDENCIA No 1655   COL. CENTRO   68300   ', 'Contacto disponible para ser usado', NULL, 'otro', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tipo_plantilla`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (1, 'Contenido descriptivo evento', 'platilla dedicada a la descripción de eventos', '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (2, 'Contenido descriptivo permitido en el evento', NULL, '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (3, 'Restricciones', NULL, '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (4, 'politicas', NULL, '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (5, 'Contenido descriptivo escenario', NULL, '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`empresa_objetopermitido`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 1);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 2);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 3);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 4);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 5);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 6);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 7);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 8);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 9);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 10);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 11);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 12);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 13);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 14);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 15);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 16);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 17);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`punto_venta`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`punto_venta` (`idpunto_venta`, `razon_social`, `status`, `fecha_registro`, `idempresa`, `descripcion`, `zona`, `hora_inicio`, `hora_fin`, `L`, `M`, `MM`, `J`, `V`, `S`, `D`, `horario_atencion`, `sitio_web`, `formatted_address`, `place_id`, `lat`, `lng`) VALUES (1, 'Taquillas del evento', 'Disponible para todos los colaboradores de la empresa', NULL, 1, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`punto_venta` (`idpunto_venta`, `razon_social`, `status`, `fecha_registro`, `idempresa`, `descripcion`, `zona`, `hora_inicio`, `hora_fin`, `L`, `M`, `MM`, `J`, `V`, `S`, `D`, `horario_atencion`, `sitio_web`, `formatted_address`, `place_id`, `lat`, `lng`) VALUES (2, 'Patrocinadores del evento', 'Disponible para todos los colaboradores de la empresa', NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`punto_venta_usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`punto_venta_usuario` (`idpunto_venta`, `idusuario`) VALUES (1, 2);
INSERT INTO `enidserv_eniddbbbb3`.`punto_venta_usuario` (`idpunto_venta`, `idusuario`) VALUES (2, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tipo_incidencia`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (1, 'La información que muestra el sistema no concuerda con lo que debería mostrar', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (2, 'La página web  no se visualiza  en  mi dispositivo correctamente', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (3, 'El sistema es muy lento', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (4, 'El sistema muestra un mensaje de error y no puedo realizar lo que quiero', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (5, 'Mejora en el diseño de la página', NULL, 2);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (6, 'Mejora en la funcionalidad', NULL, 2);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (7, 'Mejora en la velocidad de la página', NULL, 2);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (8, 'Nueva funcionalidad', NULL, 2);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_incidencia` (`idtipo_incidencia`, `tipo_incidencia`, `fecha_registro`, `type`) VALUES (9, 'Propuesta de omisión en alguna funcionalidad', NULL, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`calificacion`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (1, 'Grave', 'No puedo realizar mis operaciones', 1);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (2, 'Prioritaria pero no grave', 'Me permite realizar mis operaciones pero es primordial que funcione', 1);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (3, 'Intermedia', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (4, 'Urgente', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (6, 'Urgente ', NULL, 2);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (7, 'Intermedia', NULL, 2);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (8, 'Otro', NULL, 1);
INSERT INTO `enidserv_eniddbbbb3`.`calificacion` (`idcalificacion`, `nombre`, `descripcion`, `tipo`) VALUES (9, 'Otro', NULL, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`estado`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (1, 'Cualquiera', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (2, 'Aguascalientes', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (3, 'Baja California', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (4, 'Baja California Sur', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (5, 'Campeche', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (6, 'Chiapas', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (7, 'Chihuahua', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (8, 'Coahuila', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (9, 'Colima', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (10, 'DF Y Zona Metro.', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (11, 'Durango', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (12, 'Edo. México', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (13, 'Guanajuato', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (14, 'Guerrero', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (15, 'Hidalgo', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (16, 'Jalisco', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (17, 'Michoacán', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (18, 'Morelos', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (19, 'Nayarit', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (20, 'Nuevo León', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (21, 'Oaxaca', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (22, 'Puebla', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (23, 'Querétaro', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (24, 'Quintana Roo', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (25, 'San Luis Potosí', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (26, 'Sinaloa', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (27, 'Sonora', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (28, 'Tabasco', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (29, 'Tamaulipas', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (30, 'Tlaxcala', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (31, 'Veracruz', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (32, 'Yucatán', 15);
INSERT INTO `enidserv_eniddbbbb3`.`estado` (`id_estado`, `estado`, `idCountry`) VALUES (33, 'Zacatecas', 15);

COMMIT;

USE `enidserv_eniddbbbb3`;

DELIMITER $$

USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`empresa_AINS` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `empresa_AINS` AFTER INSERT ON `empresa` FOR EACH ROW
INSERT INTO empresa_objetopermitido SELECT  new.idempresa , idobjetopermitido FROM objetopermitido;
$$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`escenario_BDEL` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `escenario_BDEL` BEFORE DELETE ON `escenario` FOR EACH ROW
delete from escenario_artista where escenario_artista.idescenario = idescenario;

$$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`contacto_BDEL` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `contacto_BDEL` BEFORE DELETE ON `contacto` FOR EACH ROW
BEGIN

DELETE FROM punto_venta_contacto WHERE idcontacto = old.idcontacto limit 1;

DELETE FROM empresa_contacto 
WHERE
    id_contacto = old.idcontacto limit 1;



END $$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`punto_venta_BDEL` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `punto_venta_BDEL` BEFORE DELETE ON `punto_venta` FOR EACH ROW
begin  
delete from  punto_venta_usuario WHERE punto_venta_usuario.idpunto_venta = old.idpunto_venta;
delete from punto_venta_contacto 
WHERE
    punto_venta_contacto.idpunto_venta = old.idpunto_venta; 
end
$$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`imagen_BEFORE_DELETE` $$
USE `enidserv_eniddbbbb3`$$
CREATE DEFINER = CURRENT_USER TRIGGER `enidserv_eniddbbbb3`.`imagen_BEFORE_DELETE` BEFORE DELETE ON `imagen` FOR EACH ROW
BEGIN

END
$$


DELIMITER ;



