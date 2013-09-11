<?php

class Tribunal extends Objectbase 
{
    /**
     *
     * @var type 
     * Codigo identificador de objeto proyecto
     */
   
     var $proyecto_tribunal_id;
    
     var $docente_id;
     var $archivo;
     var $accion;

  /**
   * Retorna el nombre completo del usuario
   * @param boolean $echo si muestra o solo devuelve
   * @return boolean
   */
  function getNombreCompleto($echo = false) 
  {
    leerClase('Docente');
    if (!$this->docenteo_id)
      return false;
    $docente = new Docente($this->docente_id);
    return $docente->getNombreCompleto($echo);
  }
   
}


?>