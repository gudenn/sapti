<?php
try {
  require('_start.php');
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
  
  $smarty->assign('JS',$JS);


  $smarty->assign("ERROR", '');

 //$mascara = 'docente/registro-evaluacion.tpl';
 //$smarty->assign('mascara',$mascara);

  //CREAR UN ESTUDIANTE
  leerClase('Revision');
  leerClase('Observacion');
  
  $obser=$_POST['materiales'];
  
  $observacion = new Observacion();
  $revision = new Revision();
  
  //$smarty->assign($_POST["materiales"], $obser);
  //$smarty->assign("materiales", $obser);
  $smarty->assign("revision", $revision);
  $smarty->assign("observacion", $observacion);
    date_default_timezone_set('UTC');
  $revision->fecha_observacion=date("d/m/Y");

  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    $revision->objBuidFromPost();
    $revision->estado = Objectbase::STATUS_AC;
    $revision->save();
    foreach ($obser as $obser_array){
    $observacion->objBuidFromPost();
    $observacion->estado = Objectbase::STATUS_AC;
    $observacion->observacion=$obser_array;
    $observacion->revision_id = $revision->id;
    $observacion->save();
    }
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