<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','SAPTI - Registro Estudiantes');
  $smarty->assign('description','Formulario de registro de estudiantes');
  $smarty->assign('keywords','SAPTI,Estudiantes,Registro');

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

  $columnacentro = 'admin/columna.centro.registro-estudiante-cvs.tpl';
  $smarty->assign('columnacentro',$columnacentro);

  //CREAR UN ESTUDIANTE
  leerClase('Usuario');
  leerClase('Estudiante');

  $usuario    = new Usuario();
  $estudiante = new Estudiante();
  
  $smarty->assign("usuario"   , $usuario);
  $smarty->assign("estudiante", $estudiante);
  
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    $usuario->objBuidFromPost();
    $usuario->estado = Objectbase::STATUS_AC;
    $es_nuevo = (!isset($_POST['usuario_id'])||trim($_POST['usuario_id'])=='' )?TRUE:FALSE;
    $usuario->validar($es_nuevo);
    $usuario->save();

    $estudiante->objBuidFromPost();
    $estudiante->estado = Objectbase::STATUS_AC;
    $estudiante->usuario_id = $usuario->id;
    $estudiante->validar($es_nuevo);
    $estudiante->save();
  }

  

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

$TEMPLATE_TOSHOW = 'admin/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>