<?php
try {
  require('_start.php');
 
  
  //MODULO -> REGISTRO DE MERCADERIA
  //ACCION -> GESTION
  

  
  
  
  
  leerClase("Usuario");
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


  $smarty->assign('mascara'     ,'perfil/listas.mascara.tpl');
  $smarty->assign('lista'       ,'perfil/usuario.lista.tpl');

  //Filtro
  $filtro     = new Filtro('usuario',__FILE__);
  $usuario = new Usuario();
  $usuario->iniciarFiltro($filtro);
  $filtro_sql = $usuario->filtrar($filtro);

  /*
  $usuario->pais_id         = '%';
  $usuario->departamento_id = '%';
  $usuario->ciudad_id       = '%';
*/
  
  $o_string   = $usuario->getOrderString($filtro);
  $obj_mysql  = $usuario->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  $objs_pg    = new Pagination($obj_mysql, 'usuario','',false,10);


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
  $smarty->display('perfil/listas.lista.tpl'); 
else
  $smarty->display('perfil/full-width.tpl');


?>