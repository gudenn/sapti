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

  //CSS
  $CSS[]  = URL_CSS . "academic/tables.css";
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
  $JS[]  = URL_JS . "jquery.addfield.js";
  
  $smarty->assign('JS',$JS);


  $smarty->assign("ERROR", '');

  //CREAR UNA REVISION
  leerClase('Revision');
  leerClase('Observacion');
  if (isset($_POST['observaciones'])) 
  $observaciones=$_POST['observaciones'];
  $proyecto_ids = $_GET['proyecto_id'];
  $docente=  getSessionDocente();
  $docente_ids=$docente->id;
  
  $observacion = new Observacion();
  $revision = new Revision();

  $smarty->assign("revision", $revision);
  $smarty->assign("observacion", $observacion);
  
  $sql="SELECT es.id as 'id', us.nombre as 'nombre', us.apellidos as 'apellidos', pr.nombre as 'nombrep', pr.id as 'id_pr'
FROM docente dt, dicta di, materia ma, estudiante es, usuario us, inscrito it, proyecto pr, proyecto_estudiante pe
WHERE dt.id='".$docente_ids."'
AND pr.id='".$proyecto_ids."'
AND di.docente_id=dt.id 
AND es.usuario_id=us.id
AND it.dicta_id=di.id
AND it.estudiante_id=es.id
AND es.id=pe.estudiante_id
AND pe.proyecto_id=pr.id;";
 $resultado = mysql_query($sql);
 $arraylista= array();
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
   $arraylista[]=$fila;
 }
    $nombre_n=$arraylista[0]['nombre'];
    $nombre_a=$arraylista[0]['apellidos'];
    $es=' ';
    $nombre_es=$nombre_n.$es.$nombre_a;
    $nombre_pr=$arraylista[0]['nombrep']; 
    
    $smarty->assign("nombre_es", $nombre_es);
    $smarty->assign("nombre_pr", $nombre_pr);
    date_default_timezone_set('UTC');
    $revision->fecha_revision=date("d/m/Y");

    if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
    {
    $revision->objBuidFromPost();
    $revision->estado = Objectbase::STATUS_AC;
    $revision->revisor=$docente_ids;
    $revision->proyecto_id=$proyecto_ids;
    $revision->save();
    foreach ($observaciones as $obser_array){
    $observacion->objBuidFromPost();
    $observacion->estado = Objectbase::STATUS_AC;
    $observacion->observacion=$obser_array;
    $observacion->revision_id = $revision->id;
    $observacion->save();
    }
  }

  
  $token = sha1(URL . time());
  $_SESSION['register'] = $token;
  $smarty->assign('token',$token);
  
  
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'docente/full-width.observacion.registro.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>