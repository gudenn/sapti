<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php");  

  /** HEADER */
  $smarty->assign('title','SAPTI - Inscripcion de Estudiantes');
  $smarty->assign('description','Formulario de Inscripcion de Estudiantes');
  $smarty->assign('keywords','SAPTI,Estudiantes,Inscripcion');

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


  $smarty->assign("ERROR", '');

  $columnacentro = 'docente/columna.centro.inscripcion.estudiante-cvs-mascara.tpl';
  $smarty->assign('columnacentro',$columnacentro);

  $docente=  getSessionDocente();
  $docenteid=$docente->id;
  function nombmat($sis) {
  $sql = "SELECT di.id AS iddi, ma.nombre AS nombremat
    FROM materia ma, dicta di
    WHERE ma.id=di.materia_id
    AND di.id='".$sis."'";
    $result = mysql_query($sql);
    $arraylista= array();
  while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
   $arraylista[]=$fila;
 }
    return $arraylista[0]['nombremat'];
  };
   $sql = "SELECT di.id as dic, ma.nombre as mat
FROM dicta di, docente dt, materia ma
WHERE di.docente_id=dt.id
AND di.materia_id=ma.id
AND dt.id='".$docenteid."'";
   $result = mysql_query($sql);
   $materia_values[] = '';
   $materia_output[] = '- Seleccione -';
   $idmat='';
   $mat='';
 
 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
       $materia_values[] = $row['dic'];
       $materia_output[] = $row['mat'];
 }
  $smarty->assign("materia_values", $materia_values);
  $smarty->assign("materia_output", $materia_output);
  $smarty->assign("materia_selected", "");
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar'  && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
      if ( isset($_POST['materia_selec'])&&$_POST['materia_selec']!=0)
    {
        $idmat=$_POST['materia_selec'];
        $mat=nombmat($idmat);
        $url="inscripcion.estudiante-cvs.php?ids=$idmat&mat=$mat";
            $ir = "Location: $url";
      header($ir);
    }
  };
  //No hay ERROR
  $smarty->assign("ERROR",'');
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$token                = sha1(URL . time());
$_SESSION['register'] = $token;
$smarty->assign('token',$token);

$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>