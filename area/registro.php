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

  //CREAR UNA DEFENSA
  leerClase('Area');
  $area = new Area();
  $smarty->assign("area", $area);
  // $modalidad->objBuidFromPost();
    //$modalidad->save();
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    $area->objBuidFromPost();
    $area->estado = Objectbase::STATUS_AC;
    $area->save();
    echo " <script> windows.location.href ='estudiante/index.php' </script>";
    //header('location:'.urldecode($url("estudiante/index.php")));
  }
  $token = sha1(URL . time());
  $_SESSION['register'] = $token;
  $smarty->assign('token',$token);
  $smarty->assign("ERROR", $ERROR);
  //No hay ERROR
  $smarty->assign("ERROR",'');
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'area/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>