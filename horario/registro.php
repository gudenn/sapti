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
  leerClase('Horario');
  
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

$TEMPLATE_TOSHOW = 'horario/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>