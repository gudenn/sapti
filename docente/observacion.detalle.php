<?php
try {
  require('_start.php');
  if(!isDocenteSession())
      header("Location: login.php");
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Registro Observaciones');
  $smarty->assign('description','Formulario de Registro de Observaciones');
  $smarty->assign('keywords','SAPTI,Observaciones,Registro');

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

  $smarty->assign('JS',$JS);

  $smarty->assign("ERROR", '');

  if ( isset($_GET['revisiones_id']))
  $revid=$_GET['revisiones_id'];

  $resul = "
      SELECT ob.observacion as obser, pr.nombre as nomp, us.nombre as nom,us.apellidos as ap, re.fecha_revision as fere
FROM observacion ob, revision re, proyecto pr, docente doc, proyecto_estudiante proe, usuario us
WHERE ob.revision_id=re.id
AND re.proyecto_id=pr.id
AND pr.id=proe.proyecto_id
AND re.revisor=doc.id
AND doc.usuario_id=us.id
AND ob.revision_id='".$revid."' 
          ";
   $sql = mysql_query($resul);
while ($fila1 = mysql_fetch_array($sql, MYSQL_ASSOC)) {
   $arrayobser[]=$fila1;
 }
    
  $smarty->assign("arrayobser", $arrayobser);
  
  $columnacentro = 'docente/columna.centro.observacion-detalle.tpl';
  $smarty->assign('columnacentro',$columnacentro);

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'docente/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>