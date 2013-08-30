<?php
try {
  require('_start.php');
    if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;

//  if(!isAdminSession())
//    header("Location: login.php");

  leerClase("Revision");
  leerClase("Observacion");
  leerClase("Formulario");
  leerClase("Pagination");
  leerClase("Filtro");


  $ERROR = '';

  /** HEADER */
  $smarty->assign('title','Gestion de Observaciones');
  $smarty->assign('description','Pagina de gestion de Observaciones');
  $smarty->assign('keywords','Gestion,Observaciones');

  //CSS
  $CSS[]  = URL_CSS . "academic/tables.css";
  //$CSS[]  = URL_CSS . "pg.css";
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";

  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";

  //Validation
  $JS[]  = URL_JS . "validate/idiomas/jquery.validationEngine-es.js";
  $JS[]  = URL_JS . "validate/jquery.validationEngine.js";
  $JS[]  = URL_JS . "jquery.addfield.js";
  
  $smarty->assign('JS',$JS);

  
  $proyecto_ids = $_GET['proyecto_id'];
  $docente=  getSessionDocente();
  $docente_ids=$docente->id;
  
    $sql="SELECT es.id as 'id', us.nombre as 'nombre', us.apellidos as 'apellidos', pr.nombre as 'nombrep', pr.id as 'id_pr'
FROM docente dt, dicta di, materia ma, estudiante es, usuario us, inscrito it, proyecto pr, proyecto_estudiante pe
WHERE dt.id='".$docente_ids."'
AND pr.id='".$proyecto_ids."'
AND di.docente_id=dt.id 
AND es.usuario_id=us.id
AND it.dicta_id=di.id
AND it.estudiante_id=es.id
AND es.id=pe.estudiante_id
AND pe.proyecto_id=pr.id;";
 $resultado = mysql_query($sql);
 $arraylista= array();
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
   $arraylista[]=$fila;
 }
    $nombre_n=$arraylista[0]['nombre'];
    $nombre_a=$arraylista[0]['apellidos'];
    $es=' ';
    $nombre_es=$nombre_n.$es.$nombre_a;
    $nombre_pr=$arraylista[0]['nombrep']; 
    
    $smarty->assign("nombre_es", $nombre_es);
    $smarty->assign("nombre_pr", $nombre_pr);
    $smarty->assign("docente_ids", $docente_ids);
  
  //No hay ERROR
  $smarty->assign("ERROR",'');
  $smarty->assign("URL",URL);  
}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
$TEMPLATE_TOSHOW = 'docente/full-width.lista.evaluacion-editar.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>