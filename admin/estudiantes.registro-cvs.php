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

  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar'  && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    $aux      = str_replace(array("\r\n", "\r", "\n"), '#CODIGOX#', trim($_POST['cvs'])); 
    $estudiantes = explode('#CODIGOX#', $aux);
    if (count($estudiantes)>=1)
      foreach ($estudiantes as $estudiante_array) {
        $estudiante_array = explode(';', $estudiante_array);
        if (count($estudiante_array)>=3 && is_numeric($estudiante_array[1]) )
        {
          $usuario    = new Usuario();
          $estudiante = new Estudiante();
          $estudiante->getByCodigoSis($estudiante_array[1]);
          if ($estudiante->id)
            continue;
          $usuario->parserNombreApellidos($estudiante_array[2]); //Nombres y apellidos
          $usuario->estado    = Objectbase::STATUS_AC;
          $usuario->login     = $estudiante_array[1];            //codigo sis
          $usuario->clave     = $estudiante_array[1];            //codigo sis
          $usuario->save();
          
          $estudiante->estado     = Objectbase::STATUS_AC;
          $estudiante->usuario_id = $usuario->id;
          $estudiante->codigo_sis = $estudiante_array[1];
          $estudiante->save();
          
        }
      }
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