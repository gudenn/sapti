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
  leerClase("Horario");
  

  
  
 $horario = new Horario();
//$smarty->assign('rows', $rows);
 $horario_mysql  = $horario->getAll();
 $horario_id     = array();
 $horario_nombre = array();
 while ($horario_mysql && $row = mysql_fetch_array($horario_mysql[0]))
 {
   $horario_id[]     = $row['id'];
   $horario_nombre[] = $row['nombre'];
 
 }
// $smarty->assign('filas'  , $rows);
$smarty->assign('horario_id'     , $horario_id);
$smarty->assign('horario_nombre' , $horario_nombre);


    
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
     $docentes= new Docente();
     $docentes=getSessionDocente();
  echo $docentes->usuario_id;
    
     
     if (isset($_POST['horario_id']))
     foreach ($_POST['horario_id'] as $id)
     {
       
      
    //  echo $id;
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

$TEMPLATE_TOSHOW = 'docente/horario.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>