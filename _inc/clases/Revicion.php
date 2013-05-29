<?php
/**
 * Esta clase es para guardar los datos tipo Revicion
 *
 * @author Sesai Quispe <sesaiquispe@gmail.com>
 */
class Revicion extends Objectbase 
{
 /**
  * Codigo identificador del Objeto Revicion
  * @var INT(11)
  */
  var $revicion_id;
   /**
  * Codigo identificador del Objeto Revisor
  * @var INT(11)
  */
  var $revisor_id;
   /**
  * Texto de observacin de la revicion
  * @var VARCHAR(500)
  */
  var $ovservacion; 
   /**
  * Nota de la evaluacion realisada
  * @var INT(11)
  */
  var $evaluacion;
  /**
  * Fecha de la revicion
  * @var INT(11)
  */
  var $fecha_revicion;
}
?>