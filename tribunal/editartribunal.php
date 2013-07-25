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
    var_dump( $proyecto->getArea());
   // echo $estudiante->codigo_sis;
     $smarty->assign('usuariobuscado',  $usuariobuscado);
    $smarty->assign('estudiantebuscado', $estudiante);
     $smarty->assign('proyectobuscado', $proyecto);
      $smarty->assign('proyectoarea', $proyecto->getArea());
    
    
  }
 // editar&tribunaleditar_id
   if(isset($_GET['editar']) && isset($_GET['tribunaleditar_id']) && is_numeric($_GET['tribunaleditar_id']) )
  {
     
     // echo $_GET['tribunaleditar_id'];
     // echo "hola eli";
      
    $sqll=  "SELECT u.nombre , u.apellidos , e.codigo_sis , p.nombre as nombreproyecto
FROM  usuario u , estudiante e , proyecto_estudiante pe , proyecto p, proyecto_tribunal pt
WHERE u.id= e.usuario_id and e.id=pe.estudiante_id and p.id= pe.proyecto_id and p.id=pt.proyecto_id and pt.id=".$_GET['tribunaleditar_id'];

$resultado = mysql_query($sqll);
 $arraytribunaldatos= array();
 
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC))
 { 
   $arraytribunaldatos[]=$fila;
 }
      
      $smarty->assign('arraytribunaldatos'  , $arraytribunaldatos);
      
      
      
      $proyectotribunals=new Proyecto_tribunal($_GET['tribunaleditar_id']);
      echo $proyectotribunals->proyecto_id;
      
      $proyectos= new Proyecto($proyectotribunals->proyecto_id);

     $smarty->assign('proyectotribunals', $proyectotribunals);
      $smarty->assign('proyectoarea', $proyecto->getArea());
  }
  
  
  $proyecto_tribunal= new Proyecto_tribunal();
  //$varfdf=$_POST['proyecto_id'];
 // $proyecto_tribunal->proyecto_id=$varfdf;
  //if(isset($_POST['proyecto_id']))
 // echo $_POST['proyecto_id'];
   
  
  
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'Guardar' )
  {
     
     //if(isset($_POST['mensaje']))
       echo $_POST['codigo'];
    
       $sqlls="SELECT t.id as llaveid FROM tribunal t WHERE  t.proyecto_tribunal_id=".$_POST['codigo'].";";
      $resultadoff = mysql_query($sqlls);

 $contador=0;
 while ($filas = mysql_fetch_array($resultadoff, MYSQL_ASSOC))
 { 
   if (isset($_POST['ids']))
   {
  $tribunalesw= new Tribunal((int)$filas['llaveid']);
  $tribunalesw->usuario_id =$_POST['ids'][$contador];
$tribunalesw->estado = Objectbase::STATUS_AC;
$tribunalesw->proyecto_tribunal_id=$_POST['codigo'];
            
 $tribunalesw->save();
   }
$contador++;
    }
    
    
     
     
 echo "<script>window.location.href='listatribunaleditar.php'</script>";
     
   }

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'tribunal/editartribunal.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>