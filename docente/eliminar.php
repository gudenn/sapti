<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;
  leerClase("Observacion");
/*
    if (isset($_GET['eliminar']) && isset($_GET['observacion_id']) && is_numeric($_GET['observacion_id']) )
  {
    $observacion = new Observacion($_GET['observacion_id']);
    $observacion->delete();
  };
*/if(isset($_GET['ob'])){
    $observacion = new Observacion($_GET['ob']);
    $observacion->delete();
    echo $return ? "ok" : "error";
  };
}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
?>