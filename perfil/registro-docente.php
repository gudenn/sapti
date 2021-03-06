<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

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

  $columnacentro = 'perfil/columna.centro.registro-docente.tpl';
  $smarty->assign('columnacentro',$columnacentro);

  //CREAR UN TUTOR
  leerClase('Docente');
  leerClase('Usuario');
  $usuario=new Usuario();
  $docente = new Docente();
  
  $smarty->assign("docente", $docente);
  $smarty->assign("usuario"   , $usuario);
    $smarty->assign('token','');
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
   
    $usuario->objBuidFromPost();
     $usuario->estado = Objectbase::STATUS_AC;
     $usuario->save();
      $docente->objBuidFromPost();
      $docente->estado = Objectbase::STATUS_AC;
      $docente->usuario_id = $usuario->id;
      $docente->save();
   
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

$TEMPLATE_TOSHOW = 'perfil/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>