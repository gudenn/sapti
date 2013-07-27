<?php
try {
  require('_start.php');
  global $PAISBOX;

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


  //CREAR UN ESTUDIANTE
  leerClase('Estudiante');
  
  $estudiante = new Estudiante(1);
  /*
  $estudiante->nombre = "Juan Carlos";
  $estudiante->apellido_paterno = "Campos";
  $estudiante->apellido_materno = "Flores";
  $estudiante->codigo_sis = "2005605654";
   * 
   */
  $estudiante->estado = "AC";
  $estudiante->save();
  
  
  $smarty->assign("estudiante", $estudiante);
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'perfil/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>