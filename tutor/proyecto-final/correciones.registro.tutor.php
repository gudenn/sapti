<?php
try {
  require('_start.php');
  if(!isEstudianteSession())
    header("Location: login.php");  

  /** HEADER */
  $smarty->assign('title','SAPTI - Registro Correciones');
  $smarty->assign('description','Formulario de registro de Correciones');
  $smarty->assign('keywords','SAPTI,Estudiantes,Registro,Correciones');

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


  //CREAR UN ESTUDIANTE
  leerClase('Usuario');
  leerClase('Estudiante');
  leerClase('Proyecto');

  $id     = '';
  if (isEstudianteSession())
  {
    $estudiante_session = getSessionEstudiante();
    $id         = $estudiante_session->estudiante_id;
  }
  $estudiante = new Estudiante($id);
  
  
  $proyecto = $estudiante->getProyecto(); 

  if ( isset($_POST['tarea']) && $_POST['tarea'] == 'registrar_correcion' && isset($_SESSION['registrar_correcion']) && isset($_POST['token']) && $_SESSION['registrar_correcion'] == $_POST['token']  )
  {
    if ($proyecto->id)
      $estudiante->grabarCorrecion();
  }

  $estudiante = new Estudiante($id);
  $usuario    = new Usuario($estudiante->usuario_id);
  
  $smarty->assign("usuario"   , $usuario);
  $smarty->assign("estudiante", $estudiante);  
  $columnacentro = 'estudiante/columna.centro.correccion-registro.tpl';
  $smarty->assign('columnacentro',$columnacentro);
  


  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$token                = sha1(URL . time());
$_SESSION['registrar_correcion'] = $token;
$smarty->assign('token',$token);

$TEMPLATE_TOSHOW = 'estudiante/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>