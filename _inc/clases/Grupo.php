<?php
/**
* @author          Guyen Campero<guyencu@gmail.com>
* @version         0.13.07.17
*/
class Grupo extends Objectbase
{
  /** Constante para indicar cual es el grupo del superadministrador del sistema  */
  const SUPERADMINGRUOP  = "1";
  
 /**
  * Nombre del grupo
  * @var VARCHAR(40) 
  */
  var $codigo;

 /**
  * nombre de la Ciudad
  * @var VARCHAR(150) 
  */
  var $descripcion;

 /**
  * (Objeto simple) Todos los permisos que tiene
  * @var object|null 
  */
  var $permiso_objs;


  /**
   * obtiene los permisos por modulo
   * @param type $codigo_modulo codigo del modulo
   * @return Permiso
   */
  function getPermisoModulo($codigo_modulo)
  {
    leerClase('Modulo');
    leerClase('Permiso');
    $modulo  = new Modulo('',$codigo_modulo);
    $permiso = new Permiso('',$modulo->id,$this->id);
    return $permiso;    
  }
  
  /**
   * Creamos todos los permisos para todos los modulos que no tengan permisos
   */
  function verificaTodosPermisos  ()
  {
    leerClase('Modulo');
    leerClase('Permiso');
    $modulos       = new Modulo();
    $mysql_modulos = $modulos->getAll();
    $modulos_x     = array();
    while (isset($mysql_modulos[0]) && $mysql_modulos[0] && $row = mysql_fetch_array($mysql_modulos[0]))
      $modulos_x[] = new Modulo($row);

    $grupos       = new Grupo();
    $mysql_grupos =  $grupos->getAll();
    
    while (isset($mysql_grupos[0]) && $mysql_grupos[0] && $row = mysql_fetch_array($mysql_grupos[0]))
    {
      $grupo_x = new Grupo($row);
      foreach ($modulos_x as $modulo_x)
      {
        $permiso = new Permiso('',$modulo_x->id,$grupo_x->id);
        if (!isset($permiso->id) || !$permiso->id)
          $modulo_x->iniciarPermisos($grupo_x->id);
      }      
    }
  }

  
  
  /**
   * Inicia el filtro para el admin
   * @param Filtro $filtro el fitro que se usara en el admin
   */
  function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);

    $filtro->nombres[] = 'Estado';
    $filtro->valores[] = array ('select','estado'  ,$filtro->filtro('estado'),
        array(''      ,'AC'         ,'NC'           ,'DE'        ),
        array('Todos' ,'Activo'     ,'No Activo'    ,'Eliminado' ));
    $filtro->nombres[] = 'Codigo';
    $filtro->valores[] = array ('input' ,'codigo',$filtro->filtro('codigo'));
    $filtro->nombres[] = 'Descripcion';
    $filtro->valores[] = array ('input' ,'descripcion',$filtro->filtro('descripcion'));
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
