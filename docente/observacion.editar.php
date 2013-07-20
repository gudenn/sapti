<?php
try {
  require('_start.php');
  if(!isDocenteSession())
  global $PAISBOX;
  
  /** HEADER */
  $smarty->assign('title','Modificacion de Observaciones');
  $smarty->assign('description','Formulario de Modificacion de Observaciones');
  $smarty->assign('keywords','SAPTI,Observaciones,Registro');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  //$CSS[]  = URL_CSS . "/styleob.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
 
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";

  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";

  $smarty->assign('JS',$JS);

  $smarty->assign("ERROR", '');
  $_SESSION['obser'] = (isset($_SESSION['obser']))?$_SESSION['obser']:'';
  if ( isset($_GET['revisiones_id']) && is_numeric($_GET['revisiones_id']) )
  $_SESSION['obser'] = $_GET['revisiones_id'];
  
  $obser=$_GET['revisiones_id'];
  $smarty->assign('obser',$obser);
  $columnacentro = 'docente/columna.centro.observacion-editar.tpl';
  //$columnacentro = 'docente/editar.tpl';
  $smarty->assign('columnacentro',$columnacentro);

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

$TEMPLATE_TOSHOW = 'docente/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>
