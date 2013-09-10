<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

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
  leerClase("Notificacion");
 leerClase("Notificacion_tribunal");
 
  
  
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
 
  
  $sqlr="SELECT  d.`id`, u.`nombre`,u.`apellidos`
FROM  `usuario` u ,`docente` d 
WHERE  u.`id`=d.`usuario_id` and u.`estado`='AC';";
 $resultado = mysql_query($sqlr);
 $arraytribunal= array();
  $smarty->assign('contacts', array(
                             array('phone' => '1',
                                   'fax' => '2',
                                   'cell' => '3'),
                             array('phone' => '555-4444',
                                   'fax' => '555-3333',
                                   'cell' => '760-1234')
                             ));
 
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
$smarty->assign('usuario_id'     , $usuario_id);
$smarty->assign('usuario_nombre' , $usuario_nombre);



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


$smarty->assign('proyecto_id'     ,$proyecto_id);
$smarty->assign('proyecto_nombre' ,$proyecto_nombre);
$smarty->assign('nombrearea' ,"Redes");
  


  
  //$tribunal = new Tribunal();
  //$smarty->assign("tribunal", $tribunal);


$contenido = 'tribunal/registrotribunal.tpl';
  $smarty->assign('contenido',$contenido);
  
  if(isset($_POST['buscar']))
  {
   echo   $_POST['codigosis'];
    $estudiante   = new Estudiante(false,$_POST['codigosis']);
    $proyecto     = new Proyecto();
    $proyecto_aux = $estudiante->getProyecto();
    if ($proyecto_aux)
      $proyecto = $proyecto_aux;
    else
    {
      //@todo no tiene proyecto 
       echo "<script>alert('El Estudiante no Tiene Proyecto');</script>";
      
    }
  
   $usuariobuscado= new Usuario($estudiante->usuario_id);
   $smarty->assign('usuariobuscado',  $usuariobuscado);
   $smarty->assign('estudiantebuscado', $estudiante);
   $smarty->assign('proyectobuscado', $proyecto);
   $smarty->assign('proyectoarea', $proyecto->getArea());
    
  }
  
  
 
   if ( isset($_POST['manual']))
   {
     echo "Hola eli";
     echo   $_POST['estudiante_id'];
     
    $estudiante   = new Estudiante(false,$_POST['estudiante_id']);
    $proyecto     = new Proyecto();
    $proyecto_aux = $estudiante->getProyecto();
    if ($proyecto_aux)
      $proyecto = $proyecto_aux;
    else
    {
      //@todo no tiene proyecto 
       echo "<script>alert('El Estudiante no Tiene Proyecto');</script>";
      
    }
  
   $usuariobuscado= new Usuario($estudiante->usuario_id);
   $smarty->assign('usuariobuscado',  $usuariobuscado);
   $smarty->assign('estudiantebuscado', $estudiante);
   $smarty->assign('proyectobuscado', $proyecto);
   $smarty->assign('proyectoarea', $proyecto->getArea());
    
   }
  $proyecto_tribunal= new Proyecto_tribunal();
  

 
   
  

  
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
if (isset($_POST['proyecto_id']) && $_POST['proyecto_id']!="")
 {
     
      $proyecto_tribunal->objBuidFromPost();
      $proyecto_tribunal->estado = Objectbase::STATUS_AC;
      $proyecto_tribunal->save();
      
     $notificaciones= new Notificacion();
     $notificaciones->objBuidFromPost();
     $notificaciones->proyecto_id=$_POST['proyecto_id'];
     $notificaciones->tipo="";
     $notificaciones->detalle=$_POST['detalle'];
      $notificaciones->prioridad="Baja";
      $notificaciones->estado_notificacion="Baja";
     $notificaciones->estado = Objectbase::STATUS_AC;
     $notificaciones->save();
    // $notificaciones->
  
    
     if (isset($_POST['ids']))
     foreach ($_POST['ids'] as $id)
     {
      echo $id;
               $tribunal= new Tribunal();
              
          //     $smarty->assign("tribunal",$tribunal);
                
               
                $tribunal->estado = Objectbase::STATUS_AC;
                $tribunal->proyecto_tribunal_id=$proyecto_tribunal->id;
                $tribunal->docente_id =$id;
                $tribunal->archivo ="";
                $tribunal->accion="";
                $tribunal->objBuidFromPost();
           
                $tribunal->save();
               
                 $notificaciontribunal= new Notificacion_tribunal();
                  $notificaciontribunal->notificacion_id=$notificaciones->id;
                 $notificaciontribunal->tribunal_id=$tribunal->id;
                 $notificaciontribunal->estado = Objectbase::STATUS_AC;
                 $notificaciontribunal->save();
              
               
               
     }
     }else
 {
   
   echo "<script>alert('No Existe elProyecto Para Asignar Tribunales');</script>";
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

$TEMPLATE_TOSHOW = 'tribunal/tribunal.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>