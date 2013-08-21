<?php
try {
  require_once('_start.php');

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


  //CREAR UN ESTUDIANTE
  leerClase('Usuario');
  leerClase('Estudiante');

  $id     = '';
  $editar = FALSE;
  if (isEstudianteSession())
  {
    $estudiante = getSessionEstudiante();
    $editar = TRUE;
    $id     = $estudiante->id;
  }
  

  $estudiante = new Estudiante($id);
  $usuario    = new Usuario($estudiante->usuario_id);
  
  $smarty->assign("usuario"   , $usuario);
  $smarty->assign("estudiante", $estudiante);
  
  if (!$editar)
    $columnacentro = 'admin/columna.centro.estudiante-registro.tpl';
  else
    $columnacentro = 'admin/columna.centro.estudiante-registro-editar.tpl';
  $smarty->assign('columnacentro',$columnacentro);
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registra' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
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

$TEMPLATE_TOSHOW = 'estudiante/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>