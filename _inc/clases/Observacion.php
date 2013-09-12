<?php
/**
 * Esta clase es para guardar los datos tipo Revicion
 *
 * @author Sesai Quispe <sesaiquispe@gmail.com>
 */
class Observacion extends Objectbase
{
  
  /** constantes para los valores del estado de la observacion  */
  const E1_CREADO    = "CR";
  const E2_CORREGIDO = "CO";
  const E3_APROBADO  = "AP";

 /**
  * Codigo identificador del Objeto Proyecto
  * @var INT(11)
  */
  var $revision_id;

 /**
  * Texto de observacin de la revision
  * @var VARCHAR(1500)
  */
  var $observacion;

 /**
  * Respuesta que dara el estudiante a una observacion
  * @var VARCHAR(1500)
  */
  var $respuesta;

 /**
  * estado 1 creado (CR), etado 2 corregido (CO), estado 3  aprobado (AP)' ,
  * @var VARCHAR(2)
  */
  var $estado_observacion;

  function getEstadoObservacion($estado_observacion = '') 
  {
    $estado   = $this->estado_observacion;
    if ( trim($estado_observacion) != '' )
      $estado = $estado_observacion;
    //estado 1 creado (CR), estado 2 visto por el tutor (VI), estado 3 aprobado por el tutor (AP)
    switch ($estado) {
      case self::E1_CREADO:
        $estado = 'Nuevo';
        break;
      case self::E2_CORREGIDO:
        $estado = 'Corregido';
        break;
      case self::E3_APROBADO:
        $estado = 'Aprobado';
        break;
      default:
        $estado = 'Nuevo';
        break;
        break;
    }
    return $estado;
  }

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