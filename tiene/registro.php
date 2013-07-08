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
  leerClase("Tiene");
  
 leerClase("Grupo");
  leerClase('Privilegio');
 
  $grupo = new Grupo();
  $grupo_sql = $grupo->getAll();
  $grupo_id = array();

  $grupo_nombre = array();
  while ($grupo_sql && $rows = mysql_fetch_array($grupo_sql[0])) {
     $grupo_id[] = $rows['id'];
     $grupo_nombre[] = $rows['nombre_grupo'];
  }


  $smarty->assign('grupo_id', $grupo_id);
  $smarty->assign('grupo_nombre', $grupo_nombre);






  $privilegio = new Privilegio();
// $tipos->descripcion_tipodefensa = 'Es%';       
  $privilegio_mysql = $privilegio->getAll();
  $privilegio_id = array();
  $privilegio_nombre = array();
  while ($privilegio_mysql && $row = mysql_fetch_array($privilegio_mysql[0])) {
    $privilegio_id[] = $row['id'];
    $privilegio_nombre[] = $row['nombre_privilegio'];
  }
  $smarty->assign('privilegio_id', $privilegio_id);
  $smarty->assign('privilegio_nombre', $privilegio_nombre);

  $tiene= new Tiene();
  $tiene->grupo_id=9;
 $tiene->pivilegio_id=9;
 
   $tiene->objBuidFromPost();
    $tiene->save();
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    $tiene->objBuidFromPost();
   $tiene->save();
  }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'tiene/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>