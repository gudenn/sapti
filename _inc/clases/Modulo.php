<?php
/**
* @author          Guyen Campero<guyencu@gmail.com>
* @version         0.13.07.17
*/
class Modulo extends Objectbase
{

 /**
  * Codigo del modulo
  * @var VARCHAR(40)
  */
  var $codigo;

 /**
  * Descripcion del modulo
  * @var VARCHAR(300)
  */
  var $descripcion;

  /**
   * Sobrecarga de la funcion para llamar al objeto a travez del codigo
   * @param type $id id del modulo
   * @param type $codigo codigo del modilo
   * @return boolean
   */
  function __construct($id = '',$codigo = false) {
    if ($codigo)
    {
      $sql = "SELECT * FROM ".$this->getTableName()." WHERE codigo = '$codigo'";
      //echo $sql;
      $result = mysql_query($sql);
      if (!$result)
        return false;
      // si no se encuentra el modulo se lo crea
      if (mysql_num_rows($result) == 0)
        $this->crear($codigo);
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
   * Funcion auxiliar para armar elobjeto a travez del codigo
   * @param type $codigo codigo del modulo
   * @return type
   */
  function getByCodigo($codigo)
  {
    return $this->__construct('',$codigo);    
  }

  /**
   * Creamos un nuevo modulo
   * @param type $codigo
   */  
  function crear($codigo)
  {
    $this->codigo      = $codigo;
    $this->descripcion = "Modulo: $codigo creado automaticamente por el sistema";
    $this->estado      = Objectbase::STATUS_AC;
    $this->save();
    $this->iniciarPermisos();
    
  }
  
  function iniciarPermisos($grupo_id = false)
  {
    echo "<br>iniciandoPermisos<br>";
    leerClase('Permiso');
    $permiso = new Permiso();
    if (!$grupo_id)
    {
      $permiso->ver       = Permiso::SI;
      $permiso->crear     = Permiso::SI;
      $permiso->editar    = Permiso::SI;
      $permiso->eliminar  = Permiso::SI;
      $permiso->grupo_id  = Grupo::SUPERADMINGRUOP;
    }
    else
    {
      $permiso->ver       = Permiso::NO;
      $permiso->crear     = Permiso::NO;
      $permiso->editar    = Permiso::NO;
      $permiso->eliminar  = Permiso::NO;
      $permiso->grupo_id  = $grupo_id;
      
    }
    $permiso->modulo_id = $this->id;
    $permiso->estado    = Objectbase::STATUS_AC;
    $permiso->save();
  }

} 
