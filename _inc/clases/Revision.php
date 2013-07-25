<?php
/**
 * Esta clase es para guardar los datos tipo Revicion
 *
 * @author Sesai Quispe <sesaiquispe@gmail.com>
 */
class Revision extends Objectbase
{
 /**
  * Codigo identificador del Objeto Proyecto
  * @var INT(11)
  */
  var $proyecto_id;
   /**
  * Codigo identificador del Objeto Revisor
  * @var INT(11)
  */
  var $revisor;
  
  var $revisor_tipo;
  /**
  * Fecha de la revicion
  * @var INT(11)
  */
  var $fecha_revision;
    /**
  * Fecha de la correccion de revicion
  * @var INT(11)
  */
  var $fecha_correccion;
    /**
  * Fecha de la correccion de revicion
  * @var INT(11)
  */
  var $fecha_aprobacion;
    /**
  * Fecha de la revicion
  * @var INT(11)
  */
  var $estado_revision;
    /**
   * Validamos la revicion ya sea para actualizar o para crear una nueva
   * @param type $revision
   */
    function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);

    $filtro->nombres[] = 'Estado';
    $filtro->valores[] = array ('select','estado'  ,$filtro->filtro('estado'),
        array(''      ,'AC'         ,'NC'           ,'IN'          ,'DE'        ),
        array('Todos' ,'Confirmados','No Confirmado','Desctivado'  ,'Eliminado' ));
    $filtro->nombres[] = 'proyecto_id';
    $filtro->valores[] = array ('input' ,'proyecto_id',$filtro->filtro('proyecto_id'));
    $filtro->nombres[] = 'revisor';
    $filtro->valores[] = array ('input' ,'revisor',$filtro->filtro('revisor'));
    $filtro->nombres[] = 'fecha_observacion';
    $filtro->valores[] = array ('input' ,'fecha_revision',$filtro->filtro('fecha_revision'));

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