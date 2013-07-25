<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php");  

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');


  //CREAR UN DOCENTE
  leerClase('Docente');
  
  $docente = new Docente(1);
  $docente->estado = "AC";
  $docente->save();

  $smarty->assign("docente", $docente);
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'docente/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>