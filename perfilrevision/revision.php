<?php
//include 'perfilregistro';
try {
  require('_start.php');
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


   //CREAR UN ESTUDIANTE

  leerClase("perfilregistro");
  leerClase("Usuario");
  leerClase("Estudiante");
  leerClase("Docente");
  
  $doce=new Docente(1);
  $smarty->assign('doce', $doce); 
  
  
  
  // creamos estudiante
  //$estudiante= new Estudiante();
  $user=new Usuario(1);   ///mandar su "Id"
  $smarty->assign('user', $user);
  
  /// nos creamos  un registro perfil
   $perfilregistro = new Perfilregistro();
   $perfi=new Perfilregistro(1);   ///mandar su "Id"
         
   ////////////////////////////// 

    date_default_timezone_set('UTC');
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
   
    $perfi->estado = Objectbase::STATUS_AC;
    $perfi->save();
    foreach ($perfi as $obser_array){
    $perfi->estado = Objectbase::STATUS_AC;
    $perfi->observacion=$obser_array;
    $perfi->save();
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

$TEMPLATE_TOSHOW = 'perfilrevision/revision.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>