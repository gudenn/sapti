<?php
try {
  require('_start.php');
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
  $smarty->assign('mascara'     ,'docente/listas.mascara.tpl');
  $smarty->assign('lista'       ,'docente/observacion.lista.tpl');

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
  $smarty->assign("objs"     ,$objs_pg->objs);
  $smarty->assign("pages"    ,$objs_pg->p_pages);




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
  $smarty->display('docente/full-width1.tpl');


?>