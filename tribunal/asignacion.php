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
  leerClase("Lugar");
  leerClase("Tipo_defensa");
  leerClase("Defensa");
    
  
  
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
  

$lugar= new Lugar();
$lugar_sql= $lugar->getAll();

$lugar_id= array();
$lugar_nombre=array();
while ($lugar_sql && $ro = mysql_fetch_array($lugar_sql[0]))
 {
   $lugar_id[]     = $ro['id'];
   $lugar_nombre[] = $ro['nombre'];
 }

$smarty->assign('lugar_id',$lugar_id);
$smarty->assign('lugar_nombre',$lugar_nombre);


$tipo= new Tipo_defensa();
$tipo_sql= $tipo->getAll();

$tipo_id= array();
$tipo_nombre=array();
while ($tipo_sql && $r = mysql_fetch_array($tipo_sql[0]))
 {
   $tipo_id[]     = $r['id'];
   $tipo_nombre[] = $r['nombre'];
 }

$smarty->assign('tipo_id',$tipo_id);
$smarty->assign('tipo_nombre',$tipo_nombre);



  if(isset($_GET['tribunal_id']))
  {
    
   // echo $_GET['tribunal_id'];
     $sql="
SELECT d.id, u.nombre , u.apellidos
FROM  usuario u, docente d, tribunal t, proyecto_tribunal pt
WHERE  u.`id`=d.`usuario_id` and d.`id`=t.`docente_id` and  t.`proyecto_tribunal_id`=pt.`id` and pt.`id`=".$_GET['tribunal_id'];
 $resultado = mysql_query($sql);
 $arraytribunal= array();
 
 while ($fila = mysql_fetch_array($resultado)) 
                {
    $arraytribunal[]=$fila;
 }
$smarty->assign('arraytribunal'  , $arraytribunal);
    
  
  $sqllt=  "SELECT  pt.id as idproyecto, u.nombre , u.apellidos , e.codigo_sis , p.nombre as nombreproyecto
FROM  usuario u , estudiante e , proyecto_estudiante pe , proyecto p, proyecto_tribunal pt
WHERE u.id= e.usuario_id and e.id=pe.estudiante_id and p.id= pe.proyecto_id and p.id=pt.proyecto_id and pt.id=".$_GET['tribunal_id'];

$resultados = mysql_query($sqllt);
 $arraytribunaldatos= array();
 
 while ($filas = mysql_fetch_array($resultados, MYSQL_ASSOC))
 { 
   $arraytribunaldatos[]=$filas;
 }
      
      $smarty->assign('arraytribunaldatos'  , $arraytribunaldatos);
  }
        $defensa= new Defensa();
         if( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
            {
          if (isset($_POST['proyecto_tribunal_id']))
             {
       $defensa->objBuidFromPost();
       $defensa->estado = Objectbase::STATUS_AC;
       $defensa->save();
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

$contenido = 'tribunal/asignar.tpl';
  $smarty->assign('contenido',$contenido);



$TEMPLATE_TOSHOW = 'tribunal/tribunal.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>