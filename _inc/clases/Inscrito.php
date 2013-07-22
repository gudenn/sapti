<?php
/**
 * Esta clase es para guardar los datos de los estudiantes inscritos en una materia
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Inscrito extends Objectbase 
{
 /**
  * Codigo identificador de la evaluacion
  * @var INT(11)
  */
  var $evaluacion_id;
  
 /**
  * Codigo identificador del Objeto Dicta
  * @var INT(11)
  */
  var $dicta_id;

 /**
  * Codigo identificador del Objeto Estudiante
  * @var INT(11)
  */
  var $estudiante_id;
  
 /**
  * Codigo identificador del Objeto Semestre
  * @var INT(11)
  */
  var $semestre_id;
  
  
}
?>