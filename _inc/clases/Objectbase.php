<?php

/**
 *
 * Public Class:  Object
 *
 * @author          Guyen Campero<guyencu@gmail.com>
 * @version         beta.03.13
 *
 */
class Objectbase
{
  /** constant to add in the end of the key to find the son objects  */
  const TABLE_BASE = "";

  /** constant to add in the begin of the key to find the date values   */
  const FIDATE    = "fecha_";
  /** constant to para las fechas tipo fecha_cumple todas tendran el mismo comportamiento  */
  const OBJEND    = "_objs";
  /** constant to para realizar join */
  const JOINEND   = "_id";
  /** constant to the status of one table  */
  const STATUS    = "estado";
  /** constant to the status able  */
  const STATUS_AC = "AC";
  /** constant to the status able second state */
  const STATUS_SC = "SC";
  /** constant to the status unavailable */
  const STATUS_IN = "IN";
  /** constant to the status need confirmation  */
  const STATUS_NC = "NC";
  /** constant to the status deleted */
  const STATUS_DE = "DE";
  /** constant to add in the begin of the key to find the date values   */
  const HISTORIAL = "historial_objs";

 /**
  * La clave identificadora del registro
  * 
  * @var int(11) id
  * @access public
  */
  var $id;

 /**
  * El estado de la Mercancia
  * 
  * @var string(2) estado
  * @access public
  */
  var $estado;

 /**
  * (Objeto simple) Todo el historial de este objeto 
  * @var object|null 
  */
  var $historial_objs;

