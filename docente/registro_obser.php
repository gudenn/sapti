<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;
  leerClase("Observacion");
  $observacion = new Observacion();
  
if(isset($_GET['obser'])){
    $observacion->objBuidFromPost();
    $observacion->estado = Objectbase::STATUS_AC;
    $observacion->observacion=$_GET['obser'];
    $observacion->revision_id =$_GET['revid'];
    $observacion->save();
  };
}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
?>