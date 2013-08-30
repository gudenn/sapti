<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;
    /** HEADER */
  $smarty->assign('title','Modificacion de Observaciones');
  $smarty->assign('description','Formulario de Modificacion de Observaciones');
  $smarty->assign('keywords','SAPTI,Observaciones,Registro');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  //$CSS[]  = URL_CSS . "/styleob.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
 
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";
    //Validation
  $JS[]  = URL_JS . "validate/idiomas/jquery.validationEngine-es.js";
  $JS[]  = URL_JS . "validate/jquery.validationEngine.js";
  
  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";
  $JS[]  = URL_JS . "jquery.addfield.js";

  $smarty->assign('JS',$JS);
  $smarty->assign("ERROR", '');
  
  function array_envia($url_array) 
   {
   $tmp = serialize($url_array);
   $tmp = urlencode($tmp);
       return $tmp;
   };
  function array_recibe($url_array) { 
  $tmp = stripslashes($url_array); 
  $tmp = urldecode($tmp); 
  $tmp = unserialize($tmp); 
    return $tmp; 
  };
  if ( isset($_GET['revisiones_id']) && is_numeric($_GET['revisiones_id']) )
  $revisionesid = $_GET['revisiones_id'];

  $docente=  getSessionDocente();
  $docente_ids=$docente->id;

  $smarty->assign("revisionesid", $revisionesid);
  
  $columnacentro = 'docente/columna.centro.observacion-editar.tpl';
  $smarty->assign('columnacentro',$columnacentro);
  
  $array1=$_GET['array']; 
  $array1=array_recibe($array1);
  
  $smarty->assign("array1", $array1);
  
  $array=array_envia($array1);
  leerClase("Revision");
  leerClase("Observacion");
  if(isset($_POST['borrar'])){
      
    $revision    = new Revision($revisionesid);
    $resul = "select id from observacion where revision_id =".$revisionesid." ";
    $sql=mysql_query($resul);
    $a=0;
    $sql1=array();
  while($res=mysql_fetch_row($sql)) {
      $sql1[$a]=$res[0];
      $a=$a+1;
    }
    foreach ($sql1 as $array2){
    $observacion = new Observacion($array2);
    $observacion->delete();
    }
    $revision->delete();
    
      $url="revision.lista.php?array=$array";
      $ir = "Location: $url";
      header($ir);
  };

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>
