<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;

//  if(!isAdminSession())
//    header("Location: login.php");

  leerClase("Estudiante");
  leerClase("Usuario");
  leerClase("Docente");
  leerClase("Proyecto");
  leerClase("Formulario");
  leerClase("Pagination");
  leerClase("Filtro");


  $ERROR = '';

  /** HEADER */
  $smarty->assign('title','Lista de Estudiantes');
  $smarty->assign('description','Pagina de Lista de Incritos');
  $smarty->assign('keywords','Gestion,Estudiantes');

  //CSS
  $CSS[]  = URL_CSS . "academic/tables.css";
  //$CSS[]  = URL_CSS . "pg.css";
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.js";
  $smarty->assign('JS',$JS);

  $docente=  getSessionDocente();
  $docenteid=$docente->id;
$sql="SELECT es.id as 'id', us.nombre as 'nombre', us.apellidos as 'apellidos', pr.nombre as 'nombrep', pr.id as 'id_pr', it.evaluacion_id as 'eva'
FROM docente dt, dicta di, materia ma, estudiante es, usuario us, inscrito it, proyecto pr, proyecto_estudiante pe
WHERE dt.id='".$docenteid."'
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
  $smarty->assign('arraylista'  , $arraylista);
  $smarty->assign('mascara'     ,'docente/listas.mascara.tpl');
  $smarty->assign('lista'       ,'docente/estudiante.lista.tpl');

//Filtro
  $filtro     = new Filtro('g_docente',__FILE__);
  $estudiante = new Estudiante();
  $estudiante->iniciarFiltro($filtro);
  $filtro_sql = $estudiante->filtrar($filtro);

  $estudiante->usuario_id = '%';
  
  $o_string   = $estudiante->getOrderString($filtro);
  $obj_mysql  = $estudiante->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  //$objs_pg    = new Pagination($obj_mysql, 'g_docente','',false,10);

  $smarty->assign("filtros"  ,$filtro);
  //$smarty->assign("objs"     ,$objs_pg->objs);
  $smarty->assign("objs"     ,$arraylista);
  //$smarty->assign("pages"    ,$objs_pg->p_pages);




  //No hay ERROR
  $smarty->assign("ERROR",'');
  $smarty->assign("URL",URL);  

}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

if (isset($_GET['tlista']) && $_GET['tlista']) //recargamos la tabla central
  $smarty->display('docente/listas.lista.tpl'); 
else
  $smarty->display('docente/full-width.lista.tpl');


?>