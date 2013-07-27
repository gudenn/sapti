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
  `nombre` VARCHAR(300) NULL ,
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
-- Table `sapti`.`materia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`materia` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`materia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`semestre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`semestre` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`semestre` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NULL ,
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
  `semestre_id` INT NULL ,
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
  `dicta_id` INT NULL ,
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
  `codigo` VARCHAR(40) NULL ,
  `descripcion` VARCHAR(300) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
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
-- Table `sapti`.`evaluacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`evaluacion` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`evaluacion` (
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
-- Table `sapti`.`inscrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`inscrito` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`inscrito` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `evaluacion_id` INT NULL ,
  `dicta_id` INT NULL ,
  `estudiante_id` INT NULL ,
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
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL COMMENT 'Activo sera AC, No activo NC, Eliminado DE' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`sub_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`sub_area` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`sub_area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
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
  `id` INT NOT NULL AUTO_INCREMENT ,
  `area_id` INT NULL ,
  `proyecto_id` INT NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`administrador` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`administrador` (
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
  `id` INT NOT NULL ,
  `observacion` VARCHAR(150) NULL ,
  `fecha` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `perfilregistro_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`observacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`observacion` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`observacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `revision_id` INT NOT NULL ,
  `observacion` VARCHAR(1500) NULL ,
  `estado_observacion` VARCHAR(2) NULL COMMENT 'estado 1 creado (CR), etado 2 corregido (CO), estado 4  aprobado (AP)' ,
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
  `detalle` TEXT NULL ,
  `prioridad` VARCHAR(10) NULL ,
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


-- -----------------------------------------------------
-- Table `sapti`.`modulo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`modulo` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`modulo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(40) NULL ,
  `descripcion` VARCHAR(300) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`permiso` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`permiso` (
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
-- Table `sapti`.`carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`carrera` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`carrera` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`modalidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`modalidad` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`modalidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`institucion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`institucion` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`institucion` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`perfilregistro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`perfilregistro` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`perfilregistro` (
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
-- Table `sapti`.`perfilvigencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`perfilvigencia` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`perfilvigencia` (
  `id` INT NOT NULL ,
  `fechainicio` DATE NULL ,
  `fechafin` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `perfilregistro_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`revision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`revision` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`revision` (
  `id` INT NOT NULL ,
  `observacion` VARCHAR(150) NULL ,
  `fecha` DATE NULL ,
  `estado` VARCHAR(2) NULL ,
  `perfilregistro_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`horario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`horario` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`horario` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`horario_doc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`horario_doc` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`horario_doc` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  `proyecto_id` INT NOT NULL ,
  `horario_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`dias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`dias` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`dias` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `estado` VARCHAR(2) NULL ,
  `horario_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sapti`.`horas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sapti`.`horas` ;

CREATE  TABLE IF NOT EXISTS `sapti`.`horas` (
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
