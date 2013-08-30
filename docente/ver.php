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
   
    leerClase("Usuario");
    leerClase("Docente");
    leerClase("Tribunal");



    $docente      =  getSessionDocente();
    $docente_ids  =  $docente->id;
    //echo $docente_ids;
    if ( isset($_GET['tribunal_id']))
  {
      
  $sql="select n.`detalle`
from `notificacion` n, `notificacion_tribunal` nt, `tribunal` t
where n.`id`=nt.`notificacion_id` and nt.`tribunal_id`=t.`id` and n.`estado`='AC' and nt.`estado`='AC' and t.`estado`='AC' and t.`id`=".$_GET['tribunal_id'].";";
    $resultado   =  mysql_query($sql);
    $detalle= "";
 
 while ($fila = mysql_fetch_array($resultado)) 
 {
     $detalle=$fila['detalle'];
    
 }
 //var_dump($notitribunal_id);
  $smarty->assign('detalle',$detalle);
    $smarty->assign('docente',$docente);
     $smarty->assign('idtribunal',$_GET['tribunal_id']);
  
 }
 
  
  
if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
     if(isset($_POST['ids']))
     {
       
       $tribunal = new Tribunal($_POST['ids']);
       
       $tribunal->visto=$_POST['visto'];
       $tribunal->descripcion=$_POST['descripcion'];
       $tribunal->save();
     }
    
  
  }
  
  
  $columnacentro = 'docente/ver.tpl';
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
