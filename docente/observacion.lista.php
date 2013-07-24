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
  $JS[]  = URL_JS . "jquery.js";
  $smarty->assign('JS',$JS);

  
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  if (isset($_GET['eliminar']) && isset($_GET['revisiones_id']) && is_numeric($_GET['revisiones_id']) )
  {
    $revision    = new Revision($_GET['revisiones_id']);
    $resul = "select id from observacion where revision_id =".$_GET['revisiones_id']." ";
    $sql=mysql_query($resul);
    $a=0;
    $sql1=array();
  while($res=mysql_fetch_row($sql)) {
      $sql1[$a]=$res[0];
      $a=$a+1;
    }
    foreach ($sql1 as $array1){
    $observacion = new Observacion($array1);
    $observacion->delete();
    }
    $revision->delete();
  }

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
  
    $sql1="SELECT re.id as 'id_re', pr.nombre as 'nombrep', pr.id as 'id_pr', re.fecha_revision as 'fecha', COUNT(ob.revision_id) as num
FROM proyecto pr, revision re, observacion ob
WHERE pr.id='".$proyecto_ids."'
AND re.proyecto_id=pr.id
AND re.id=ob.revision_id
GROUP BY ob.revision_id";
 $resultado1 = mysql_query($sql1);
 $arraylista1= array();
 while ($fila1 = mysql_fetch_array($resultado1, MYSQL_ASSOC)) {
   $arraylista1[]=$fila1;
 }

//Filtro
  $filtro   = new Filtro('g_revision',__FILE__);
  $revision = new Revision();
  $revision->iniciarFiltro($filtro);
  $filtro_sql = $revision->filtrar($filtro);
  $revision->id = '%';
  
  $o_string   = $revision->getOrderString($filtro);
  $obj_mysql  = $revision->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  $objs_pg    = new Pagination($obj_mysql, 'g_estudiante','',false,10);

  $smarty->assign("filtros"  ,$filtro);
  $smarty->assign("objs"     ,$arraylista1);
  $smarty->assign("pages"    ,$objs_pg->p_pages);


  $smarty->assign('mascara'     ,'docente/listas.mascara.tpl');
  $smarty->assign('lista'       ,'docente/observacion.lista.tpl');

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
  $smarty->display('docente/full-width.lista.observacion.tpl');


?>