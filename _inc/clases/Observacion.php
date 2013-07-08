<?php
/**
 * Esta clase es para guardar los datos tipo Revicion
 *
 * @author Sesai Quispe <sesaiquispe@gmail.com>
 */
class Observacion extends Objectbase
{
 /**
  * Codigo identificador del Objeto Proyecto
  * @var INT(11)
  */
  var $revision_id;

   /**
  * Texto de observacin de la revision
  * @var VARCHAR(500)
  */
  var $observacion;
  function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);
    Usuario::iniciarFiltro($filtro);
    $filtro->nombres[] = 'Observacion';
    $filtro->valores[] = array ('input' ,'observacion',$filtro->filtro('observacion'));
  }
}
?>