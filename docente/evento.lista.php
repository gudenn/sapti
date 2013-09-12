<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php");  

  /** HEADER */
  $smarty->assign('title','SAPTI - Inscripcion de Estudiantes');
  $smarty->assign('description','Formulario de Inscripcion de Estudiantes');
  $smarty->assign('keywords','SAPTI,Estudiantes,Inscripcion');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  $CSS[]  = URL_CSS . "academic/tables.css";
  $CSS[]  = URL_CSS . "academic/evento.edicion.css";
  
   // Agregan el css
  $CSS[]  = URL_JS . "calendar/css/eventCalendar.css";
  $CSS[]  = URL_JS . "calendar/css/eventCalendar_theme.css";

   // Agregan el js
  $JS[]  = URL_JS . "jquery.js";
  $JS[]  = URL_JS . "evento.edicion.js";
  $JS[]  = URL_JS . "jquery.simplemodal.js";
  
  $JS[]  = URL_JS . "calendar/js/jquery.eventCalendar.js";

  $smarty->assign('JS',$JS);
  $smarty->assign('CSS',$CSS);


  $smarty->assign("ERROR", '');

  $docente=  getSessionDocente();
  $docenteid=$docente->id;
    leerClase("Evento");
  leerClase("Pagination");

  $ERROR = '';

  /** HEADER */
  $smarty->assign('title','Lista de Estudiantes');
  $smarty->assign('description','Pagina de Lista de Incritos');
  $smarty->assign('keywords','Gestion,Estudiantes');

  $docente=  getSessionDocente();
  $docenteid=$docente->id;
$sql="SELECT *
FROM evento ev
WHERE ev.dicta_id=4
ORDER BY ev.fecha_evento ASC";
 $resultado = mysql_query($sql);
 $arraylista= array();
 
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
   $arraylista[]=$fila;
 }
  $smarty->assign('arraylista'  , $arraylista);
  $smarty->assign('mascara'     ,'docente/listas.mascara.evento.tpl');
  $smarty->assign('lista'       ,'docente/evento.lista.tpl');
  
  $objs_pg    = new Pagination($resultado, 'g_evento','',false,10);
  $smarty->assign("objs"     ,$arraylista);
  $smarty->assign("pages"    ,$objs_pg->p_pages);
  
  //No hay ERROR
  $smarty->assign("ERROR",'');
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

if (isset($_GET['tlista']) && $_GET['tlista']) //recargamos la tabla central
  $smarty->display('docente/listas.lista.evento.tpl'); 
else
  $smarty->display('docente/docente.3columnas.evento.tpl');

?>