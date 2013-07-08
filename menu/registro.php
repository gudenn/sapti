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
  leerClase('Menu');
  
  $menu = new Menu();
  $smarty->assign("menu", $menu);
    $menu->objBuidFromPost();
    $menu->save();
 
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    $menu->objBuidFromPost();
    $menu->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'menu/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>