SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sapti` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sapti` ;

-- -----------------------------------------------------
-- Table `sapti`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NULL ,
  `apellidos` VARCHAR(100) NULL ,
  `email` VARCHAR(100) NULL ,
  `fecha_cumple` DATE NULL ,
  `login` VARCHAR(45) NULL ,
  `clave` VARCHAR(45) NULL COMMENT 'La clave del usuario minimo 5 digitos' ,
  `ci` VARCHAR(45) NULL ,
  `sexo` VARCHAR(2) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`rol` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`rol` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`privilegio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`privilegio` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`privilegio` (
  `id_privilegios` INT NOT NULL AUTO_INCREMENT ,
  `rol_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id_privilegios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`estudiante` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `codigo_sis` VARCHAR(20) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado_proyecto_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`tipo_defensa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`tipo_defensa` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`tipo_defensa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_tipodefensa` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`defensa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`defensa` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`defensa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NOT NULL ,
  `tipo_defensa_id` INT NULL ,
  `fecha_asignacion` DATE NULL ,
  `hora_asignacion` TIME NULL ,
  `fecha_defensa` DATE NULL ,
  `hora_defensa` TIME NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`docente` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`docente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`tutor` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`tutor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`tribunal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`tribunal` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`tribunal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `defensa_id` INT NULL ,
  `usuario_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto_estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto_estudiante` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto_estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `estudiante_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto_docente` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto_docente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `docente_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto_tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto_tutor` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto_tutor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `tutor_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`grupo` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`tiene`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`tiene` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`tiene` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `grupo_id` INT NOT NULL ,
  `privilegios_id_privilegios` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`pertenece`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`pertenece` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`pertenece` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `grupo_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`materia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`materia` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`materia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`dicta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`dicta` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`dicta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `docente_id` INT NULL ,
  `materia_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`inscrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`inscrito` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`inscrito` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `materia_id` INT NULL ,
  `estudiante_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`semestre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`semestre` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`semestre` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`semestre_materia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`semestre_materia` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`semestre_materia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `materia_id` INT NULL ,
  `semestre_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`area` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`sub_area` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`area_sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`area_sub_area` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`area_sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `sub_area_id` INT NOT NULL ,
  `area_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto_sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto_sub_area` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto_sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `sub_area_id` INT NOT NULL ,
  `proyecto_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`especialidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`especialidad` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `sub_area_id` INT NOT NULL ,
  `docente_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto_tribunal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto_tribunal` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto_tribunal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `tribunal_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`proyecto_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`proyecto_area` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`proyecto_area` (
  `id` INT NOT NULL ,
  `area_id` INT NULL ,
  `proyecto_id` INT NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`admin` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`revision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`revision` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`revision` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `revisor` INT NULL ,
  `fecha_observacion` DATE NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`observacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`observacion` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`observacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `revision_id` INT NOT NULL ,
  `observacion` VARCHAR(200) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`notificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`notificacion` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`notificacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NOT NULL ,
  `tipo` VARCHAR(45) NULL COMMENT 'Mensaje normal, Mensaje de tiempo se acaba, y otros ' ,
  `detalle` VARCHAR(45) NULL ,
  `prioridad` VARCHAR(45) NULL ,
  `estado_notificacion` VARCHAR(45) NULL COMMENT 'aca se ppondra el estado de la noticifacion si ya fue vista o no' ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`notificacion_tribunal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`notificacion_tribunal` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`notificacion_tribunal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `tribunal_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`notificacion_estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`notificacion_estudiante` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`notificacion_estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `estudiante_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`notificacion_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`notificacion_docente` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`notificacion_docente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `docente_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`notificacion_tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`notificacion_tutor` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`notificacion_tutor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `tutor_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `sapti` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
