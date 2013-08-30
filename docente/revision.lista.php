<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;

//  if(!isAdminSession())
//    header("Location: login.php");

  leerClase("Evaluacion");
    leerClase("Revision");
  leerClase("Formulario");
  leerClase("Pagination");
  leerClase("Filtro");


  $ERROR = '';

  /** HEADER */
  $smarty->assign('title','Gestion de Observaciones');
  $smarty->assign('description','Pagina de gestion de Observaciones');
  $smarty->assign('keywords','Gestion,Observaciones');

  $CSS[]  = URL_CSS . "academic/3_column.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
  
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";

  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";

  //Validation
  $JS[]  = URL_JS . "validate/idiomas/jquery.validationEngine-es.js";
  $JS[]  = URL_JS . "validate/jquery.validationEngine.js";

  $smarty->assign('JS',$JS);
  $smarty->assign("ERROR", '');
  
  function array_recibe($url_array) { 
     $tmp = stripslashes($url_array); 
     $tmp = urldecode($tmp); 
     $tmp = unserialize($tmp); 
    return $tmp; 
  };
    $array=$_GET['array']; 
    $array=array_recibe($array);
    
  $proyecto_ids = $array['id_pr'];
  $docente=  getSessionDocente();
  $docente_ids=$docente->id;
  
    $nombre_n=$array['nombre'];
    $nombre_a=$array['apellidos'];
    $es=' ';
    $nombre_es=$nombre_n.$es.$nombre_a;
    $nombre_pr=$array['nombrep']; 
    
    $smarty->assign("nombre_es", $nombre_es);
    $smarty->assign("nombre_pr", $nombre_pr);
    
    $sql1="SELECT re.id as 'id_re', pr.nombre as 'nombrep', pr.id as 'id_pr', re.fecha_revision as 'fecha', COUNT(ob.revision_id) as num
FROM proyecto pr, revision re, observacion ob
WHERE pr.id='".$proyecto_ids."'
AND re.proyecto_id=pr.id
AND re.id=ob.revision_id
GROUP BY ob.revision_id";
 $resultado1 = mysql_query($sql1);
while ($fila1 = mysql_fetch_array($resultado1, MYSQL_ASSOC)) {
   $arraylista1[]=$fila1;
 }
 
  $objs_pg    = new Pagination($resultado1, 'g_estudiante','',false,10);

  $smarty->assign("objs"     ,$arraylista1);
  $smarty->assign("array"     ,$array);
  $smarty->assign("pages"    ,$objs_pg->p_pages);
  
  $token = sha1(URL . time());
  $_SESSION['register'] = $token;
  $smarty->assign('token',$token);
  
  $smarty->assign('mascara'     ,'docente/listas.mascara.tpl');
  $smarty->assign('lista'       ,'docente/revision.proyecto.tpl');

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
  $smarty->display('docente/full-width.revision.tpl');


?>