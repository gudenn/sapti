<?php
/**
 * Esta clase es para guardar los avances hechos por el estudiante
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Avance extends Objectbase
{
  /** constant to add in the begin of the key to find the date values   */
  const BASEDIRECTORIO = "avance";

  /** constantes para los valores del estado de la avance
   * estado 1 creado (CR), estado 2 visto por el tutor (VI), estado 3 aprobado por el tutor (AP)
   */
  const E1_CREADO     = "CR";
  const E2_VISTO      = "VI";
  const E3_APROBADO   = "AP";
  
  
 /**
  * Codigo identificador del Objeto Proyecto
  * @var INT(11)
  */
  var $proyecto_id;

 /**
  * Codigo identificador del Objeto Revision si es que pertenece a una revision
  * @var INT(11)
  */
  var $revision_id;

 /**
  * Fecha de registro de avance
  * @var DATE
  */
  var $fecha_avance;

 /**
  * Direcotio donde seran guardados los archivos
  * @var VARCHAR(45)
  */
  var $directorio;

 /**
  * Detalle de avance
  * @var TEXT
  */
  var $descripcion;

 /**
  * Estado de avance con respecto de
  * estado 1 creado (CR), estado 2 visto por el tutor (VI), estado 3 aprobado por el tutor (AP)
  * @var TEXT
  */
  var $estado_avance;

  
  
  function asignarDirectorio() 
  {
    if (!$this->directorio)
      $this->directorio = Avance::BASEDIRECTORIO.time();
    $_SESSION['avancedirectorio'] = $this->directorio;
    return;
  }


  function getEstadoAvance($estado_avance = '') 
  {
    $estado   = $this->estado_avance;
    if ( trim($estado_avance) != '' )
      $estado = $estado_avance;
    //estado 1 creado (CR), estado 2 visto por el tutor (VI), estado 3 aprobado por el tutor (AP)
    switch ($estado) {
      case self::E1_CREADO:
        $estado = 'Nuevo';
        break;
      case self::E2_VISTO:
        $estado = 'Revisando';
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

  function getDescripcion($descripcion = '')
  {
    $resumen   = $this->descripcion;
    if ( trim($descripcion) != '' )
      $resumen = $descripcion;
    $resumen   = htmlspecialchars_decode( $resumen );
    return $resumen;
  }

  function getResumen($descripcion = '' , $length = '70') 
  {
    $resumen   = $this->descripcion;
    if ( trim($descripcion) != '' )
      $resumen = $descripcion;
    $resumen   = cortar( trim( strip_tags( htmlspecialchars_decode( $resumen ) ) ) , $length);
    return $resumen;
  }


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
    $order_array['fecha_avance']        = " {$this->getTableName ()}.fecha_avance ";
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