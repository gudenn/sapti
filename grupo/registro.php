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

  //CREAR UN ESTUDIANTE
  leerClase('Grupo');
  
  $grupo = new Grupo();
  $smarty->assign("grupo", $grupo);
    //$grupo->objBuidFromPost();
    //$grupo->save();
 
 /// if ( isset($_POST['tarea']) && $_POST['tarea']=='grabar' )
    if ( isset($_POST['tarea']))
  {
    $grupo->objBuidFromPost();
    $grupo->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'grupo/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>