<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
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

  //Validation
  $JS[]  = URL_JS . "validate/idiomas/jquery.validationEngine-es.js";
  $JS[]  = URL_JS . "validate/jquery.validationEngine.js";

  $smarty->assign('JS',$JS);
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
  


  $proyecto_tribunal= new Proyecto_tribunal();
   
  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
  
       echo $_POST['proyecto_tribunal_id'];
     
    
       
       $sqlls="SELECT t.id as llaveid FROM tribunal t WHERE  t.proyecto_tribunal_id=".$_POST['proyecto_tribunal_id'].";";
      $resultadoff = mysql_query($sqlls);

 $contador=0;
 
    foreach ($_POST['ids'] as $id)
     {
      echo $id;
              
     }
 
 while ($filas = mysql_fetch_array($resultadoff, MYSQL_ASSOC))
    { 
   if (isset($_POST['ids']))
   {
     echo $filas['llaveid'];
  $tribunalesw= new Tribunal((int)$filas['llaveid']);
  $tribunalesw->proyecto_tribunal_id=$_POST['proyecto_tribunal_id'];
  $tribunalesw->docente_id =$_POST['ids'][$contador];
  $tribunalesw->archivo="";
  $tribunalesw->accion="";
  $tribunalesw->estado = Objectbase::STATUS_AC;
  $tribunalesw->save();
   }
$contador++;
   }      
 //echo "<script>window.location.href='listatribunaleditar.php'</script>";
    
   }






  
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
     
     
       
  $sqlr="SELECT  d.`id`, u.`nombre`,u.`apellidos`
FROM  `usuario` u ,`docente` d
WHERE  u.`id`=d.`usuario_id` and u.`estado`='AC' and   d.id not in(
select dd.`id`
from  `proyecto` p, `proyecto_tribunal` pt,  `tribunal` t ,`docente` dd
where p.`id`=pt.`proyecto_id` and pt.`id`=t.`proyecto_tribunal_id` and t.`docente_id`=dd.`id` and pt.`id`=".$_GET['tribunaleditar_id'].");";
 $resultado = mysql_query($sqlr);
 $arraytribunal= array();
 
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
         { 
   
   
   
        $listaareas=array();
        $lista_areas=array();
        $lista_areas[] = $fila["id"];
        $lista_areas[] =  $fila["nombre"];
        $lista_areas[] =  $fila["apellidos"];
 
 
$sqla="select  a.`nombre`
from `docente` d , `apoyo` ap , `area` a
where  d.`id`=ap.`docente_id` and a.`id`=ap.`area_id` and d.`estado`='AC' and ap.`estado`='AC' and a.`estado`='AC'and d.`id`=".$fila["id"];
 $resultadoa = mysql_query($sqla);
 
  while ($filas = mysql_fetch_array($resultadoa, MYSQL_ASSOC)) 
  {
     $listaareas[]=$filas;
  }
  $lista_areas[]=$listaareas;
  $arraytribunal[]= $lista_areas;
 }
 $smarty->assign('listadocentes'  , $arraytribunal);
  
     
     //////////////////////////seleccionados////////////////////
   $sqlselec="SELECT  d.`id`, u.`nombre`,u.`apellidos`
FROM  `usuario` u ,`docente` d
WHERE  u.`id`=d.`usuario_id` and u.`estado`='AC' and   d.id  in(
select dd.`id`
from  `proyecto` p, `proyecto_tribunal` pt,  `tribunal` t ,`docente` dd
where p.`id`=pt.`proyecto_id` and pt.`id`=t.`proyecto_tribunal_id` and t.`docente_id`=dd.`id` and pt.`id`=".$_GET['tribunaleditar_id'].");";
 $resultadoselect = mysql_query($sqlselec);
 $arraytribunalselec= array();
 
 while ($filaselec = mysql_fetch_array($resultadoselect, MYSQL_ASSOC)) 
         { 
   
   
   
        $listaareas=array();
        $lista_areas=array();
        $lista_areas[] = $filaselec["id"];
        $lista_areas[] =  $filaselec["nombre"];
        $lista_areas[] =  $filaselec["apellidos"];
 
 
$sqla="select  a.`nombre`
from `docente` d , `apoyo` ap , `area` a
where  d.`id`=ap.`docente_id` and a.`id`=ap.`area_id` and d.`estado`='AC' and ap.`estado`='AC' and a.`estado`='AC'and d.`id`=".$filaselec["id"];
 $resultadoa = mysql_query($sqla);
 
  while ($filas = mysql_fetch_array($resultadoa, MYSQL_ASSOC)) 
  {
     $listaareas[]=$filas;
  }
  $lista_areas[]=$listaareas;
  $arraytribunalselec[]= $lista_areas;
 }
 $smarty->assign('listadocenteselec'  , $arraytribunalselec);
 $smarty->assign('idproyectotribunal'  , $_GET['tribunaleditar_id']);
     
 
      
 
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
    //  echo $proyectotribunals->proyecto_id;
      
     $proyectos= new Proyecto($proyectotribunals->proyecto_id);

     $smarty->assign('proyectotribunals', $proyectotribunals);
     $smarty->assign('proyectoarea', $proyecto->getArea());
      
      
  }
  
  

  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
$contenido = 'tribunal/editartribunal.tpl';
  $smarty->assign('contenido',$contenido);


$TEMPLATE_TOSHOW = 'tribunal/tribunal.3columnas.tpl';
//$TEMPLATE_TOSHOW = 'tribunal/editartribunal.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>