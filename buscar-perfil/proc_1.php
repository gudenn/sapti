<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = "css/style.css";
  $smarty->assign('CSS','');

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');

  //CREAR UN TIPO   DE DEF
  
  
  
 
 $q=$_POST[q];
  
  $sqlr="SELECT p.numero, p.id, u.nombre, p.titulo, p.gestionaprobacion, u.apellidos
FROM estudiante e, perfilregistro p, usuario u
WHERE p.estudiante_id = e.id
AND e.usuario_id = u.id
AND (
p.titulo LIKE  '%$q%'
OR u.nombre LIKE  '%$q%' OR u.apellidos LIKE  '%$q%' OR p.numero LIKE  '%$q%' OR p.gestionaprobacion LIKE  '%$q%'
);";
 $resultado = mysql_query($sqlr);
 $arraytribunal= array();
  
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
 {
  // $arraytribunal=$fila;
   
   //array('name' => $fila["id"], 'home' => $fila["nombre"],'cell' => $fila["apellidos"], 'email' => 'john@myexample.com');
   
   $arraytribunal[]=$fila;
 }
 
 $obj_mysql  = $arraytribunal;
 // $objs_pg    = new Pagination($obj_mysql, 'g_cambios','',false,10);
 $smarty->assign('listadocentes'  , $arraytribunal);
 //$smarty->assign("objs"     ,$objs_pg->objs);
 //$smarty->assign("pages"    ,$objs_pg->p_pages);
  
 

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'buscarperfil/listabusqueda.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>