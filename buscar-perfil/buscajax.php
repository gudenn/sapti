<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Buscador');
  $smarty->assign('description','Buscador');
  $smarty->assign('keywords','Buscador');

  //CSS
  $CSS[]  = "css/style.css";
  $smarty->assign('CSS','');

  //JS

  
   $JS[]  = "js/ajaxbuscarperfil.js";
   $smarty->assign('JS','');
   

  //CREAR UN TIPO   DE DEF
 
 
}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'buscarperfil/busqedaperfil.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>
