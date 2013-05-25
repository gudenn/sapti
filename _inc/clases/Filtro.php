<?php
/**
 * Herramienta para los filtro en la zona de administracion
 *
 * @author hp
 */
class Filtro {

 /**
  * La clave identificadora del filtro
  * 
  * @var string(11) id
  * @access public
  */
  var $key;
  
 /**
  * los nombres de los campos
  * 
  * @var array
  * @access public
  */
  var $nombres;
  
  
 /**
  * la url para el clear
  * 
  * @var string
  * @access public
  */
  var $clearaction;
  
  /**
   * Inicia el filtro
   * @param string $key
   * @return Filtro
   */
  function __construct($key,$file) 
  {
    $this->key = $key;
    if (isset($_GET['clear']) && $_GET['clear'] == 'Limpiar')
      $this->clearFiltro();
    if (isset($_POST['clear']) && $_POST['clear'] == 'Limpiar')
      $this->clearFiltro();
    if ( !isset($_SESSION['filtro']) || !isset($_SESSION['filtro'][$this->key]) )
      $_SESSION['filtro'][$this->key] = array();
    $this->clearaction  = basename($file);
  }

  /**
   * Validamos ños datos enviados por un formulario usando el metodo GET
   * @param Object $class
   * @return string
   */
  function ValidarFiltrosGet($class) 
  {
      $obj = new $class();
      $ERRORES = '';
      foreach($obj as $key => $value)
      {
        /** if the $key refer to an object continue */
        if (Objectbase::isKeyObject($key))
          continue;
        //validamos el filtro
        try 
        {
          if (isset($_GET[$key]))
            Formulario::validar($key,$_GET[$key],'texto',"Filtrar por: $key",TRUE);
        } 
        catch (Exception $e) 
        {
          unset($_GET[$key]);
          $ERRORES .= handleError($e);
        }
      }
      
    return $ERRORES;
  }
  
  /**
   * Borra el filtro
   */
  function clearFiltro() {
    if ( isset($_SESSION['filtro']) && isset($_SESSION['filtro'][$this->key]) )
    unset($_SESSION['filtro'][$this->key]);
  }

  /**
   * retorna el un filtro especifico
   * @param string $f_key la clave buscada
   * @return string filtro
   */
  function filtro($f_key) {
    $filtro = '';
    if (isset($_SESSION['filtro'][$this->key][$f_key]))
      $filtro = $_SESSION['filtro'][$this->key][$f_key];
    if (isset($_GET[$f_key])) 
    {
      $filtro = $_GET[$f_key];
    }
    $_SESSION['filtro'][$this->key][$f_key] = $filtro;
    return $filtro;
  }


  /**
   * Retorna un string del filtro segun un arreglo guardado aca
     * @param string $f_key la clave buscada
   * @return string
   */
  function getFiltroString($f_key) 
  {
    $filtro_array      = array();
    $filtro_array['1'] = 'FREE';
    $filtro_array['2'] = 'PREMIUM';
    $filtro_array['3'] = 'GOLD';

    $filtro_array['AC'] = 'Verificado';
    $filtro_array['NC'] = 'Sin Verificar';
    $filtro_array['RO'] = 'Real Owner';
    $filtro_array['DE'] = 'Eliminado';

    $filtro_array['f1'] = 'Formulario 1';
    $filtro_array['b1'] = 'Branch 1';
    $filtro_array['MV'] = 'Auto Generados';
    $filtro_array['RECIEN CREADO'] = 'RECIEN CREADO';
    $filtro_array['PRIMERO']       = 'PRIMERA GRABACION';
    $filtro_array['SEGUNDO']       = 'SEGUNDA GRABACION';


    $filtro = $this->filtro($f_key);
    if ($filtro == '')
      return 'Todos';
    if (isset($filtro_array[$filtro]))
      return $filtro_array[$filtro];
    else
      return $filtro;
  }

  /**
   * Retorna una opcion del filtro
   * @param type $f_key
   * @param type $es_pais
   * @return type
   */
  function getFiltroOption($f_key,$es_pais = false) 
  {
    if (!$es_pais)
      return '<option value="'. $this->filtro($f_key).'" selected="selected">'. $this->getFiltroString($f_key).'</option>';
    return '<option value="'. $this->filtro($f_key).'" selected="selected">'.$es_pais['descripcion'].'</option>';
  } 
  
  /**
   * Retorna el order en un filtro
   * @param string $o_key
   * @return string
   */
  function order($o_key) 
  {
    if (!isset($_SESSION['filtro'][$this->key]['order']))
      $_SESSION['filtro'][$this->key]['order'] = array();

    if (isset($_SESSION['filtro'][$this->key]['order'][$o_key]))
    {
      if ($_SESSION['filtro'][$this->key]['order'][$o_key] == 'ASC')
        $_SESSION['filtro'][$this->key]['order'][$o_key] = 'DESC';
      else
        unset($_SESSION['filtro'][$this->key]['order'][$o_key]);
    }
    else
      $_SESSION['filtro'][$this->key]['order'][$o_key] = 'ASC';
    return;
  }

  /**
   * Retorna el icon del order
   * @param string $o_key 
   * @return string
   */
  function iconOrder($o_key) 
  {
    $asc  = '<img src="'.URL_IMG.'ico_descendente.gif" alt="Acendente"   title="cambiar"/>';
    $desc = '<img src="'.URL_IMG.'ico_ascendente.gif"  alt="Descendente" title="cambiar" />';
    if (!isset($_SESSION['filtro'][$this->key]['order'][$o_key]))
      return '';
    if ($_SESSION['filtro'][$this->key]['order'][$o_key] == 'ASC' )
      return $asc;
    return $desc;
  }

  /**
   * Devuelve el order para el SQL
   * @param array $order_array arreglo con las claves para el order
   * @return string
   */
  function getOrderString($order_array) 
  {
    /*
    $order_array             = array();
    $order_array['id']       = " m.id ";
    $order_array['estado']   = " m.estado ";
    $order_array['proveedor']   = " m.proveedor ";
    $order_array['bolbox']   = " m.bolbox ";
    $order_array['peso_total']   = " m.peso_total ";
    $order_array['volumen']   = " m.volumen ";
    $order_array['invoice']   = " m.invoice ";
    $order_array['fecha_ingreso']   = " m.fecha_ingreso ";
     * 
     */

    if (!isset($_SESSION['filtro'][$this->key]) || !isset($_SESSION['filtro'][$this->key]['order']))
      return '';

    $order = '';
    foreach ($_SESSION['filtro'][$this->key]['order'] as $key => $value) {
      if (isset($order_array[$key]))
        $order .= ', '.$order_array[$key].$value;
    }

    $order = ltrim($order,',');
    if ( $order != '')
      $order = " ORDER BY $order ";
    return $order;
  }
  
}

?>