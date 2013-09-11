<?php
try {
  require('_start.php');
  if(!isTutorSession())
    header("Location: ../login.php");  

  leerClase("Tutor");
  leerClase("Usuario");
  leerClase("Revision");
  leerClase("Observacion");
  leerClase("Formulario");
  leerClase("Pagination");
  leerClase("Filtro");


  $ERROR = '';

  /** HEADER */
  $smarty->assign('title','Gesti&oacute;n de Correciones');
  $smarty->assign('description','Pagina de gestion de Correciones');
  $smarty->assign('keywords','Gestion,Correciones');

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

  $tutor_aux = getSessionTutor();
  $tutor     = new Tutor($tutor_aux->tutor_id);
  $usuario        = $tutor->getUsuario();
  $proyecto       = $tutor->getProyectos();
  
  $smarty->assign("tutor", $tutor);
  $smarty->assign("usuario", $usuario);
 // $smarty->assign("proyecto", $proyecto);
  $smarty->assign("ERROR", $ERROR);
  
          $sql = '
      SELECT  u.nombre, u.apellidos, p.nombre as nombreproyecto, p.modalidad, a.nombre as nombrearea,
              sub.nombre nombresub
       FROM `usuario` u , `estudiante`  e, `proyecto_estudiante` pe, `proyecto` p,
             `area` a, `sub_area` sub , `tutor` t, `proyecto_tutor` pt
       WHERE   u.`id`= e.`usuario_id` and
               e.`id`=pe.`estudiante_id` and
               pe.`proyecto_id`=p.`id` AND

               t.`id`=1 and
               pt.`tutor_id`=t.`id`;';
        
        $resultado = mysql_query($sql);
  
//Filtro
  $filtro   = new Filtro('e_revision',__FILE__);
  $revision = new Revision();
  $revision->iniciarFiltro($filtro);
  $filtro_sql   = $revision->filtrar($filtro);
  $revision->proyecto_id = $proyecto->id;
  
  $o_string   = $revision->getOrderString($filtro);
  $obj_mysql  = $revision->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  $objs_pg    = new Pagination($resultado, 'e_revision','',false,10);

  $smarty->assign("filtros"  ,$filtro);
  $smarty->assign("pages"    ,$objs_pg->p_pages);
  $smarty->assign("objss", $proyecto);


  $smarty->assign('mascara'     ,'tutor/mascara.tpl');
  $smarty->assign('lista'       ,'tutor/observacion.lista.tpl');

  //No hay ERROR
  $smarty->assign("ERROR",'');
  $smarty->assign("URL",URL);  

}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

if (isset($_GET['tlista']) && $_GET['tlista']) //recargamos la tabla central
  $smarty->display('tutor/listas.lista.tpl'); 
else
  $smarty->display('tutor/full-width.lista.correcion.tpl');


?>