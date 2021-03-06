<?php

/**
 * Esta clase es para guardar los datos tipo Estudiante
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Estudiante extends Objectbase {

  /** constant to add in the begin of the key to find the date values   */
  const URL                  = "estudiante/";
  /** constant to add in the begin of the key to find the date values   */
  const ARCHIVO_PATH         = "estudiante/proyecto-final";

  /**
   * Codigo identificador del Objeto Usuario
   * @var INT(11)
   */
  var $usuario_id;

  /**
   * Codigo sis del estudiante
   * @var VARCHAR(100)
   */
  var $codigo_sis;

  /**
   * Constructor del estudiante
   * @param type $id id de la tabla
   * @param type $codigo_sis codigo sis del estudiante
   * @return estudiante`|false
   */
  public function __construct($id = '', $codigo_sis = false) {
    if ($codigo_sis) {
      $sql = "SELECT * FROM " . $this->getTableName() . " WHERE codigo_sis = '$codigo_sis'";
      //echo $sql;
      $result = mysql_query($sql);
      if (!$result)
        return false;
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      foreach ($this as $key => $value) {
        /**  if the $key refer to an object continue */
        if ($this->isKeyObject($key))
          continue;
        if (isset($row[strtolower($key)]))
          $this->$key = $row[strtolower($key)];
      }
      /** solo para los leidos desde la base de datos */
      $this->datesSTH();
    }
    else
      parent::__construct($id);
  }

  /**
   * Crear un estudiante a partir de su codigo sis o verificar que se puede usar un nuevo estudiante
   * 
   * @param string $codigo_sis el codigo_sis
   * @param type $verSiEstaDisponible para solo verificar si es que se puede usar este email
   * @return boolean
   * @throws Exception 
   */
  public function getByCodigoSis($codigo_sis, $verSifueTomado = false) {
    $sql = "select * from " . $this->getTableName() . " where codigo_sis = '$codigo_sis'";
    $result = mysql_query($sql);
    if ($result === false)
      throw new Exception("?" . $this->getTableName() . "&m=Cant getByEmail <br />$sql<br /> " . $this->getTableName() . ' -> ' . mysql_error());

    if ($verSifueTomado) {
      if (mysql_num_rows($result))
        throw new Exception("?codigo_sis&m=Este Codigo SIS ya esta en Uso.");
      return;
    }

    $estudiante = mysql_fetch_array($result, MYSQL_BOTH);
    self::__construct($estudiante['id']);
    return true;
  }

  /**
   * get user if exist else return 0
   * @param type $login
   * @param type $clave
   * @return object 
   */
  public function issetEstudiante($login, $clave) {
    if ($login == "" || $clave == "")
      return false;
    $activo = Objectbase::STATUS_AC;
    $sql = "select * , a.id as estudiante_id from " . $this->getTableName() . " as a , " . $this->getTableName('usuario') . " as u   where u.login = '$login' and u.clave = '$clave' and a.usuario_id = u.id and u.estado = '$activo' and a.estado = '$activo'  ";
    //echo $sql; 
    $resultado = mysql_query($sql);
    if (!$resultado)
      return false;
    $user = mysql_fetch_object($resultado);
    return $user;
  }

  /**
   * Obtiene el proyecto del estudiante
   * @return boolean|Proyecto si no encuentra su proyecto retorna false
   * @todo verificar que el proyecto sea el actual
   */
  function getProyecto() {
    //@TODO revisar
    leerClase('Proyecto');
    $activo = Objectbase::STATUS_AC;
    // $sql = "select p.* from ".$this->getTableName('Proyecto_estudiante')." as pe , ".$this->getTableName('Proyecto')." as p   where pe.estudiante_id = '$this->id' and pe.proyecto_id = p.id and pe.estado = '$activo' and p.estado = '$activo'  ";

    $sql = "select p.* from " . $this->getTableName('Proyecto_estudiante') . " as pe , " . $this->getTableName('Proyecto') . " as p   where pe.estudiante_id = '$this->id' and pe.proyecto_id = p.id and pe.estado = '$activo' and p.estado = '$activo'  ";

    $resultado = mysql_query($sql);
    if (!$resultado)
      return false;
    if (!mysql_num_rows($resultado))
      return new Proyecto();
    $proyecto_array = mysql_fetch_array($resultado);
    $proyecto       = new Proyecto($proyecto_array);
    return $proyecto;
  }

  /**
   * Get usuario de un estudiante
   * @TODO hay que arreglar esta funcion
   * @return boolean|\Usuario
   * retorna los datos de un usuario asociado a un estudiante
   */
  function getUsuario() {
    if (!isset($this->usuario_id) || !$this->usuario_id)
      return false;
    $usuario = new Usuario($this->usuario_id);
    return $usuario;
  }

  /**
   * Validamos al usuario ya sea para actualizar o para crear uno nuevo
   * @param type $es_nuevo
   */
  function validar($es_nuevo = true) {
    leerClase('Formulario');
    Formulario::validar('codigo_sis', $this->codigo_sis, 'texto', 'El Codigo SIS');
    if ($es_nuevo) // nuevo
      $this->getByCodigoSis($this->codigo_sis, true);
  }

  /**
   * Inicia el filtro para el admin
   * @param Filtro $filtro el fitro que se usara en el admin
   */
  function iniciarFiltro(&$filtro) {

    if (isset($_GET['order']))
      $filtro->order($_GET['order']);
    $usuario = new Usuario();
    $usuario->iniciarFiltro($filtro);
    $filtro->nombres[] = 'Codigo Sis';
    $filtro->valores[] = array('input', 'codigo_sis', $filtro->filtro('nombre'));
  }

  /**
   * Devuelve el order para el SQL
   * @param array $order_array arreglo con las claves para el order
   * @return string
   */
  function getOrderString(&$filtro) {
    $order_array = array();
    $order_array['codigo_sis'] = " {$this->getTableName()}.codigo_sis ";

    $order_array['id'] = " {$this->getTableName('Usuario')}.id ";
    $order_array['nombre'] = " {$this->getTableName('Usuario')}.nombre ";
    $order_array['apellidos'] = " {$this->getTableName('Usuario')}.apellidos ";
    $order_array['login'] = " {$this->getTableName('Usuario')}.login ";
    $order_array['email'] = " {$this->getTableName('Usuario')}.email ";
    $order_array['estado'] = " {$this->getTableName('Usuario')}.estado ";
    return $filtro->getOrderString($order_array);
  }

  /**
   * Filtramos para la busqueda usando un objeto Filtro
   * @param Filtro $filtro el objeto filtro
   * @return boolean
   */
  public function filtrar(&$filtro) {
    parent::filtrar($filtro);
    $filtro_sql = '';
    if ($filtro->filtro('email'))
      $filtro_sql .= " AND {$this->getTableName('usuario')}.email like '%{$filtro->filtro('email')}%' ";
    if ($filtro->filtro('login'))
      $filtro_sql .= " AND {$this->getTableName('usuario')}.login like '%{$filtro->filtro('login')}%' ";
    if ($filtro->filtro('nombre'))
      $filtro_sql .= " AND {$this->getTableName('usuario')}.nombre like '%{$filtro->filtro('nombre')}%' ";
    if ($filtro->filtro('apellidos'))
      $filtro_sql .= " AND {$this->getTableName('usuario')}.apellidos like '%{$filtro->filtro('apellidos')}%' ";
    return $filtro_sql;
  }

  function grabarCorrecion($file = 'file') {
    if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
      
      $proyecto    = $this->getProyecto();
      if (!$proyecto || !isset($proyecto->id))
        return false;
      
      $archivo_path = Proyecto::ARCHIVO_PATH;
      $proyecto_id  = Proyecto::ARCHIVO_PREFOLDER.$proyecto->id;
      $correciones  = Proyecto::ARCHIVO_CORRECIONES;
      
      //echo PATH . $archivo_path;
      if (!file_exists(PATH . $archivo_path))
        mkdir (PATH . $archivo_path);
      if (!file_exists(PATH . $archivo_path . $proyecto_id))
        mkdir (PATH .  $archivo_path . $proyecto_id);
      if (!file_exists(PATH . $archivo_path . $proyecto_id . $correciones))
        mkdir (PATH . $archivo_path . $proyecto_id . "$correciones/");
      
      
      $nombreDirectorio = PATH . $archivo_path . $proyecto_id . "$correciones/";
      //echo "$nombreDirectorio";
      $nombreFichero = $_FILES[$file]['name'];
      $nombreCompleto = $nombreDirectorio . $nombreFichero;
      if (file_exists($nombreCompleto)) {
        $idUnico = time();
        $nombreFichero = $idUnico . "-" . $nombreFichero;
      }
      move_uploaded_file($_FILES[$file]['tmp_name'], $nombreDirectorio . $nombreFichero);
      return true;
    }
    else
      return false;
  }

  function grabarAvance() 
  {
    $proyecto    = $this->getProyecto();
    if (!$proyecto || !isset($proyecto->id))
      return false;
    $avance = new Avance();
    $avance->objBuidFromPost();
    if ( get_magic_quotes_gpc() )
      $avance->descripcion = htmlspecialchars( stripslashes((string)$avance->descripcion) );
    else
      $avance->descripcion = htmlspecialchars( (string)$avance->descripcion);

    $avance->proyecto_id  = $proyecto->id;
    $avance->fecha_avance = date('d/m/Y');
    $avance->estado       = Objectbase::STATUS_AC;
    if ( isset($_POST['revision_id']) && is_numeric($_POST['revision_id']) )
    {
      $this->grabarRespuestaRevision($_POST['revision_id']);
    }
    $avance->estado_avance = Avance::E1_CREADO;
    $avance->save();
    return $avance;
  }
  
  function grabarRespuestaRevision($revision_id) 
  {
    leerClase('Revision');
    leerClase('Observacion');
    $revision = new Revision($revision_id);
    $revision->getAllObjects();
    foreach ($revision->observacion_objs as $observacion) 
    {
      if ( isset($_POST['observacion_id_' . $observacion->id]) && trim($_POST['observacion_id_' . $observacion->id]) != '' )
      {
        $observacion->respuesta = $_POST['observacion_id_' . $observacion->id];
        if ( get_magic_quotes_gpc() )
          $observacion->respuesta   = htmlspecialchars( stripslashes((string)$observacion->respuesta) );
        else
          $observacion->respuesta   = htmlspecialchars( (string)$observacion->respuesta);
        $observacion->estado_observacion = Observacion::E2_CORREGIDO;
        $observacion->save();
      }
    }
    $revision->estado_revision  = Revision::E3_RESPONDIDO;
    $revision->fecha_correccion = date('d/m/Y');
    $revision->save();
    return true;
  }

}

?>