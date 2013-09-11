<?php
try {
  require('_start.php');
  if(!isTutorSession())
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


  
  
// escritotrio del tutor
  leerClase('Tutor');
  leerClase('Usuario');
  
  $tutor_aux = getSessionTutor();
  $tutor    = new Tutor($tutor_aux->tutor_id);
  $usuario        = $tutor->getUsuario();
  $proyecto        = $tutor->getProyectos();
  $smarty->assign("tutor", $tutor);
  $smarty->assign("usuario", $usuario);
  $smarty->assign("proyecto", $proyecto);
  $smarty->assign("ERROR", $ERROR);
  /*
  $tutor->codigo = 'CODIGOTEST';
  $usuario = new Usuario(1);
  $usuario->login = 'tutor';
  $usuario->clave = 'tutor';
  $usuario->fecha_cumple = '12/11/1990';
  $usuario->save();
  $tutor->usuario_id = $usuario->id;
  $tutor->save();
  */
  


  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'tutor/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>