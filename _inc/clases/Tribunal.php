<?php
/**
 * Esta clase es para guardar los datos tipo Tribunal serafin
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Tribunal extends Objectbase 
{
    /**
     *
     * @var type 
     * Codigo identificador de objeto proyecto
     */
    var $proyecto_id;
    
 /**
  * Nombre de asignacion de tribunal
  * @var INT(11)
  */
    
    var $nombre_tribunal;
    /**
     *
     * @var type date fecha de asignacion de los tribunales
     */
    var $fecha_asignacion;
    /**
     *
     * @var type time hora de asignacion de los tribunales
     */
    var $hora_asignacion;
    /**
     *
     * @var type var char (500)
     * una pequeña descripcion de la asignacion de los tribunales
     */
    var $descripcion_asignacion;
  
  
     

}


?>