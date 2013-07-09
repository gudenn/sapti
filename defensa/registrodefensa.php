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
  leerClase('Defensa');
  
  $defensa = new Defensa();
  $smarty->assign("defensa", $defensa);
  $defensa-> proyecto_id=1;
  $defensa-> tipo_defensa_id=1;
  $defensa->fecha_asignacion= date("Y-m-d");
  $defensa->hora_asignacion= time();
  $defensa->fecha_defensa="18/6/1986";
  $defensa->hora_defensa="9:00";
  /**
  $sql = 'select id, nombre_proyecto from proyecto order by id';
$smarty->assign('types',getAssoc($sql));

$sql = 'select id, nombre_proyecto    from proyecto ';
$smarty->assign('contact',getRow($sql));
  */
$smarty->assign('cust_ids', array(1000,1001,1002,1003));
$smarty->assign('cust_names', array( 'Joe Schmoe','Jack Smith','Jane Johnson','Charlie Brown'));
$smarty->assign('customer_id', 1001);
// $estudiante->fecha_cumple = "18/6/1986";
 
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    $defensa->objBuidFromPost();
    $defensa->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'defensa/registrodefensa.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>