<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = "css/style.css";
  $smarty->assign('CSS','');

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');

  //
  leerClase('Area');
    leerClase('Horario');

 
///// AKI CREAMOS LOS ID DE LA CARRERA  PARA CARGAR AL FORMULARIO ////////
 $area = new Area();
  $area_sql = $area->getAll();
  $area_id = array();
  $area_nombre = array();
  while ($area_sql && $rows = mysql_fetch_array($area_sql[0])) 
 {
     $area_id[] = $rows['id'];
     $area_nombre[] = $rows['nombre'];
  }

  $smarty->assign('area_id', $area_id);
  $smarty->assign('area_nombre', $area_nombre);
  
  
  
  
  
  
  
  
  $horario = new Horario();
  $smarty->assign("horario", $horario);
  // $modalidad->objBuidFromPost();
    //$modalidad->save();
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    
    $horario->objBuidFromPost();
     $horario->estado = Objectbase::STATUS_AC;
    $horario->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'apoyo/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>