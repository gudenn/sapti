<?php
/**
* @author          Guyen Campero<guyencu@gmail.com>
* @version         0.13.07.17
*/
class Permiso extends Objectbase
{
  /** Constante para dar permiso */
  const SI    = "1";
  /** Constante para negar permiso */
  const NO    = "0";
  
  
 /**
  * Codigo del modulo
  * @var INT
  */
  var $modulo_id;

 /**
  * Codigo del grupo
  * @var INT
  */
  var $grupo_id;

 /**
  * puede ver
  * @var TINYINT(1) Bool
  */
  var $ver;

 /**
  * puede crear
  * @var TINYINT(1) Bool
  */
  var $crear;

 /**
  * puede editar
  * @var TINYINT(1) Bool
  */
  var $editar;

 /**
  * puede eliminar
  * @var TINYINT(1) Bool
  */
  var $eliminar;

  /**
   * Sobrecarga de la funcion para llamar al objeto a travez del $modulo_codigo y el grupo
   * @param type $id
   * @param type $modulo_id id del modulo
   * @param type $grupo_id id del grupo
   * @return boolean
   */
  function __construct($id = '',$modulo_id = false , $grupo_id = false) {
    if ($modulo_id && $grupo_id)
    {
      $sql = "SELECT * FROM ".$this->getTableName()." WHERE modulo_id = '$modulo_id' AND grupo_id = '$grupo_id' ";
      //echo $sql;
      $result = mysql_query($sql);
      if (!$result)
        return false;
      if (mysql_num_rows($result) == 0)
        return false;
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      foreach($this as $key => $value)
      {
        /**  if the $key refer to an object continue */
        if ($this->isKeyObject($key))
          continue;
        if (isset($row[strtolower($key)]))
          $this->$key   = $row[strtolower($key)];
      }
      /** solo para los leidos desde la base de datos */
      $this->datesSTH();
    }
    else
      parent::__construct($id);
  }

  
  
  
  /**
   * Inicia el filtro para el admin
   * @param Filtro $filtro el fitro que se usara en el admin
   */
  function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);

    $filtro->nombres[] = 'Modulo';
    $filtro->valores[] = array ('input' ,'modulo_codigo',$filtro->filtro('modulo_codigo'));
    $filtro->nombres[] = 'Descripcion';
    $filtro->valores[] = array ('input' ,'modulo_descripcion',$filtro->filtro('modulo_descripcion'));
  }

  /**
   * Devuelve el order para el SQL
   * @param array $order_array arreglo con las claves para el order
   * @return string
   */
  function getOrderString(&$filtro) 
  {
    $order_array                        = array();
    $order_array['id']                  = " {$this->getTableName ()}.id ";
    $order_array['nombre']              = " {$this->getTableName ()}.codigo ";
    $order_array['apellidos']           = " {$this->getTableName ()}.descripcion ";
    $order_array['estado']              = " {$this->getTableName ()}.estado ";
    return $filtro->getOrderString($order_array);
  }

  /**
   * Filtramos para la busqueda usando un objeto Filtro
   * @param Filtro $filtro el objeto filtro
   * @return boolean
   */
  public function filtrar(&$filtro)
  {
    parent::filtrar($filtro);
    $filtro_sql = '';
    return $filtro_sql;
  }  
} 
