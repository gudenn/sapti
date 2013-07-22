<?php
/**
 * Esta clase es para guardar los datos tipo Dicta que relaciona
 * a un docente que dicata una materia en un semestra
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Dicta extends Objectbase 
{
 /**
  * Codigo identificador del Objeto Docente
  * @var INT(11)
  */
  var $docente_id;
  
 /**
  * Codigo identificador del Objeto Materia
  * @var INT(11)
  */
  var $materia_id;
  
 /**
  * Codigo identificador del Objeto Semestre
  * @var INT(11)
  */
  var $semestre_id;
  
  
  
  
}
?>