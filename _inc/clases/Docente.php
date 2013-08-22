<?php
/**
 * Esta clase es para guardar los datos tipo Docente
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Docente extends Objectbase 
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
  
  public function issetDocente($login, $clave) {
    if ($login == "" || $clave == "")
      return false;
    $activo = Objectbase::STATUS_AC;
    $sql  = "select * from ".$this->getTableName()." as a , ".$this->getTableName('usuario')." as u   where u.login = '$login' and u.clave = '$clave' and a.usuario_id = u.id and u.estado = '$activo' and a.estado = '$activo'  ";
    //echo $sql; 
    $resultado = mysql_query($sql);
    if (!$resultado)
      return false;
    $user = mysql_fetch_object($resultado);
    return $user;
  }

  function getOrderString(&$filtro) 
  {
    $order_array                        = array();
    $order_array['codigo_sis']              = " {$this->getTableName ()}.codigo_sis ";

    $order_array['id']                  = " {$this->getTableName ('Usuario')}.id ";
    $order_array['nombre']              = " {$this->getTableName ('Usuario')}.nombre ";
    $order_array['apellidos']           = " {$this->getTableName ('Usuario')}.apellidos ";
    $order_array['login']               = " {$this->getTableName ('Usuario')}.login ";
    $order_array['email']               = " {$this->getTableName ('Usuario')}.email ";
    $order_array['estado']              = " {$this->getTableName ('Usuario')}.estado ";
    return $filtro->getOrderString($order_array);
  }
  
  function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);
    $usuario = new Usuario();
    $usuario->iniciarFiltro($filtro);
    $filtro->nombres[] = 'Codigo Sis';
    $filtro->valores[] = array ('input' ,'codigo_sis',$filtro->filtro('nombre'));
  }
    public function filtrar(&$filtro)
  {
    parent::filtrar($filtro);
    $filtro_sql = '';
    if ($filtro->filtro('email'))
      $filtro_sql .= " AND {$this->getTableName ('usuario')}.email like '%{$filtro->filtro('email')}%' ";
    if ($filtro->filtro('login'))
      $filtro_sql .= " AND {$this->getTableName ('usuario')}.login like '%{$filtro->filtro('login')}%' ";
    if ($filtro->filtro('nombre'))
      $filtro_sql .= " AND {$this->getTableName ('usuario')}.nombre like '%{$filtro->filtro('nombre')}%' ";
    if ($filtro->filtro('apellidos'))
      $filtro_sql .= " AND {$this->getTableName ('usuario')}.apellidos like '%{$filtro->filtro('apellidos')}%' ";
    return $filtro_sql;
  }
  
   function getUsuario() 
  {
    if (!isset($this->usuario_id) || !$this->usuario_id)
      return false;
    $usuario = new Usuario($this->usuario_id);
    return $usuario;
  }
  
  
}
?>