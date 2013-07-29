SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sapti` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sapti` ;

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE  TABLE IF NOT EXISTS `usuario` (
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
-- Table `estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estudiante` ;

CREATE  TABLE IF NOT EXISTS `estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `codigo_sis` VARCHAR(20) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto` ;

CREATE  TABLE IF NOT EXISTS `proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(300) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tipo_defensa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipo_defensa` ;

CREATE  TABLE IF NOT EXISTS `tipo_defensa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_tipodefensa` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_tribunal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_tribunal` ;

CREATE  TABLE IF NOT EXISTS `proyecto_tribunal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `defensa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `defensa` ;

CREATE  TABLE IF NOT EXISTS `defensa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NOT NULL ,
  `tipo_defensa_id` INT NULL ,
  `fecha_asignacion` DATE NULL ,
  `hora_asignacion` TIME NULL ,
  `fecha_defensa` DATE NULL ,
  `hora_defensa` TIME NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `proyecto_tribunal_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `docente` ;

CREATE  TABLE IF NOT EXISTS `docente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tutor` ;

CREATE  TABLE IF NOT EXISTS `tutor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tribunal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tribunal` ;

CREATE  TABLE IF NOT EXISTS `tribunal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `proyecto_tribunal_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_estudiante` ;

CREATE  TABLE IF NOT EXISTS `proyecto_estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `estudiante_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `materia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `materia` ;

CREATE  TABLE IF NOT EXISTS `materia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `semestre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `semestre` ;

CREATE  TABLE IF NOT EXISTS `semestre` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dicta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dicta` ;

CREATE  TABLE IF NOT EXISTS `dicta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `docente_id` INT NULL ,
  `materia_id` INT NULL ,
  `semestre_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_docente` ;

CREATE  TABLE IF NOT EXISTS `proyecto_docente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `dicta_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_tutor` ;

CREATE  TABLE IF NOT EXISTS `proyecto_tutor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NULL ,
  `tutor_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `grupo` ;

CREATE  TABLE IF NOT EXISTS `grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(40) NULL ,
  `descripcion` VARCHAR(300) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pertenece`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pertenece` ;

CREATE  TABLE IF NOT EXISTS `pertenece` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `grupo_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `evaluacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `evaluacion` ;

CREATE  TABLE IF NOT EXISTS `evaluacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `evaluacion_1` INT NULL ,
  `evaluacion_2` INT NULL ,
  `evaluacion_3` INT NULL ,
  `promedio` INT NULL ,
  `rfinal` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inscrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inscrito` ;

CREATE  TABLE IF NOT EXISTS `inscrito` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `evaluacion_id` INT NULL ,
  `dicta_id` INT NULL ,
  `estudiante_id` INT NULL ,
  `semestre_id` INT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `area` ;

CREATE  TABLE IF NOT EXISTS `area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sub_area` ;

CREATE  TABLE IF NOT EXISTS `sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `area_sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `area_sub_area` ;

CREATE  TABLE IF NOT EXISTS `area_sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `sub_area_id` INT NOT NULL ,
  `area_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_sub_area` ;

CREATE  TABLE IF NOT EXISTS `proyecto_sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  `sub_area_id` INT NOT NULL ,
  `proyecto_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `especialidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `especialidad` ;

CREATE  TABLE IF NOT EXISTS `especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `docente_id` INT NOT NULL ,
  `area_id` INT NOT NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_area` ;

CREATE  TABLE IF NOT EXISTS `proyecto_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `area_id` INT NULL ,
  `proyecto_id` INT NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `administrador` ;

CREATE  TABLE IF NOT EXISTS `administrador` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `revision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `revision` ;

CREATE  TABLE IF NOT EXISTS `revision` (
  `id` INT NOT NULL ,
  `observacion` VARCHAR(150) NULL ,
  `fecha` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `perfilregistro_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `observacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `observacion` ;

CREATE  TABLE IF NOT EXISTS `observacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `revision_id` INT NOT NULL ,
  `observacion` VARCHAR(1500) NULL ,
  `estado_observacion` VARCHAR(2) NULL COMMENT 'estado 1 creado (CR), etado 2 corregido (CO), estado 4  aprobado (AP)' ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `notificacion` ;

CREATE  TABLE IF NOT EXISTS `notificacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proyecto_id` INT NOT NULL ,
  `tipo` VARCHAR(45) NULL COMMENT 'Mensaje normal, Mensaje de tiempo se acaba, y otros ' ,
  `detalle` TEXT NULL ,
  `prioridad` VARCHAR(10) NULL ,
  `estado_notificacion` VARCHAR(45) NULL COMMENT 'aca se ppondra el estado de la noticifacion si ya fue vista o no' ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notificacion_tribunal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `notificacion_tribunal` ;

CREATE  TABLE IF NOT EXISTS `notificacion_tribunal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `tribunal_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notificacion_estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `notificacion_estudiante` ;

CREATE  TABLE IF NOT EXISTS `notificacion_estudiante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `estudiante_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notificacion_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `notificacion_docente` ;

CREATE  TABLE IF NOT EXISTS `notificacion_docente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `docente_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notificacion_tutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `notificacion_tutor` ;

CREATE  TABLE IF NOT EXISTS `notificacion_tutor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `notificacion_id` INT NOT NULL ,
  `tutor_id` INT NOT NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modulo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `modulo` ;

CREATE  TABLE IF NOT EXISTS `modulo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(40) NULL ,
  `descripcion` VARCHAR(300) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `permiso` ;

CREATE  TABLE IF NOT EXISTS `permiso` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `grupo_id` INT NULL ,
  `modulo_id` INT NULL ,
  `ver` TINYINT(1) NULL ,
  `crear` TINYINT(1) NULL ,
  `editar` TINYINT(1) NULL ,
  `eliminar` TINYINT(1) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `carrera` ;

CREATE  TABLE IF NOT EXISTS `carrera` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modalidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `modalidad` ;

CREATE  TABLE IF NOT EXISTS `modalidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `institucion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `institucion` ;

CREATE  TABLE IF NOT EXISTS `institucion` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `perfilregistro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `perfilregistro` ;

CREATE  TABLE IF NOT EXISTS `perfilregistro` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `numero` INT NULL ,
  `telefono` INT NULL ,
  `trabajoconjunto` VARCHAR(2) NULL ,
  `gestionaprobacion` VARCHAR(5) NULL ,
  `cambiotema` VARCHAR(2) NULL ,
  `titulo` VARCHAR(100) NULL ,
  `objetivogeneral` VARCHAR(50) NULL ,
  `objetivoespecifico` VARCHAR(100) NULL ,
  `descripcionperfil` VARCHAR(500) NULL ,
  `formularioaprobacion` TEXT NULL ,
  `registradopor` VARCHAR(45) NULL ,
  `fecharegistro` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `proyecto_id` INT NOT NULL ,
  `sub_area_id` INT NOT NULL ,
  `carrera_id` INT NOT NULL ,
  `modalidad_id` INT NOT NULL ,
  `institucion_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `docente_id` INT NOT NULL ,
  `tutor_id` INT NOT NULL ,
  `estudiante_id` INT NOT NULL ,
  `area_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `perfilvigencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `perfilvigencia` ;

CREATE  TABLE IF NOT EXISTS `perfilvigencia` (
  `id` INT NOT NULL ,
  `fechainicio` DATE NULL ,
  `fechafin` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `perfilregistro_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `revision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `revision` ;

CREATE  TABLE IF NOT EXISTS `revision` (
  `id` INT NOT NULL ,
  `observacion` VARCHAR(150) NULL ,
  `fecha` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `perfilregistro_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario` ;

CREATE  TABLE IF NOT EXISTS `horario` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario_doc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario_doc` ;

CREATE  TABLE IF NOT EXISTS `horario_doc` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  `proyecto_id` INT NOT NULL ,
  `horario_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dias` ;

CREATE  TABLE IF NOT EXISTS `dias` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  `horario_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horas` ;

CREATE  TABLE IF NOT EXISTS `horas` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  `dias_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `sapti` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
