<?php
try {
  require('_start.php');
  global $PAISBOX;

  leerClase("Administrador");
  leerClase("Formulario");

  /** HEADER */
  $smarty->assign('title','Ingresar');
  $smarty->assign('description','Pagina de inicio');
  $smarty->assign('keywords','Ingreso,usuario,mercaderia');

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
  $admin = new Administrador();
  $smarty->assign('admin',$admin);
  //LOGIN FORM
  if (isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["clave"]) && $_POST["clave"] != "" && isset($_POST['tarea']) && $_SESSION['loginadmin'] == $_POST['token'] )
  {
    $admin = new Administrador();
    $formulario = new Formulario('');
    $formulario->validar('login'   ,$_POST["login"]   ,'texto','Login ');
    $formulario->validarPassword('clave',$_POST["clave"], false,TRUE);

    if (!initAdminSession($_POST["login"] ,($_POST["clave"])))
      throw new Exception("?login&m=El usuario y el password no corresponden a administrador registrado.");
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

$_SESSION['loginadmin'] = sha1(URL . time());
$smarty->assign('token',$_SESSION['loginadmin']);

$smarty->display('admin/login.tpl');
?>