<?php
try {
  require('_start.php');
  if(!isEstudianteSession())
    header("Location: ../login.php");  

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = URL_CSS . "dashboard.css";
  $CSS[]  = URL_CSS . "academic/3_column.css";
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');

  // Escritorio del estuddinate
  leerClase('Usuario');
  leerClase('Estudiante');
  
  $estudiante_aux = getSessionEstudiante();
  $estudiante     = new Estudiante($estudiante_aux->estudiante_id);
  $usuario        = $estudiante->getUsuario();
  $proyecto       = $estudiante->getProyecto();
  
  /**
   * Menu superior
   */
  $menuList[]     = array('url'=>URL.Estudiante::URL,'name'=>'Estudiante');
  $menuList[]     = array('url'=>URL.Estudiante::URL.Proyecto::URL,'name'=>'Proyecto Final');
  $smarty->assign("menuList", $menuList);

  
  
  $smarty->assign("columnacentro", 'estudiante/index.proyecto-final.tpl');
  
  $smarty->assign("estudiante", $estudiante);
  $smarty->assign("usuario", $usuario);
  $smarty->assign("proyecto", $proyecto);
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'estudiante/estudiante.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>