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
  $smarty->assign('title','Gestion de Usuarios');
  $smarty->assign('description','Pagina de gestion de Usuarios');
  $smarty->assign('keywords','Gestion,Usuarios');

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
  if (isset($_GET['eliminar']) && isset($_GET['estudiante_id']) && is_numeric($_GET['estudiante_id']) )
  {
    $estudiante = new Estudiante($_GET['estudiante_id']);
    $usaurio    = new Usuario($estudiante->usuario_id);
    $usaurio->delete();
    $estudiante->delete();
  }

  $smarty->assign('mascara'     ,'docente/listas.mascara.tpl');
  $smarty->assign('lista'       ,'docente/observacion.lista.tpl');

  //Filtro
  $filtro     = new Filtro('g_estudiante',__FILE__);
  $revision = new Revision();
  $revision->iniciarFiltro($filtro);
  $filtro_sql = $revision->filtrar($filtro);

  $revision->revisor = '%';
  
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