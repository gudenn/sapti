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
  leerClase('Tribunal');
  leerClase("Proyecto");
  leerClase("Usuario");
  leerClase("Docente");
  leerClase("Estudiante");
  leerClase("Formulario");
  leerClase("Pagination");
  leerClase("Filtro");
  leerClase("Proyecto_tribunal");
  leerClase("Proyecto_estudiante");
  leerClase("Notificacion");
  leerClase("Notificacion_tribunal");
  
  
  
  $sqllt=  "select u.`nombre`, u.`apellidos`, p.`nombre` as nombreproyecto, d.`fecha_defensa`, l.`nombre` as nombrelugar, td.`nombre` as tiponombre
from `usuario` u, estudiante e, proyecto p, `proyecto_estudiante` pe, `proyecto_tribunal` pt, `defensa` d , `lugar` l, `tipo_defensa` td
where u.`id`=e.`usuario_id` and e.`id`=pe.`estudiante_id` and p.`id`=pe.`proyecto_id` and p.`id`=pt.`proyecto_id` and pt.`id`=d.`proyecto_tribunal_id` and d.`lugar_id`=l.`id` and d.`tipo_defensa_id`=td.`id`;";

$resultados = mysql_query($sqllt);
 $listadefensas= array();
 
 while ($filas = mysql_fetch_array($resultados, MYSQL_ASSOC))
 { 
    $listadefensas[]=$filas;
 }
      
      $smarty->assign('listadefensas'  , $listadefensas);
  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'index.academic.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>