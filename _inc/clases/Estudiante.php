<?php
/**
 * Esta clase es para guardar los datos tipo Estudiante
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Estudiante extends Objectbase 
{
 /**
  * Nombre del estudiante
  * @var VARCHAR(100)
  */
  var $nombre;

 /**
  * Apellido paterno del estudiante
  * @var VARCHAR(100)
  */
  var $apellido_paterno;

 /**
  * Apellido materno del estudiante
  * @var VARCHAR(100)
  */
  var $apellido_materno;

 /**
  * Codigo sis del estudiante
  * @var VARCHAR(100)
  */
  var $codigo_sis;

 /**
  * Cumpleanios del estudiante
  * @var DATE
  */
  var $fecha_cumple;

}

?>