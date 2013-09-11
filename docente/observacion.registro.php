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
  $CSS[]  = URL_CSS . "academic/tables.css";
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
  $JS[]  = URL_JS . "jquery.addfield.js";
  $JS[]  = URL_JS . "jquery-latest.js";
  
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
  
  //CREAR UNA REVISION
  leerClase('Revision');
  leerClase('Observacion');
  if (isset($_POST['observaciones'])) 
  $observaciones=$_POST['observaciones'];

  $proyecto_ids = $array['id_pr'];
  $docente=  getSessionDocente();
  $docente_ids=$docente->id;
  
  $observacion = new Observacion();
  $revision = new Revision();

  $smarty->assign("revision", $revision);
  $smarty->assign("observacion", $observacion);
    
    $nombre_n=$array['nombre'];
    $nombre_a=$array['apellidos'];
    $es=' ';
    $nombre_es=$nombre_n.$es.$nombre_a;
    $nombre_pr=$array['nombrep']; 
    
    $smarty->assign("nombre_es", $nombre_es);
    $smarty->assign("nombre_pr", $nombre_pr);
    $urlpdf=".../ARCHIVO/proyecto.pdf";
    $smarty->assign("urlpdf", $urlpdf);
    
    date_default_timezone_set('UTC');
    $revision->fecha_revision=date("d/m/Y");

    if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
    {
    $revision->objBuidFromPost();
    $revision->estado = Objectbase::STATUS_AC;
    $revision->revisor=$docente_ids;
    $revision->proyecto_id=$proyecto_ids;
    $revision->save();
    foreach ($observaciones as $obser_array){
    $observacion->objBuidFromPost();
    $observacion->estado = Objectbase::STATUS_AC;
    $observacion->observacion=$obser_array;
    $observacion->revision_id = $revision->id;
    $observacion->save();
    }
    $url="estudiante.lista.php";
    $ir = "Location: $url";
        header($ir);
    }

  
  $token = sha1(URL . time());
  $_SESSION['register'] = $token;
  $smarty->assign('token',$token);
  
  
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'docente/full-width.observacion.registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>