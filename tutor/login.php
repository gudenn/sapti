<?php
try {
  require('_start.php');

  leerClase("Tutor");
  leerClase("Formulario");

  /** HEADER */
  $smarty->assign('title','Ingresar Tutor');
  $smarty->assign('description','Pagina de inicio');
  $smarty->assign('keywords','Ingreso,usuario');

  //CSS
  $CSS[]  = "../js/validate/validationEngine.jquery.css";
  $CSS[]  = "../js/ui/base/jquery.ui.all.css";

  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = "../js/jquery.js";
  $JS[]  = "../js/validate/idiomas/jquery.validationEngine-es.js";
  $JS[]  = "../js/validate/jquery.validationEngine.js";
  
  $smarty->assign('JS',$JS);

  
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
  $tutor = new Tutor();
  $smarty->assign('tutor',$tutor);

  //LOGIN FORM
  $usuario1=$_POST["login"]  ;
  $login1=$_POST["clave"];
    
    echo $usuario1;
    echo $login1;
  if (isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["clave"]) && $_POST["clave"] != "" && isset($_POST['tarea']) && $_SESSION['logintutor'] == $_POST['token'] )
  {
    $tutor = new Tutor();
    $formulario = new Formulario('');
    $formulario->validar('login'   ,$_POST["login"]   ,'texto','Login ');
    $formulario->validarPassword('clave',$_POST["clave"], false,TRUE);
   
    if (!initTutorSession($_POST["login"] ,($_POST["clave"])))
      throw new Exception("?login&m=El usuario y el password no corresponden a un tutor registrado.");
    $ir = "Location: index.php";
    header($ir);
  }
  //No hay ERROR
  $smarty->assign("ERROR",'');
  $smarty->assign("URL",URL);  
  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$_SESSION['logintutor'] = sha1(URL . time());
$smarty->assign('token',$_SESSION['logintutor']);

$smarty->display('tutor/login.tpl');
?>