<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
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
  //CREAR UNA DEFENSA
  leerClase('Carrera');
  $carrera = new Carrera();
  $smarty->assign("carrera", $carrera);
  // $modalidad->objBuidFromPost();
    //$modalidad->save();
  
    $sql="select u.`nombre`, u.`apellidos`, pt.id , p.`nombre` as nombreproyecto
from `proyecto` p, `proyecto_tribunal` pt, `proyecto_estudiante` pe, `estudiante` e, `usuario` u
where p.`id`=pe.`proyecto_id` and pe.`estudiante_id`=e.id and e.`usuario_id`=u.id and p.`id`= pt.`proyecto_id` and p.`estado`='AC' and
pt.`estado`='AC' and pe.`estado`='AC' and e.`estado`='AC' and u.`estado`='AC';
";
    $resultado   =  mysql_query($sql);
    $listasignacion= array();
 
 while ($fila = mysql_fetch_array($resultado)) 
 {
     $listasignacion[]=$fila;
    
 }
 //var_dump($notitribunal_id);
  $smarty->assign('listasignacion',$listasignacion);
    
  
 
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    $carrera->objBuidFromPost();
    $carrera->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$contenido = 'asignacion/regist.tpl';
  $smarty->assign('contenido',$contenido);
  

$TEMPLATE_TOSHOW = 'tribunal/tribunal.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>