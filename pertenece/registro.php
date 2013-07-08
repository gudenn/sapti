<?php

try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title', 'Proyecto Final');
  $smarty->assign('description', 'Proyecto Final');
  $smarty->assign('keywords', 'Proyecto Final');

  //CSS
  $CSS[] = "css/style.css";
  $smarty->assign('CSS', '');

  //JS
  $JS[] = "js/jquery.js";
  $smarty->assign('JS', '');

  //CREAR UN TIPO   DE DEF
  leerClase("Usuario");
  leerClase('Grupo');
  
  
  
  $usuario = new Usuario();
// $tipos->descripcion_tipodefensa = 'Es%';       
  $usuario_mysql = $usuario->getAll();
  $usuario_id = array();
  $usuario_nombre = array();
  while ($usuario_mysql && $row = mysql_fetch_array($usuario_mysql[0])) {
    $usuario_id[] = $row['id'];
    $usuario_nombre[] = $row['nombre'] . $row['apellidos'];
  }
  $smarty->assign('usuario_id', $usuario_id);
  $smarty->assign('usuario_nombre', $usuario_nombre);
  
 
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


  leerClase("Pertenece");
  $pertenece= new Pertenece();
  $pertenece ->estado="AC";
   $pertenece->objBuidFromPost();
    $pertenece->save();
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'grabar') 
   {
    $pertenece->objBuidFromPost();
   $pertenece->save();
    
   
  }



  $smarty->assign("ERROR", $ERROR);


  //No hay ERROR
  $smarty->assign("ERROR", '');
} catch (Exception $e) {
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'pertenece/registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>