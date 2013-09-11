<?php
try {
  require('_start.php');
  if(!isEstudianteSession())
    header("Location: ../login.php");  

  /** HEADER */
  $smarty->assign('title','Registro Observaciones');
  $smarty->assign('description','Formulario de Registro de Observaciones');
  $smarty->assign('keywords','SAPTI,Observaciones,Registro');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
 
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";

  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";

  $smarty->assign('JS',$JS);


  $smarty->assign("ERROR", '');


  //CREAR UN ESTUDIANTE
  leerClase('Filtro');
  leerClase('Usuario');
  leerClase('Estudiante');
  leerClase('Proyecto');
  leerClase('Revision');
  leerClase('Pagination');
  leerClase('Observacion');
  
  /**
   * Menu superior
   */
  $menuList[]     = array('url'=>URL.Estudiante::URL,'name'=>'Estudiante');
  $menuList[]     = array('url'=>URL.Estudiante::URL.Proyecto::URL,'name'=>'Proyecto Final');
  $menuList[]     = array('url'=>URL.Estudiante::URL.Proyecto::URL.__FILE__,'name'=>'Detalle de Correcciones');
  $smarty->assign("menuList", $menuList);

  
  $estudiante_aux = getSessionEstudiante();
  $estudiante     = new Estudiante($estudiante_aux->estudiante_id);
  $usuario        = $estudiante->getUsuario();
  $proyecto       = $estudiante->getProyecto();
  
  $smarty->assign("estudiante", $estudiante);
  $smarty->assign("usuario", $usuario);
  $smarty->assign("proyecto", $proyecto);
  $smarty->assign("ERROR", $ERROR);

  $_SESSION['revision_id'] = (isset($_SESSION['revision_id']))?$_SESSION['revision_id']:'';
  if ( isset($_GET['revision_id']) && is_numeric($_GET['revision_id']) )
    $_SESSION['revision_id'] = $_GET['revision_id'];

  $revision       = new Revision($_SESSION['revision_id']);
  $observacion    = new Observacion();
  //Filtro
  $filtro   = new Filtro('e_observacion',__FILE__);
  $observacion->iniciarFiltro($filtro);
  $filtro_sql   = $observacion->filtrar($filtro);
  $observacion->revision_id = $revision->id;
  
  
  $o_string   = $observacion->getOrderString($filtro);
  $obj_mysql  = $observacion->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  $objs_pg    = new Pagination($obj_mysql, 'e_observacion','',false,10);

  $smarty->assign("filtros"  ,$filtro);
  $smarty->assign("objs"     ,$objs_pg->objs);
  $smarty->assign("pages"    ,$objs_pg->p_pages);


  $smarty->assign('mascara'     ,'estudiante/listas.mascara.tpl');
  $smarty->assign('lista'       ,'estudiante/observacion.lista.tpl');


  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

if (isset($_GET['tlista']) && $_GET['tlista']) //recargamos la tabla central
  $smarty->display('estudiante/listas.lista.tpl'); 
else
  $smarty->display('estudiante/full-width.lista.correcion.tpl');


?>