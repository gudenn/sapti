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

$smarty->assign('numero', array(
                                1 => '1',
                                2 => '2',
                                3 => '3',
                                4 => '4')
                                );
$smarty->assign('seleccionado',2);

    
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
     $docentes= new Docente();
     $docentes=getSessionDocente();
   //  echo $docentes->usuario_id;
    
     
     if (isset($_POST['area_id']))
     foreach ($_POST['area_id'] as $id)
     {
       
      
      echo $id;
               $tribunal= new Tribunal();
        /**       
                $tribunal->usuario_id =$id;
                $tribunal->estado = Objectbase::STATUS_AC;
                $tribunal->proyecto_tribunal_id=$proyecto_tribunal->id;;
                $tribunal->objBuidFromPost();
           
                $tribunal->save();
               
                 $notificaciontribunal= new Notificacion_tribunal();
                  $notificaciontribunal->notificacion_id=$notificaciones->id;
                 $notificaciontribunal->tribunal_id=$tribunal->id;
                 $notificaciontribunal->estado = Objectbase::STATUS_AC;
                 $notificaciontribunal->save();
                */
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

$TEMPLATE_TOSHOW = 'docente/especialidad.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>