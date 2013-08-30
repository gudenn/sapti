<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
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
  $JS[]  = URL_JS . "jquery.addfield.js";

  
  
  $smarty->assign('JS',$JS);
  $smarty->assign("ERROR", '');
 //// leer las clases 
    leerClase("Area");
    leerClase("Apoyo");
    leerClase("Usuario");
    leerClase("Docente");



  $docente     =  getSessionDocente();
    $docente_ids =  $docente->id;
    //echo $docente_ids;
    $sql="select u.`nombre` as nombreusuario, u.`apellidos` , p.`id`,p.`nombre`, t.`id` as idtribunal, d.`id` as iddocente
from proyecto p, `proyecto_tribunal` pt, `tribunal` t, `docente` d , usuario u
where  p.`id`=pt.`proyecto_id` and pt.`id`=t.`proyecto_tribunal_id` and d.`id`=t.`docente_id` and  u.`id`=d.`usuario_id` and p.`estado`='AC' and pt.`estado`='AC'
 and t.`estado`='AC' and u.`estado`='AC' and d.`estado`='AC'  and u.`id`=".$docente_ids.";";
    $resultado   =  mysql_query($sql);
    $notitribunal_id= array();
 
 while ($fila = mysql_fetch_array($resultado)) 
 {
     $notitribunal_id[]=$fila;
    
 }
 //var_dump($notitribunal_id);
  $smarty->assign('notitribunal_id'     ,$notitribunal_id);
  
  
  
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    
  
 }
  
  
  $columnacentro = 'docente/notitribunal.tpl';
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

$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>
