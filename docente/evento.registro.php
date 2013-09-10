<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php");
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
  
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";

  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";

  //Validation
  $JS[]  = URL_JS . "validate/idiomas/jquery.validationEngine-es.js";
  $JS[]  = URL_JS . "validate/jquery.validationEngine.js";
  
  $smarty->assign('JS',$JS);
  $smarty->assign("ERROR", '');

    function array_recibe($url_array) { 
     $tmp = stripslashes($url_array); 
     $tmp = urldecode($tmp); 
     $tmp = unserialize($tmp); 

    return $tmp; 
  };
    $array=$_GET['array']; 
    $array=array_recibe($array);
  
  //CREAR UN EVENTO
  leerClase('Evento');
  
  $docente=  getSessionDocente();
  $docente_ids=$docente->id;
  $columnacentro = 'docente/columna.centro.evento.registro.tpl';
  $smarty->assign('columnacentro',$columnacentro);  

  $evento = new Evento();
  
  $smarty->assign("evento", $evento);
    
    $nombre_n=$array['nombre'];
    $nombre_a=$array['apellidos'];
    $es=' ';
    $nombre_es=$nombre_n.$es.$nombre_a;
    $nombre_pr=$array['nombrep']; 
    
    $smarty->assign("nombre_es", $nombre_es);
    $smarty->assign("nombre_pr", $nombre_pr);
    
    //date_default_timezone_set('UTC');
    //$evento->fecha_evento=date("d/m/Y");
    
    if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
    {
    $evento->objBuidFromPost();
    $evento->estado = Objectbase::STATUS_AC;
    $evento->dicta_id=4;
    $evento->save();

    $url="calendario.evento.php";
    $ir = "Location: $url";
        header($ir);
    }
  
  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
$token                = sha1(URL . time());
$_SESSION['register'] = $token;
$smarty->assign('token',$token);

$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>