 /**
  * Object return the object with some id
  *
  * @param    int    $id    Id of the table
  *
  */
  public function __construct($id = '')
  {
    /**
     * Bulid the object from an array
     */
    if ( is_array($id) )
    {
      foreach($this as $key => $value)
      {
        /**  if the $key refer to an object continue */
        if ($this->isKeyObject($key))
          continue;
        if (isset($id[strtolower($key)]))
          $this->$key   = $id[strtolower($key)];
      }
      return;
    }
    
    if ('' == $id)
      return;
    $sql = "SELECT * FROM ".$this->getTableName()." WHERE ".$this->getIdlabel()." = '$id'";
    //echo $sql;
    $result = mysql_query($sql);
    if (!$result)
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



/**
 * Cuenta el total de objetos que cunplan la condicion
 * 
 * 
 * @param booleam $return si usa echo o devuelde la respuesta como un string
 * @return int 
 * @throws Exception 
 */
  public function contar($where = " estado = 'AC' " , $return = true)
  {
    $sql = "select count(".$this->getIdlabel().") from ".$this->getTableName()." where $where ";
    //echo $sql;
    $resultado = mysql_query($sql);
    $total     = mysql_fetch_array($resultado);
    if (!$return)
      echo $total[0];
    return $total[0];
  }

  /**
   * Save Or Update the data of the object in the data base
   *
   * @param string $table puede recivir el valor de la tabla
   * @param int $father_id_value el id del padre  por ejemplo al grabar los hijos de una compania aca se dara el id de la compania
   * @param string $base  asociado a $father_id_value traera la clase del padre para guardar el dato
   * @return boolean
   * @throws Exception 
   */
  public function save($table = false , $father_id_value = false , $base = 'compania')
  {
    /** preparamos las fechas para guardarlas */
    $this->datesHTS();
    //echo "saving";
    $S_values = '';
    $keys     = '';
    $values   = '';
    $update   = '';
    $where    = '';
    
    
    if ($father_id_value)
    {
      $id_father        = $this->getIdlabelBase($base);
      $this->$id_father = $father_id_value;
    }
    
    if (!$table)
      $table    = $this->getTableName();
    if ('' == trim($this->getIdValue())) //insert new object
    {
      foreach($this as $key => $value)
      {
        $key = strtolower($key);
        if ($key == $this->getIdlabel())
          continue;

        /**  if the $key refer to an object continue */
        if ($this->isKeyObject($key))
          continue;

        /**  if the $key refer to the status and is empty continue */
        if (self::STATUS == $key && '' == trim($value) )
          continue;

        /** CONCATENAMOS Todos LOS VALORES PARA NO INTRODUCIR VALORES VACIOS */
        if ($father_id_value && $value != $father_id_value )
          $S_values .= trim($value);

        if ('' == $values)
        {
          $values = "'$value'";
          $keys   = "`$key`";
        }
        else
        {
          $values .= ",'$value'";
          $keys   .= ",`$key`";
        }
      }
      if (!$father_id_value)
        $S_values = "saveme";
      /** NO INGRESAREMOS REGISTROS VACIOS */
      if ('' !=  trim ($S_values))
      {
      $sql = "INSERT INTO $table ($keys) VALUES ($values)";
      $result = mysql_query($sql);
      if (!$result)
      {
        $this->datesSTH();
        throw new Exception("?".$this->getTableName ()."&m=Cant insert the new <br />$sql<br />$table ".$this->getTableName());
        
      }
      //set the id
      $this->setIdValue(mysql_insert_id());
      }
      else 
        $sql = "Registro vacio ignorado INSERT INTO $table ($keys) VALUES ($values)";
    }
    else //update
    {
      $where = " WHERE ".$this->getIdlabel()." = '".$this->getIdValue()."' ";
      foreach($this as $key => $value)
      {
        /**  if the $key refer to an object continue */
        if ($this->isKeyObject($key))
          continue;

        /**  if the $key refer to the status and is empty continue */
        if (self::STATUS == $key && '' == trim($value) )
          continue;

        $key = strtolower($key);
        if ('' == $update)
        {
          $update = " `$key` = '$value' ";
        }
        else
        {
          $update .= ", `$key` = '$value' ";
        }
      }
      $sql = "UPDATE $table SET $update $where ";
      $result = mysql_query($sql);
      if (!$result)
      {
        $this->datesSTH();
        throw new Exception("?".$this->getTableName ()."&m=Cant update the <br />$sql<br />$table ".$this->getTableName());
      }
    }
    $this->datesSTH();
    return true;
  }

 /**
  * Vaciar las variables del Objeto
  *
  * @param
  *
  */
  public function unsetVars()
  {
    foreach($this as $key => $value)
    {
      /** if the $key refer to an object continue */
      if ($this->isKeyObject($key))
        continue;
      unset($this->$key);
    }
    return true;
  }

  /**
   * Convierte un objeto en un array
   * @return \Objectbase
   */
  function getArray ()
  {
    $esto = array();
    foreach($this as $key => $value)
    {
      /**  if the $key no refer to an object continue */
      if ($this->isKeyObject($key))
        continue;
      $esto[$key] = $value;
    }
    return $esto;
  }

 /**
  * Convertimos todas las fechas de HUMAN a SQL
  */
  public function datesHTS()
  {
    foreach($this as $key => $value)
    {
      if (!$this->isKeyDate($key))
        continue;
      $this->$key   = $this->dateHumanToSQl($this->$key);
    }
    return true;
  }

 /**
  * Convertimos todas las fechas de SQL a HUMAN
  */
  public function datesSTH()
  {
    foreach($this as $key => $value)
    {
      if (!$this->isKeyDate($key))
        continue;
      $this->$key   = $this->dateSQlToHuman($this->$key);
    }
    return true;
  }

 /**
  * Save Or Update all the objects
  *
  * @param
  *
  */
  public function saveAllSonObjects( $setTheFatherIdTotheSons = false)
  {
    foreach($this as $key => $value)
    {
      /** if the $key refer to an object continue */
      if (!$this->isKeyObject($key))
        continue;
      if (isset($this->$key))
      foreach($this->$key as $obj)
      {
        if (is_object($obj))
        {
          if ($setTheFatherIdTotheSons )
            $obj->save(false , $this->id  , get_class ($this));
          else
            $obj->save();
        }
      }
    }
    return true;
  }

  /**
  * Save Or Update all the objects
  *
  * @param string $key_to_save the key of the objecs to save
  *
  */
  public function saveThisSonObjects($key_to_save)
  {
    foreach($this as $key => $value)
    {
      if ($key != $key_to_save)
        continue;
      /** if the $key refer to an object continue */
      if (!$this->isKeyObject($key))
        continue;
      foreach($this->$key as $obj)
      {
        if (is_object($obj))
          $obj->save();
      }
    }
    return true;
  }

  /**
   * Return the name of the table of this object
   *
   * @return string
   */
   function delete()
   {
      $sql = "DELETE FROM ".$this->getTableName()." WHERE ".$this->getIdlabel()." = '".$this->getIdValue()."'  ";
      $result = mysql_query($sql);
      if (!$result)
        throw new Exception("?".$this->getTableName ()."&m=Cant delete <br />$sql<br />".$this->getTableName());
   }
   
 /**
  * delete all the objects, Se elimina a todos los objetos hijos que hacen referencia al padra
  *
  * @param
  *
  */
  public function deleteAllSonObjects()
  {
    foreach($this as $key => $value)
    {
      /** if the $key refer to an object continue */
      if (!$this->isKeyObject($key))
        continue;

      $table     = $this->getTableName($this->getClassNameOfKey($key));
      $id_label  = $this->getIdlabelBase(get_class($this) );

      
      $sql    = "DELETE FROM $table WHERE $id_label = '".$this->getIdValue()."'  ";
      //echo "$sql;";
      $result = mysql_query($sql);
      if (!$result)
        throw new Exception("?".$this->getTableName ()."&m=Cant delete son object&admin=<br />$sql<br />".$this->getTableName());
    }
    return true;
  }

  /**
  * Delete all the objects in the key_to_delete
  *
  * @param array $keys_to_delete the key of the objecs to save
  *
  */
  public function deleteThisSonObjects($keys_to_delete)
  {
    foreach($this as $key => $value)
    {
      if ($key != $key_to_delete)
        continue;
      /** if the $key refer to an object continue */
      if (!$this->isKeyObject($key))
        continue;
      foreach($this->$key as $obj)
      {
        if (is_object($obj))
          $obj->save();
      }
    }
    return true;
  }

 /**
  * Public Funcion:  getAll
  *
  * usa los atributos del acual objeto para buscar
  * 
  * TODO agregar la funcion like a esta busqueda y tambien agregar mas opciones posible poner si tiene el simbolo % buscar  con like
  * 
  * @param object $this all the fields in the objects will used as filter
  * @param string $limit the limit in the sql
  * @param string $orderby the ORDER BY sentence, in the sql
  * @param string $filter  some firlter to the sql, like: KEY LIKE "%"
  * @param bool $just_mysql  if just need myql recurse
  * @param bool $autojoin  make the joins in the sql
  *
  * @return array array(the sql result,the number of afected rows) or (null,0)
  *
  */
  function getAll ($limit = "",$orderby = "",$filter = "" , $just_mysql = false , $autojoin = false)
  {
    /** fechas a SQL */
    $this->datesHTS();    
    /** Join automatico */
    $joinfrom  = '';
    $joinwhere = '';
    $joinselect = '';
    /** Extra para las fechas */
    $extra_fechas = '';
    
    if ($orderby === "")
      $orderby = "ORDER BY {$this->getTableName()}.{$this->getIdlabel()} DESC";
    $where = "";
    foreach($this as $key => $value)
    {
      /**  if the $key refer to an object continue */
      if ($this->isKeyObject($key))
        continue;
      if ($autojoin && $this->isJoinKey($key) &&  $value != FALSE )
      {
        $joinfrom   .= $this->joinFrom($key);
        $joinwhere  .= $this->joinWhere($key);
        $joinselect .= $this->joinSelect($key);
      }
      if ('' != $value)
      {
        $COMP = ' = ';
        if (strpos($value, '%') !== FALSE)
          $COMP = ' LIKE ';
        $where .= " AND {$this->getTableName()}.".strtolower($key)." $COMP '$value' ";
      }
      /**
       * Tratamiento especial de las fechas
       * sacamos las fechas para que la genta la vea
       */
      if ($this->isKeyDate($key))
      {
        $extra_fechas .= " , DATE_FORMAT($key,'%d %b %Y') as {$key}_toshow ";
      }
    }
    if ($autojoin && trim($joinwhere) != '')
      $where = " $joinwhere $where ";
    if ( '' != $where )
      $where = " WHERE 1 $where ";

    /** fechas a HUMAN */
    $this->datesSTH();    


    $sql = "SELECT {$this->getTableName()}.* $joinselect $extra_fechas FROM {$this->getTableName()}  $joinfrom $where $joinwhere $filter $orderby $limit";
    //echo $sql;
    $result = mysql_query($sql);
    if (!$result)
      return array(false,0);
    if ($just_mysql)
      return $result;
    $num_rows = mysql_num_rows($result);
    return array($result,$num_rows);
  }

 /**
  * Public Funcion:  getAllObjects
  *
  * Build all the son objects of this object
  *
  *
  */
  function getAllObjects ($sinHistorial = true)
  {

    foreach($this as $key => $value)
    {
      /**  if the $key no refer to an object continue */
      if (!$this->isKeyObject($key))
        continue;
      if ($sinHistorial && $key == Objectbase::HISTORIAL )
        continue;
      $this->$key = $this->getThisObjects($key , get_class($this));
    }
  }


 /**
  * Public Funcion:  getThisObjects
  *
  * Build all the son objects of this object
  *
  * @param string $key the key that refers to an object
  * @param string $class_base la base que referencia al objeto principal
  * @return array array of objects
  */
  function getThisObjects ($key ,$class_base )
  {

    $class  = $this->getClassNameOfKey($key);
    $sql    = "SELECT * FROM ". $this->getTableName($class) ." WHERE ".$this->getIdlabelBase($class_base)." = '".$this->getIdValue()."' AND ".Objectbase::STATUS." = '".Objectbase::STATUS_AC."' order by id ASC ";
    //echo $sql;
    $result = mysql_query($sql);
    if (!$result)
      return false;

    leerClase($class);

    $objs = array();
    while ($array = mysql_fetch_array($result, MYSQL_ASSOC))
    {
      $obj  = new $class();
      foreach($obj as $obj_key => $obj_value)
      {
        if (isset($array[$obj_key]))
          $obj->$obj_key = $array[$obj_key];
      }
      $obj->datesSTH();
      $objs[] = $obj;
    }
    return $objs;
  }

  /**
   * Return the class name of a key
   *
   * @param string $key the value of the object key
   * @return string the class name
   */
  function getClassNameOfKey ($key)
  {
    return ucfirst(str_replace(Objectbase::OBJEND, "", $key));
  }


  /**
   *  Return if the key atribute refers to an object to make a JOIN
   * @param type $key
   * @return boolean
   */
  function isJoinKey($key) 
  {
    if (Objectbase::JOINEND == substr($key, - strlen(Objectbase::JOINEND)))
      return true;
    return false;
  }

  /**
   * Genera el FROM para el join
   * @param string $key key para testear
   * @param string $as nombre alternativo para el join 
   * @return type
   */
  function joinFrom($key , $as = false ) 
  {
    $class = substr($key, 0 , - strlen(Objectbase::JOINEND));
    $as    = ($as)?" as $as ":$as;
    return ' , '. $this->getTableName($class)." $as ";
  }

  /**
   * Genera el where para el join
   * @param string $key la llave
   * @param string $as si se esta manejando un alias
   * @param bool $ponerAndAlFinal si ponemos el And al final
   * @return string the where clause
   */
  function joinWhere($key , $as = false , $ponerAndAlFinal = false) 
  {
    $class = substr($key, 0 , - strlen(Objectbase::JOINEND));
    $as    = ($as)?" $as.":$as;
    $id = $this->getIdlabel();
    if (!$as)
      $where = " {$this->getTableName()}.$key = $class.$id ";
    else
      $where = " {$this->getTableName()}.$key = {$as}$id ";

    if ($ponerAndAlFinal)
      return " $where AND ";
    else
      return " AND $where ";
  }

  /**
   * Genera el select para el join
   * @param string $key la llave
   * @param string $as si se esta manejando un alias
   * @return string the where clause
   */
  function joinSelect($key , $as = false ) 
  {
    $class      = substr($key, 0 , - strlen(Objectbase::JOINEND));
    $classObj   = $this->getClassNameOfKey($class);
    leerClase($classObj);
    $obj        = new $classObj();
    $Idlabel    = $this->getIdlabel();
    $joinSelect = '';
    foreach ($obj as $obj_key => $value )
    {
      if ($this->isKeyObject($obj_key) )
        continue;
      if ( $obj_key != $Idlabel )
      {
        if ($as)
          $joinSelect .= " , $as.$obj_key as {$as}_{$obj_key} ";
        else
          $joinSelect .= " , $class.$obj_key as {$class}_{$obj_key} ";
      }
    }
    return $joinSelect;
  }


  /**
   * Return the name of the table of this object
   *
   * @return string
   */
  function getIdlabel ()
  {
    return 'id';
  }

 /**
   * Return the name of the table of base object
   *
   * @param type $base compania 
   * @return string generalmente sera compania_id
   */
  function getIdlabelBase($base = 'compania')
  {
    if ($base == 'Agentedecarga')
      $base = 'compania';
    return strtolower ($base .'_id');
  }


 /**
   * Return the value of the id of this object
   *
   * @return string
   */
  function getIdValue()
  {
    $id = $this->getIdlabel();
    return $this->$id;
  }
  
 /**
   * Return the value of the id of this object
   *
   * @return string
   */
  function setIdValue($value)
  {
    $id = $this->getIdlabel();
    $this->$id = $value;
    return true;
  }

  /**
   * Return if the key atribute refers to an object
   *
   * @param string $key the string with the label value
   * @return bool
   */
  function isKeyObject($key)
  {
    if (Objectbase::OBJEND == substr($key, -1 * strlen(Objectbase::OBJEND)))
      return true;
    return false;
  }


  /**
   * Return if the key atribute refers to a date
   *
   * @param string $key the string with the label value
   * @return bool
   */
  function isKeyDate($key)
  {
    if (Objectbase::FIDATE == substr($key, 0 , strlen(Objectbase::FIDATE)))
      return true;
    return false;
  }

  /**
   * Return the name of the table of an object
   *
   * @param
   * @return
   */
  function getTableName($class = '')
  {
    if (''  == $class)
      return strtolower(self::TABLE_BASE.get_class($this));
    else
      return strtolower(self::TABLE_BASE.$class);
  }

  /**
   * Return the value od the $_POST
   *
   * @param string $code the codde
   * @return
   */
  function post($code,$key)
  {
    return isset($_POST[$code])?$_POST[$code]:"";
  }

  /**
   * Get the code and the descripcion
   *
   * @param string $codigo The code of the table
   * @param string $estado estado = '".Objectbase::STATUS_AC."' 
   * @param string $table The name of the table
   */
  function getDescripcionFromTableByCode($codigo , $class , $estado = '')
  {
    $table = $this->getTableName($class);
    $sql = " SELECT * FROM $table WHERE codigo = '$codigo' ";

    //echo $sql;
    $result = mysql_query($sql);
    if (!$result)
      return false;

    $array             = mysql_fetch_array($result, MYSQL_ASSOC);
    $this->codigo      = $array["codigo"];
    $this->descripcion = $array["descripcion"];
  }
  

  /**
   * Get the atributes values form a posts
   * @param string $keys The keys to save the value in this <b>object</b>.
   * @param string $post_keys The post keys, to find the key in the POST object
   * @param string $def_values if is not set the post
   */
  function map_objs_from_post_value($class,$keys,$post_keys,$numberitems,$def_values = "")
  {
    $objs = false;
    for ($i = 1; $i <= $numberitems; $i++ )
    {
      $obj = new $class();
      $counter_key = 0;
      foreach ($post_keys as $post_key)
      {
        $def_value = (is_array($def_values) && isset($def_values[$i]))?$def_values[$i]:'';
        if (!isset($keys[$i]) || '' == trim ($keys[$i]))
        {
          $counter_key++;
          continue;
        }
        $key = $keys[$i];
        $obj->post_value($key,str_replace('#',$i,$post_key),$def_value);
        $counter_key++;
      }
      $objs[] = $obj;
    }
    return $objs;  
  }  
  
  /**
   * Get the atribute value form a post
   * @param string $key The key to save the value in this <b>object</b>.
   * @param string $post_key The post key, to find the key in the POST object
   * @param string $def_value if is not set the post
   */
  function post_value($key,$post_key,$def_value = "")
  {
    $this->$key = (isset($_POST[$post_key]))?$_POST[$post_key]:$def_value;
    $this->$key = trim($this->$key);
  }
  /**
   * Get the atribute value form a post array
   * @param string $key The key to save the value in this <b>object</b>.
   * @param string $post_key The post key, to find the key in the POST object
   * @param string $i  The post key indice, to find the key in the POST object
   * @param string $def_value if is not set the post
   */
  function post_value_array($key,$post_key,$i,$def_value = "")
  {
    $this->$key = (isset($_POST[$post_key][$i]))?$_POST[$post_key][$i]:$def_value;
    $this->$key = trim($this->$key);
  }

  /**
   * Build an <b>Object(s) Class</b> from a post or post array finding it description
   *
   * @param string $post_key The <b>POST</b> keyto find the value
   * @param string $class clas to build the object
   * @return object Type <b>$class</b>
   */
  function objectFromPost($post_key,$class)
  {
    if (is_array($post_key))
    {
      $objs = array();
      foreach ($post_key as $post_key_one)
      {
        if (!isset($_POST[$post_key_one]) || '' == trim($_POST[$post_key_one]))
          continue;
        $obj = new $class();
        $obj->getDescripcionFromCode($_POST[$post_key]);
        $objs[] = $obj;
      }
      return $objs;	
    }
    else
    {
      if (!isset($_POST[$post_key]))
        return false;
      $obj = new $class();
      $obj->getDescripcionFromCode($_POST[$post_key]);
      return $obj;
    }
  }

  /**
   * Si este objeto es simple o no 
   * @return booleam
   */
  function esObjetoEspejo()
  {
    //este No es un (Objeto espejo base) asi que
    return false;
  }

  /**
   * Sera idial para sacar valores que bienen separadas por un key adelante 
   * por ejemplo Affiliated or Members of extra
   * 
   * @param type $key
   * @param type $postkey 
   */
  function objBuidFromPostKey ( $key , $postkey = 'codigo' ,$pre = 'a_' ) 
  {
    $class =  $this->getClassNameOfKey($key);
    leerClase($class);
    
    $objs      = array();
    $counterOS = 0;
    while ( isset($_POST[$pre.$postkey]) && isset($_POST[$pre.$postkey][$counterOS]) )
    {
      $obj  = new $class();
      foreach ($obj as $key => $value )
      {
        if ( isset($_POST[$pre.$key]) && isset($_POST[$pre.$key][$counterOS]) )
          $obj->$key = $_POST[$pre.$key][$counterOS];
      }
      $objs[] = $obj;
      $counterOS++;
    }
    return $objs;
  }

  /**
   * date_modificado standar name for objects modification date
   */
  function get_date_modificado($formatout = 'M d/Y')
  {
    $table = $this->getTableName();
    $idl   = $this->getIdlabel();
    $idv   = $this->getIdValue();
    $sql = " SELECT UNIX_TIMESTAMP(date_modificado) as uts FROM $table WHERE $idl = '$idv' ";

    //echo $sql;
    $result = mysql_query($sql);
    if (!$result)
      return false;

    $array             = mysql_fetch_array($result, MYSQL_ASSOC);
    $date_modificado   = $array["uts"];
    return date($formatout,$date_modificado);
  }
   

 /**
  * Public Funcion:  objBuidFromPost crea un objeto a partir de la variable POST usando una clave 
  *
  * Build all the son objects of this object
  *
  *
  */
  function objBuidFromPost ($pre = '' , $indice = false ,$sinHistorial = true)
  {
    foreach($this as $key => $value)
    {
      /**  if the $key refer to an object continue */
      if ($this->isKeyObject($key))
      {
        if ($sinHistorial && $key == Objectbase::HISTORIAL )
          continue;
        $objs  = array();
        $class =  $this->getClassNameOfKey($key);
        leerClase($class);
        for ($i = 0; $i <= 10 ;$i++ ) 
        {
          $obj  = new $class();
          if ( !$obj->esObjetoEspejo() )
          {
            
            if ($obj->objBuidFromPost ('',$i))
            {
              $objs[] = $obj;
            }
            else
            {
              break;
            }
          }
          else // $esObjetoSimple
          {
            $class_lw  = strtolower($class);
            if ( isset($_POST[$class_lw]) && is_array($_POST[$class_lw]) ) //desde un array en el post
            {
              $counterOS = 0;
              while (isset($_POST[$class_lw]) && isset($_POST[$class_lw][$counterOS]) )
              {
                //echo " Es simple ---> $key ".$_POST[$class_lw][$counterOS]." <br> ";
                $obj    = new $class();
                $obj->getDescripcionFromCode($_POST[$class_lw][$counterOS]);
                $objs[] = $obj;
                $counterOS ++;
              }
            }
            else //No desde un string
            {
              if ('otra_asociacion_objs' == $key)
                $objs = $this->objBuidFromPostKey ($key);
              if ('nos_dedicamos_objs' == $key)
              {
                $class     =  $this->getClassNameOfKey($key);
                $class_lw  = strtolower($class);
                $obj = new $class();
                $obj->getDescripcionFromCode($_POST[$class_lw]);
                $objs[] = $obj;
              }
              if ('somos_de_objs' == $key)
              {
                $class     =  $this->getClassNameOfKey($key);
                $class_lw  = strtolower($class);
                $obj = new $class();
                $obj->getDescripcionFromCode($_POST[$class_lw]);
                $objs[] = $obj;
              }
              if ('principales_paises_objs' == $key)
              {
                $class     =  $this->getClassNameOfKey($key);
                $class_lw  = strtolower($class);
                $obj = new $class();
                $count_pp = 0;
                while ( isset($_POST[$class_lw][$count_pp]) )
                {
                  $obj->getDescripcionFromCode($_POST[$class_lw][$count_pp]);
                  $objs[] = $obj;
                  $count_pp++;
                }
              }
            }
            break;
          }
        }
        //asignamos los objetos
        $this->$key = $objs;
      }
      else
      {
        if (false !== $indice && ($key == 'id' || $key == 'compania_id' || $key == 'estado'))
          continue;
        if ( false !== $indice && !isset($_POST[$pre.$key][$indice])) // acaba el ciclo para los arrays
        {
          return false;
        }
        if (!isset($_POST[$pre.$key]))
          continue;
        if ( is_array($_POST[$pre.$key]) )
        {
          $this->post_value_array($key,$pre.$key,$indice,false);
        }
        else
          $this->post_value($key,$pre.$key,false);
        
      }
    }
    return true;
  }


  /**
   * Filtramos para la busqueda usando un objeto Filtro
   * @param Filtro $filtro el objeto filtro
   * @return boolean
   */
  public function filtrar($filtro)
  {
    foreach($this as $key => $value)
    {
      /** if the $key refer to an object continue */
      if ($this->isKeyObject($key))
        continue;
      $this->$key = $filtro->filtro($key);
    }
    return true;
  }


  function dateHumanToSQl($date , $h_format = 'DD/MM/YYYY' , $h_sep = '/' , $s_format = 'YYYY/MM/DD' , $s_sep = '-') {
    $new_date = explode(' ',$date);
    if (count($new_date) === 2)
      return Objectbase::dateHumanToSQl($new_date[0], $h_format, $h_sep, $s_format, $s_sep).' '.$new_date[1];
    if ($date == '') return '';
    if ($h_format == 'DD/MM/YYYY')
      $dateArray = explode($h_sep,$date);
    if ( $s_format == 'YYYY/MM/DD')
      $date = $dateArray[2].$s_sep.$dateArray[1].$s_sep.$dateArray[0];
    return $date;
  }

  function dateSQlToHuman($date , $h_format = 'DD/MM/YYYY' , $h_sep = '/' , $s_format = 'YYYY/MM/DD' , $s_sep = '-') {
    $new_date = explode(' ',$date);
    if (count($new_date) === 2)
      return Objectbase::dateSQlToHuman($new_date[0], $h_format, $h_sep, $s_format, $s_sep).' '.$new_date[1];
    if ($date == '') return '';
    if ($s_format == 'YYYY/MM/DD')
      $dateArray = explode($s_sep,$date);
    if ( $h_format == 'DD/MM/YYYY')
      $date = $dateArray[2].$h_sep.$dateArray[1].$h_sep.$dateArray[0];
    return $date;
  }
  
  function objs_unshift(&$objs,$more) 
  {
    if ($more)
      array_unshift($objs,$more);
  }
  
  function sanatize_WYSIWYG ($key = 'comments',$is_post = TRUE)
  {
    if (!$is_post)
      $_POST[$key] = $_GET[$key];
    //validamos los datos envidos
    $_POST[$key]  = strip_tags($_POST[$key],"<br><b><i><p><u><strike><ul><ol><li>");
    $_POST[$key]  = clean_inside_tags($_POST[$key],"<i><p><u><strike><ul><ol><li>");
    $_POST[$key]  = trim ($_POST[$key]);
    $_POST[$key]  = rtrim($_POST[$key],"<br>");
    $_POST[$key]  = trim ($_POST[$key]);
    $_POST[$key]  = str_replace('<br><br><br><br><br><br>','<br>',$_POST[$key]);
    $_POST[$key]  = str_replace('<br><br><br><br><br>','<br>'    ,$_POST[$key]);
    $_POST[$key]  = str_replace('<br><br><br><br>','<br>'        ,$_POST[$key]);
    $_POST[$key]  = str_replace('<br><br><br>','<br>'            ,$_POST[$key]);
    $_POST[$key]  = str_replace('<br><br>','<br>'                ,$_POST[$key]);
    $_POST[$key]  = str_replace('<br>','##br##'                  ,$_POST[$key]);
    $_POST[$key]  = close_dangling_tags($_POST[$key]);
    $_POST[$key]  = str_replace('##br##','<br>'                  ,$_POST[$key]);
    return $_POST[$key];
  }
  
}
