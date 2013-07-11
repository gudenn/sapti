<?php
/**
* Sistema "Proyecto Final"
* @version 1.0.2013.04.03
* @date 03/04/2013
*/
  // Begin the session
  session_start();

  require("_configurar.php");
  require("_sesion.php");
  leerClase('Exceptions');
  leerClase('Objectbase');
  
  if (isset($_GET['salir'])||isset($_POST['salir']))
  {  
    closeSession();
    header("Location: index.php");
    exit();
  }
  if (isset($_GET['saliradmin'])||isset($_POST['saliradmin']))
  {  
    closeAdminSession();
    header("Location: index.php");
    exit();
  }
  if (isset($_GET['salirestudiante'])||isset($_POST['salirestudiante']))
  {  
    closeEstudianteSession();
    header("Location: index.php");
    exit();
  }
  
  conectar_db();
  mysql_query('SET NAMES \'utf8\'');


  /**
  * funcion para leer las clases
  *
  * @param <string> $clase
  * @return <bool>
  */
  function leerClase($clase)
  {
    if (class_exists($clase))
      return true; // clase ya leida
    if (file_exists(DIR_CLASES . "/$clase.php"))
      require_once(DIR_CLASES . "/$clase.php");
    else 
    {
      if (isset($_GET['test']))
      {
        echo PATH;
        echo "<br />";
        echo DIR_CLASES;
        echo "<br />";
      }
      exit ("EL SISTEMA ESTA MAL CONFIGURADO * $clase ". DIR_CLASES);
    }
      return true;
  }

  /**
  * Inicia una conexion a la DB
  *
  * @global Conexion_db $CONEXION_DB
  * @return bool
  */
  function conectar_db()
  {
    try 
    {
      global $CONEXION_DB;
      if (!is_object($CONEXION_DB)){
        leerClase("Conexion_db");
        $CONEXION_DB = New Conexion_db();
      }
      if (!isset($CONEXION_DB->enlace) || !$CONEXION_DB->enlace )
        $CONEXION_DB->conectar();
      return true;  
    }     
    catch (Exception $e) 
    {
      $mensaje = $e->getMessage();
      echo $mensaje;
      exit;
    }

  }

  /**
  * Apache funcion de ayuda para el rewrite_mod
  * 
  * @param <type> $url
  * @return <variables>
  */
  function getVariables($url)
  {
    //quitamos la barra del final
    $url = preg_replace('/\/$/', '', $url);

    //separamos las partes de la url y las contamos
    $partes = explode('/', $url);
    $cantPartes = count($partes);

    $variables = array();
    for($c = 0; $c < $cantPartes; $c = $c + 2)
    {
      //Acumulamos los pares de valores(para nosotros variables) en el arreglo
      $nombre             = limpiar($partes[$c]);
      $valor              = (isset($partes[$c + 1]))?limpiar($partes[$c + 1]):0;
      $variables[$nombre] = $valor;
    }

    return $variables;
  }

/**
 * Genera la URL base para un proyecto 
 * @return string URL
 */
function getBaseUrl() {
  $url_aux = '';
  if ('localhost' == $_SERVER['HTTP_HOST']) //se usa el primer directorio en localhost
  {
    $url_aux   = ltrim($_SERVER['REQUEST_URI'], '/');
    $url_aux   = explode('/',$url_aux);
    $url_aux   = isset($url_aux[0])?$url_aux[0]:'';
    $url_aux   = ('' == $url_aux )?'':$url_aux . '/';
    //$url_aux   = '';
  }

  $protocol    = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
  $host        = rtrim($_SERVER['HTTP_HOST'], '/');
  return $protocol . $host. '/' . $url_aux;
}
/**
 * Genera el Path base para un proyecto * esta bajo analisis, no es nesesario
 * @return string PATH
 */
function getBasePath() {
  $url_aux = '';
  if ('localhost' == $_SERVER['HTTP_HOST']) //se usa el primer directorio en localhost
  {
    $url_aux   = ltrim($_SERVER['REQUEST_URI'], '/');
    $url_aux   = explode('/',$url_aux);
    $url_aux   = isset($url_aux[0])?$url_aux[0]:'';
    $url_aux   = ('' == $url_aux )?'':$url_aux . '/';
  }

  $path = rtrim($_SERVER['DOCUMENT_ROOT'], '/');
  return  $path. '/' . $url_aux;
}


// Substring without losing word meaning and
// tiny words (length 3 by default) are included on the result.
// "..." is added if result do not reach original string length

function cortar($str, $length = 25, $end = '...')
{
  if (strlen($str)<$length)
    return $str;
  return substr($str,0,$length).$end;
}

//Clean the inside of the tags
function clean_inside_tags($txt,$tags){
   
    preg_match_all("/<([^>]+)>/i",$tags,$allTags,PREG_PATTERN_ORDER);

    foreach ($allTags[1] as $tag){
        $txt = preg_replace("/<".$tag."[^>]*>/i","<".$tag.">",$txt);
    }

    return $txt;
}

  /**
   * Imprime un icono de la carpeta icon en imagenes
   * @param string $file  nombre del archivo del icono
   * @param string $alt  texto alternativo
   * @param string $width ancho del icono
   * @param string $height alto del icono (por defecto lleva el mismo valor del ancho)
   * @param string $extra estilo o clases o cuaquier cosa
   * @param boolean $echo si se muestra o no
   * @return string
   */
  function icono($file,$title,$width = '24px',$height = false,$extra = false,$alt = false,$echo = false) 
  {
    if (!$alt)
      $alt = $title;
    if (!$height)
      $height = $width;
    $URL = URL_IMG."icons/$file";
    $img = <<<____IMG
      <img src="$URL" width="$width" height="$height" alt="$alt"  title="$title" $extra />
____IMG;
    if ($echo)
      echo $img;
    else
      return $img;
    return;
  }


/**
 * Cerrar tags abiertos
 * @param string $html
 * @return string 
 */
function close_dangling_tags($html){
  #put all opened tags into an array
  preg_match_all("#<([a-z]+)( .*)?(?!/)>#iU",$html,$result);
  $openedtags=$result[1];

  #put all closed tags into an array
  preg_match_all("#</([a-z]+)>#iU",$html,$result);
  $closedtags=$result[1];
  $len_opened = count($openedtags);
  # all tags are closed
  if(count($closedtags) == $len_opened){
    return $html;
  }

  $openedtags = array_reverse($openedtags);
  # close tags
  for($i=0;$i < $len_opened;$i++) {
    if (!in_array($openedtags[$i],$closedtags)){
      $html .= '</'.$openedtags[$i].'>';
    } else {
      unset($closedtags[array_search($openedtags[$i],$closedtags)]);
    }
  }
  return $html;
}