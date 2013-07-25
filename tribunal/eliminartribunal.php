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
  leerClase('Tribunal');
  leerClase("Proyecto");
  leerClase("Usuario");
  leerClase("Docente");
  leerClase("Estudiante");
  leerClase("Formulario");
  leerClase("Pagination");
  leerClase("Filtro");
  leerClase("Proyecto_tribunal");
  leerClase("Proyecto_estudiante");
  
  
 $filtro     = new Filtro('g_docente',__FILE__);
  $docente = new Docente();
  $docente->iniciarFiltro($filtro);
  $filtro_sql = $docente->filtrar($filtro);

  $docente->usuario_id ='%';
  
  $o_string   = $docente->getOrderString($filtro);
  $obj_mysql  = $docente->getAll('',$o_string,$filtro_sql,TRUE,TRUE);
  $objs_pg    = new Pagination($obj_mysql, 'g_docente','',false,10);

  $smarty->assign("filtros"  ,$filtro);
  $smarty->assign("objs"     ,$objs_pg->objs);
  $smarty->assign("pages"    ,$objs_pg->p_pages);
   $proyectostribunales= array();
   
 
   $proyec= new Proyecto();
    //var_dump( $proyec->getProyectoAsignados());
   
   $usuario = new Usuario();
//$smarty->assign('rows', $rows);
 $usuario_mysql  = $usuario->getAll();
 $usuario_id     = array();
 $usuario_nombre = array();
 $sql="SELECT pt.`id` , u.`nombre` ,u.`apellidos`, es.`codigo_sis` , p.`nombre` as nombreproyecto
FROM `proyecto` p , `proyecto_tribunal`  pt , `usuario` u, `estudiante` es , `proyecto_estudiante` pe
WHERE   u.`id`=es.`usuario_id` and  es.`id`=pe.`estudiante_id` and  pe.`proyecto_id`=p.`id` and p.`id`=pt.`proyecto_id`;";
 $resultado = mysql_query($sql);
 $arraytribunal= array();
 
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
  // $arraytribunal=$fila;
   
   //array('name' => $fila["id"], 'home' => $fila["nombre"],'cell' => $fila["apellidos"], 'email' => 'john@myexample.com');
   
   $arraytribunal[]=$fila;
 }


//foreach ()


//var_dump($arraytribunal);
$smarty->assign('arraytribunal'  , $arraytribunal);
 /**
 $resultado = mysql_query($sql);
 while ($fila = mysql_fetch_assoc($resultado)) {
    echo $fila["id"];
    echo $fila["nombre"];
    echo $fila["apellidos"];
}
 
 */
 while ($usuario_mysql && $row = mysql_fetch_array($usuario_mysql[0]))
 {
   $usuario_id[]     = $row['id'];
   $usuario_nombre[] = $row['nombre'];
   $rows=$row;
 }
   
 
   
  
  
  
  
  
  
  
 
 $rows = array();
$usuario = new Usuario();
//$smarty->assign('rows', $rows);
 $usuario_mysql  = $usuario->getAll();
 $usuario_id     = array();
 $usuario_nombre = array();
 while ($usuario_mysql && $row = mysql_fetch_array($usuario_mysql[0]))
 {
   $usuario_id[]     = $row['id'];
   $usuario_nombre[] = $row['nombre'];
   $rows=$row;
 }
// $smarty->assign('filas'  , $rows);
$smarty->assign('usuario_id'  , $usuario_id);
$smarty->assign('usuario_nombre', $usuario_nombre);



//contruyendo el usuario
  

$proyecto= new Proyecto();
$proyecto_sql= $proyecto->getAll();
$proyecto_id= array();
$proyecto_nombre=array();
while ($proyecto_sql && $rows = mysql_fetch_array($proyecto_sql[0]))
 {
   $proyecto_id[]     = $rows['id'];
   $proyecto_nombre[] = $rows['nombre_proyecto'];
 }


$smarty->assign('proyecto_id',$proyecto_id);
$smarty->assign('proyecto_nombre',$proyecto_nombre);
  


  
  //$tribunal = new Tribunal();
  //$smarty->assign("tribunal", $tribunal);
  
  if(isset($_POST['buscar']))
  {
   echo   $_POST['codigosis'];
    $estudiante = new Estudiante(false,$_POST['codigosis']);
    $proyecto   = new Proyecto();
    $proyecto_aux = $estudiante->getProyecto();
    if ($proyecto_aux)
      $proyecto = $proyecto_aux;
    else
    {
      //@todo no tiene proyecto 
      
    }
  
    $usuariobuscado= new Usuario($estudiante->usuario_id);
  //echo  $estudiante->i;
  //  var_dump( $proyecto->getArea());
   // echo $estudiante->codigo_sis;
     $smarty->assign('usuariobuscado',  $usuariobuscado);
    $smarty->assign('estudiantebuscado', $estudiante);
     $smarty->assign('proyectobuscado', $proyecto);
      $smarty->assign('proyectoarea', $proyecto->getArea());
    
    
   // return $proyecto;
    
    //$proyecto->getProyectoAprobados();
    
  //  var_dump($proyecto->getProyectoAprobados());
   // $
   
    
  }
  
  $proyecto_tribunal= new Proyecto_tribunal();
  //$varfdf=$_POST['proyecto_id'];
 // $proyecto_tribunal->proyecto_id=$varfdf;
  //if(isset($_POST['proyecto_id']))
 // echo $_POST['proyecto_id'];
  if(isset($_GET['eliminar']) && isset($_GET['tribunaleliminar_id']) && is_numeric($_GET['tribunaleliminar_id']) )
  {
      echo $_GET['tribunaleliminar_id'];
      
    $proyectotribunals = new Proyecto_tribunal($_GET['tribunaleliminar_id']);
    $proyectotribunals->delete();
   
    $sqlss= "DELETE FROM tribunal WHERE proyecto_tribunal_id=$proyectotribunals->id";
    mysql_query( $sqlss);
    echo "<script>window.location.href='listartribunal.php'</script>";
  }
  
  
  
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
     
     
      $proyecto_tribunal->objBuidFromPost();
      $proyecto_tribunal->estado = Objectbase::STATUS_AC;
      $proyecto_tribunal->save();
    
     if (isset($_POST['ids']))
     foreach ($_POST['ids'] as $id)
     {
       echo $id;
               $tribunal= new Tribunal();
          //     $smarty->assign("tribunal",$tribunal);
             
               $tribunal->usuario_id =$id;
                $tribunal->estado = Objectbase::STATUS_AC;
               $tribunal->proyecto_tribunal_id=$proyecto_tribunal->id;;
                $tribunal->objBuidFromPost();
               $tribunal->save();
     }
   }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'tribunal/listas.lista.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>