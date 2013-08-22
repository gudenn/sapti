<?php
/**
 * Esta clase es para guardar los datos tipo Tutor
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Tutor extends Objectbase 
{
 /**
  * Codigo identificador del Objeto Usuario
  * @var INT(11)
  */
  var $usuario_id;
  
  /**
   * Retorna el nombre completo del usuario
   * @param boolean $echo si muestra o solo devuelve
   * @return boolean
   */
  function getNombreCompleto($echo = false) 
  {
    leerClase('Usuario');
    if (!$this->usuario_id)
      return false;
    $usuario = new Usuario($this->usuario_id);
    return $usuario->getNombreCompleto($echo);
  }
}

?>