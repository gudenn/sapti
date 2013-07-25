<?php
try {
  require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = URL_CSS . "perfil/3_column.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
  
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');
  
 // CREAR UN PERFIL TESIS
 leerClase('Perfiltesis');
 $perfiltesis =new Perfiltesis();
 $smarty->assign("perfiltesis",$perfiltesis);
 
 //$smarty->assign("fecha_Registro",$fecha_registro);
 
 // en esta parte es donde guarda ala base de datos
  //$perfiltesis->save();
if ( isset($_POST['tarea']) && $_POST['tarea'] == 'Guardar' )
  {
    $perfiltesis->objBuidFromPost();
    $perfiltesis->save();
  }
  
  $smarty->assign("ERROR", $ERROR);
  
  //No hay ERROR
  $smarty->assign("ERROR",'');
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'perfilregistro/registrotesis.tpl';
//$TEMPLATE_TOSHOW ='perfil/registroperfiltesis.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>