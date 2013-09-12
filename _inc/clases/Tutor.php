<?php

class Tutor extends Objectbase
{
    /**
     * Codigo identificador del Objeto Usuario
     * @var INT(11)
     */
    var $usuario_id;

    /**
     * Codigo de tutor
     * @var INT(11)
     */
    var $codigo;
    
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
      public function getNombreTutor($login, $clave) {
       $sql= "SELECT t.`id`, u.`nombre`
                FROM  `usuario` u, `tutor` t
                WHERE u.`login`='".$login."' AND
                 u.`clave`='".$clave."' and
                    t.`usuario_id`=u.`id` ";
       
          $resultado = mysql_query($sql) or
            die("Revise la Sintaxis de su Consulta");
           $resultado;
        if (!$resultado) {
            return false;
        }
        $proyecto =array();
        while($array = mysql_fetch_object($resultado)){
            // var_dump($array);
            $proyecto[]=$array;
           
        }
        //echo $proyecto;
        //var_dump("$proyecto");
        return $proyecto;
    }
    /**
     * 
     * @return el id del usuario tutor
     * 
     */
    public function getIdTutor($login, $clave){
        $sql ="SELECT t.`id`
            FROM  `usuario` u, `tutor` t
            WHERE u.`login`='$login'"." AND
                u.`clave`='$clave'"." and
            t.`usuario_id`=u.`id` ;";
          $respuesta = mysql_query($sql);
        echo $respuesta;
        return $sql;
        
    }

    /**
     * buscamos el tutor por el login y la clave
     * @param type $login
     * @param type $clave
     * @return object
     */
    public function issetTutor($login, $clave) {
        if ($login == "" || $clave == "") {
            return false;
        }
        $activo = Objectbase::STATUS_AC;
        $sql = "select * , a.id as tutor_id from ".$this->getTableName()." as a , ".$this->getTableName('usuario')." as u   where u.login = '$login' and u.clave = '$clave' and a.usuario_id = u.id and u.estado = '$activo' and a.estado = '$activo'  ";
        //echo $sql;
        $resultado = mysql_query($sql);
        if (!$resultado) {
            return false;
        }
        $user = mysql_fetch_object($resultado);
        return $user;
    }
    
    public function getProyectos() {
        //echo $this->usuario_id;
       // echo 'test'.$this->getId();
        $sql = '
      SELECT  u.nombre, u.apellidos, p.nombre as nombreproyecto, p.modalidad, a.nombre as nombrearea,
              sub.nombre nombresub
       FROM `usuario` u , `estudiante`  e, `proyecto_estudiante` pe, `proyecto` p,
             `area` a, `sub_area` sub , `tutor` t, `proyecto_tutor` pt
       WHERE   u.`id`= e.`usuario_id` and
               e.`id`=pe.`estudiante_id` and
               pe.`proyecto_id`=p.`id` AND

               t.`id`=1 and
               pt.`tutor_id`=t.`id`;';
        
        $resultado = mysql_query($sql);
        if (!$resultado) {
            return false;
        }
        $proyecto =array();
        while($array = mysql_fetch_object($resultado)){
            
            $proyecto[]=$array;
        }
        return $proyecto;
    }
    function getUsuario() {
          if (!isset($this->usuario_id) || !$this->usuario_id)
                return false;
                 $usuario = new Usuario($this->usuario_id);
               return $usuario;
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
   * Retorna el nombre completo del usuario
   * @param boolean $echo si muestra o solo devuelve
   * @return boolean
   */
  function getNombreCompleto1($echo = false) 
  {
    leerClase('Usuario');
    if (!$this->usuario_id)
      return false;
    $usuario = new Usuario($this->usuario_id);
    return $usuario->getNombreCompleto($echo);
  }

}
