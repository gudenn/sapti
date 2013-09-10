<?php
try {
  require('_start.php');
    if(!isDocenteSession())
    header("Location: login.php"); 
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
  leerClase("Horario_doc");
  
  
$horario_doc= new Horario_doc();

  $docente     =  getSessionDocente();
  $docente_ids =  $docente->id;
    $sqldocente="select  d.`id`
from `usuario` u , `docente` d
where u.`id`= d.`usuario_id` and u.`estado`='AC' and d.`estado`='AC' and u.`id`=".$docente_ids.";";
 $resultadodocente= mysql_query($sqldocente);
$idocente=0;
 
 while ($filadocente = mysql_fetch_array($resultadodocente)) 
 {
   $idocente=$filadocente['id'];
    
 }
  
  


 if ( isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' )
  {     
      $horario_doc->objBuidFromPost();
      $horario_doc->estado = Objectbase::STATUS_AC;
      $horario_doc->docente_id= $idocente;
      $horario_doc->save();
      
         
 }

  
   if (isset($_GET['eliminar']) && isset($_GET['horario_id']) && is_numeric($_GET['horario_id']) )
  {
    $horarioborrar = new Horario_doc($_GET['horario_id']);
    $horarioborrar->delete();
  }


  
/////////////cargando los dias de la semana///////////
  $sqldia="select d.`id` , d.`nombre`
from dia d;";
 $resultadodia = mysql_query($sqldia);
 $diaid= array();
  $dianombre= array();
 
 while ($filadia = mysql_fetch_array($resultadodia)) 
                {
    $diaid[]=$filadia['id'];
    $dianombre[]=$filadia['nombre'];
 }
$smarty->assign('diaid'  , $diaid);
$smarty->assign('dianombre'  , $dianombre);
 ////////////////cargando los turnos de opciones de tiempo///////////
  $sqlturno="select t.`id` , t.`nombre`
 from `turno` t;";
 $resultadoturno = mysql_query($sqlturno);
 $turnoid= array();
  $turnonombre= array();
 
 while ($filaturno = mysql_fetch_array($resultadoturno)) 
                {
    $turnoid[]=$filaturno['id'];
    $turnonombre[]=$filaturno['nombre'];
 }
$smarty->assign('turnoid'  , $turnoid);
$smarty->assign('turnonombre'  , $turnonombre);  

 $sql="select hd.`id`, d.`nombre` as nombredia, t.`nombre` as nombreturno
from `turno` t , `dia` d , `horario_doc` hd, `usuario` u, `docente` doc
where hd.`turno_id`= t.`id`  and hd.`dia_id`= d.`id` and u.`id`= doc.`usuario_id` and
 t.`estado`='AC' and d.`estado`='AC' and hd.`estado`='AC' and u.`estado`='AC' and doc.`estado`='AC'
 and u.`id`=".$docente_ids;
 $resultado = mysql_query($sql);
 $listadias= array();
 
 while ($fila = mysql_fetch_array($resultado)) 
                {
    $listadias[]=$fila;
 }
$smarty->assign('listadias'  , $listadias);



    
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$columnacentro = 'docente/disponibilidad.tpl';
  $smarty->assign('columnacentro',$columnacentro);



$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>