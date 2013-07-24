<?php
try {
  require('_start.php');
  if(!isDocenteSession())
      header("Location: login.php");
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Registro Observaciones');
  $smarty->assign('description','Formulario de Registro de Observaciones');
  $smarty->assign('keywords','SAPTI,Observaciones,Registro');

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

  $smarty->assign('JS',$JS);


  $smarty->assign("ERROR", '');


  //CREAR UN ESTUDIANTE
  leerClase('Revision');
  leerClase('Observacion');

  $_SESSION['revisiones_id'] = (isset($_SESSION['revisiones_id']))?$_SESSION['revisiones_id']:'';
  if ( isset($_GET['revisiones_id']) && is_numeric($_GET['revisiones_id']) )
    $_SESSION['revisiones_id'] = $_GET['revisiones_id'];

  $revision       = new Revision($_SESSION['revisiones_id']);
  $observacion    = new Observacion();
  $obser=$_SESSION['revisiones_id'];
  $resul = "select observacion from observacion where revision_id ='".$obser."' ";
  $sql=mysql_query($resul);
  $a=0;
  $sql1=array();
  while($res=mysql_fetch_row($sql)) {
      $sql1[$a]=$res[0];
      $a=$a+1;
    }
  $smarty->assign("revision"   , $revision);
  $smarty->assign("observacion", $observacion);
  $smarty->assign("sql1", $sql1);
  
  $columnacentro = 'docente/columna.centro.observacion-detalle.tpl';
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