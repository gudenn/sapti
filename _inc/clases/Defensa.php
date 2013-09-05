<?php

class Defensa extends Objectbase 
{
 /**
  * Nombre del Proyecto
  * @var VARCHAR(100)
  */
  var $fecha_asignacion;

 /**
  * El tipo de defensa
  * @var VARCHAR(100)
  */
  var $hora_asignacion;

 /**
  * Fecha de asignacion
  * @var VARCHAR(100)
  */
  var $fecha_defensa;

 /**
  * Hora de asignacion
  * @var VARCHAR(100)
  */
  var $hora_inicio;

 /**
  * Fecha defensa
  * @var DATE
  */
  var $hora_final;
  
  /**
   *
   * Hora defensa
   */
  var $tipo_defensa_id;
  var $proyecto_tribunal_id;
  var $lugar_id;

}

?>
