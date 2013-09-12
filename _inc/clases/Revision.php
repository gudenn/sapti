<?php
/**
 * Esta clase es para guardar los datos tipo Revicion
 *
 * @author Sesai Quispe <sesaiquispe@gmail.com>
 */
class Revision extends Objectbase
{
  /** constantes para los valores del estado de la revision
   * estado 1 creado (CR), estado 2 visto (VI), estado 3 respondido  (RE), estado 4 aprobado (AP)
   */
  const E1_CREADO     = "CR";
  const E2_VISTO      = "VI";
  const E3_RESPONDIDO = "RE";
  const E4_APROBADO   = "AP";
  
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
  
  /**
   * docente (DO), tutor (TU), tribunal (TR)'
   * @var VARCHAR(2)
   */
  var $revisor_tipo;

 /**
  * Fecha de la revicion
  * @var DATE
  */
  var $fecha_revision;

 /**
  * Fecha de la correccion de revicion
  * @var DATE
  */
  var $fecha_correccion;

 /**
  * Fecha de la correccion de revicion
  * @var DATE
  */
  var $fecha_aprobacion;


  /**
   * estado 1 creado (CR), estado 2 visto (VI), estado 3 respondido  (RE), estado 4 aprobado (AP)
   * @var VARCHAR(2)
   */
  var $estado_revision;

  
 /**
  * (Arreglo de objetos) Observaciones que pertenecen a una revision
  * @var object|null 
  */
  var $observacion_objs;

 
  function getRevisor($revisor_id,$tipo='DO',$gettipo = false) 
  {
    if ($tipo == '')
      return 'Desconocido';
    switch ($tipo) {
      case 'TU':
        $clase = 'Tutor';
        break;
      case 'DO':
        $clase = 'Docente';
        break;
      case 'TR':
        $clase = 'Tribunal';
        break;
      default:
        return 'Desconocido';
        return;
        break;
    }
    if ($gettipo)
    {
      return $clase;
    }
    leerClase($clase);
    $obj = new $clase($revisor_id);
    return $obj->getNombreCompleto();

  }

  function getEstadoRevision($estado_revision = '') 
  {
    $estado   = $this->estado_revision;
    if ( trim($estado_revision) != '' )
      $estado = $estado_revision;
    //estado 1 creado (CR), estado 2 visto (VI), estado 3 respondido  (RE), estado 4 aprobado (AP)
    switch ($estado) {
      case self::E1_CREADO:
        $estado = 'Nuevo';
        break;
      case self::E2_VISTO:
        $estado = 'Visto';
        break;
      case self::E3_RESPONDIDO:
        $estado = 'Respuesta';
        break;
      case self::E4_APROBADO:
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

    $filtro->nombres[] = 'Estado';
    $filtro->valores[] = array ('select','estado_revision'  ,$filtro->filtro('estado_revision'),
        array(''      ,'CR'   ,'VI'   ,'RE'          ,'AP'        ),
        //estado 1 creado (CR), estado 2 visto (VI), estado 3 respondido  (RE), estado 4 aprobado (AP)
        array('Todos' ,'Nuevo','Visto','Respondido'  ,'Aprobado' ));
    //$filtro->nombres[] = 'proyecto_id';
    //$filtro->valores[] = array ('input' ,'proyecto_id',$filtro->filtro('proyecto_id'));
    $filtro->nombres[] = 'Revisor';
    $filtro->valores[] = array ('select','revisor_tipo'  ,$filtro->filtro('revisor_tipo'),
        array(''      ,'DO'     ,'TU'   ,'IN'       ),
        array('Todos' ,'Docente','Tutor','Tribunal' ));
    $filtro->nombres[] = 'Fecha';
    $filtro->valores[] = array ('input' ,'fecha_revision',$filtro->filtro('fecha_revision'));

  }
    function getOrderString(&$filtro) 
  {
    $order_array                        = array();
    $order_array['id']                  = " {$this->getTableName ()}.id ";
    $order_array['proyecto_id']         = " {$this->getTableName ()}.proyecto_id ";
    $order_array['revisor']             = " {$this->getTableName ()}.revisor";
    $order_array['fecha_revision']      = " {$this->getTableName ()}.fecha_revision ";
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