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
    //Usuario::iniciarFiltro($filtro);
    $filtro->nombres[] = 'Fecha';
    $filtro->valores[] = array ('input' ,'fecha',$filtro->filtro('fecha'));
    $filtro->nombres[] = 'Observacion';
    $filtro->valores[] = array ('input' ,'observacion',$filtro->filtro('observacion'));
  }
  

  function getOrderString(&$filtro) 
  {
    $order_array                        = array();
    $order_array['id']                  = " {$this->getTableName ()}.id ";
    $order_array['proyecto_id']         = " {$this->getTableName ()}.proyecto_id ";
    $order_array['revisor']             = " {$this->getTableName ()}.revisor";
    $order_array['fecha_revision']        = " {$this->getTableName ()}.fecha_revision ";
    $order_array['estado']              = " {$this->getTableName ()}.estado ";
    return $filtro->getOrderString($order_array);
  }
  public function filtrar(&$filtro)
  {
    parent::filtrar($filtro);
    $filtro_sql = '';
    return $filtro_sql;
  }
}
?>