<?php
try {
  require('_start.php');
  if(!isEstudianteSession())
    header("Location: ../login.php");  

  leerClase("Estudiante");
  leerClase("Usuario");
  leerClase("Avance");
  leerClase("Formulario");
  leerClase("Proyecto");
  leerClase("Pagination");
  leerClase("Filtro");


  $ERROR = '';

  /** HEADER */
  $smarty->assign('title','Gesti&oacute;n de Avances');
  $smarty->assign('description','Pagina de gestion de Avances');
  $smarty->assign('keywords','Gestion,Avances');

  //CSS
  $CSS[]  = URL_CSS . "academic/tables.css";
  //$CSS[]  = URL_CSS . "pg.css";
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.js";
  $smarty->assign('JS',$JS);

  /**
   * Menu superior
   */
  $menuList[]     = array('url'=>URL.Estudiante::URL,'name'=>'Estudiante');
  $menuList[]     = array('url'=>URL.Estudiante::URL.Proyecto::URL,'name'=>'Proyecto Final');
  $menuList[]     = array('url'=>URL.Estudiante::URL.Proyecto::URL.basename(__FILE__),'name'=>'Archivo de Avances');
  $smarty->assign("menuList", $menuList);

  
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////

  $estudiante_aux = getSessionEstudiante();
  $estudiante     = new Estudiante($estudiante_aux->estudiante_id);
  $usuario        = $estudiante->getUsuario();
  $proyecto       = $estudiante->getProyecto();
  
  $smarty->assign("estudiante", $estudiante);
  $smarty->assign("usuario", $usuario);
  $smarty->assign("proyecto", $proyecto);
  $smarty->assign("ERROR", $ERROR);
  
  
  //Filtro
  $filtro   = new Filtro('e_avances',__FILE__);
  $avance   = new Avance();
  $smarty->assign("avance", $avance);
  
  
  $avance->iniciarFiltro($filtro);
  $filtro_sql   = $avance->filtrar($filtro);
  $avance->proyecto_id = $proyecto->id;
  
  $o_string   = $avance->getOrderString($filtro);
  $obj_mysql  = $avance->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  $objs_pg    = new Pagination($obj_mysql, 'e_avances','',false,10);

  $smarty->assign("filtros"  ,$filtro);
  //var_dump($objs_pg->objs);
  $smarty->assign("objs"     ,$objs_pg->objs);
  $smarty->assign("pages"    ,$objs_pg->p_pages);

  $smarty->assign('mascara'     ,'estudiante/listas.mascara.tpl');
  $smarty->assign('lista'       ,'estudiante/avance.lista.tpl');

  //No hay ERROR
  $smarty->assign("ERROR",'');
  $smarty->assign("URL",URL);  

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