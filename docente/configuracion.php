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
  leerClase("Area");
  leerClase("Apoyo");

  
  
 $area = new Area();
//$smarty->assign('rows', $rows);
 $area_mysql  = $area->getAll();
 $area_id     = array();
 $area_nombre = array();
 while ($area_mysql && $row = mysql_fetch_array($area_mysql[0]))
 {
   $area_id[]     = $row['id'];
   $area_nombre[] = $row['nombre'];
 
 }
// $smarty->assign('filas'  , $rows);
$smarty->assign('area_id'     , $area_id);
$smarty->assign('area_nombre' , $area_nombre);

$smarty->assign('areaselect_id',2);

////////////////////////////numero de estudiantes por docente//////
$smarty->assign('numero', array(
                                1 => '1',
                                2 => '2',
                                3 => '3',
                                4 => '4')
                                );
$smarty->assign('seleccionado',2);

    
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
     
  $usuarios= new Usuario(getSessionDocente()->id);
  
    $usuarios= new Usuario(getSessionDocente()->id);
      
    
 $sqldoc="select  d.`id`
FROM   `usuario` u , `docente`  d
where u.`id`= d.`usuario_id` and u.`estado`='AC' and d.`estado`='AC' and u.`id`=".$usuarios->id;
 $resultadodoc = mysql_query($sqldoc);
 //$arraytribunal= array();
 $iddoc=0;
 while ($fila = mysql_fetch_array($resultadodoc, MYSQL_ASSOC)) 
 {
  
   $iddoc=$fila['id'];
 }
    
    ECHO $iddoc;
   
     
      
   if (isset($_POST['area_id']))
   {
     $tamanio=0;
     $tamanio= 0+ (sizeof($_POST['area_id']));
  echo $tamanio;
   if($tamanio!=0)
     {
      echo "hola eli dentro";
    
     foreach ($_POST['area_id'] as $id)
     {
           
     $apoyo= new Apoyo();
     $apoyo->area_id=$id;
     $apoyo->docente_id=$iddoc;
     $apoyo->estado = Objectbase::STATUS_AC;
     $apoyo->save();


        }
      }
      else
      {
        echo "hola eli";
      }
     
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

$TEMPLATE_TOSHOW = 'docente/configuracion.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>