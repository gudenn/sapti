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
  leerClase('Estudiante');
  
  $estudiante = new Estudiante();
  
  $smarty->assign("estudiante", $estudiante);
  
  
  //$estudiante->fecha_cumple = "18/6/1986";
  //$estudiante->
  
  //$estudiante->nombre="Juan Peres";
  //$estudiante->estado="AC";
 // $estudiante->
     
    
   // leerClase('Materia');
   // $materia= new Materia();
     //$smarty->assign("materia", $materia);
    //$materia->ids=1;
   //  $materia->nombre="Ingles";
       //$materia->objBuidFromPost();
       //$materia->save();
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    $estudiante->objBuidFromPost();
    $estudiante->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'perfil/registro_Estudiante.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>