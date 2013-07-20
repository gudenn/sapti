<?php
/**
* @author          Guyen Campero<guyencu@gmail.com>
* @version         0.13.0.02
*/
class Administrador extends Objectbase
{

 /**
  * Codigo identificador del Objeto Usuario
  * @var INT(11)
  */
  var $usuario_id;

  /**
   * Obtiene el permiso de dicho modulo para el administrador
   * @return Permiso
   */
  public function getPermiso($codigo_modulo) 
  {
    $grupo = $this->getGrupo();
    return $grupo->getPermisoModulo($codigo_modulo);
    return $grupo;
  }

  /**
   * Obtiene el grupo del administrador
   * @return Grupo
   */
  public function getGrupo() 
  {
    leerClase('Grupo');
    $usuario = $this->getUsuario();
    $grupo = new Grupo($usuario->grupo_id);
    return $grupo;    
  }

  
  /**
   * Obtiene el usuario del administrador
   * @return Grupo
   */
  public function getUsuario() 
  {
    leerClase('Usuario');
    $usuario = new Usuario($this->usuario_id);
    return $usuario;    
  }  
  
  
  
  
/**
  * get user if exist else return 0
  * @param type $login
  * @param type $clave
  * @return object 
  */
  public function issetAdmin($login, $clave) {
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


} 
