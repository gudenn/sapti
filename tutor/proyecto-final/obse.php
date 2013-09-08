<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of obse
 *
 * @author Hilda
 */

try {
  require('_start.php');
  // require '../tutor/login.php';
  global $PAISBOX;
  
  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = "css/style.css";
  $smarty->assign('CSS','');

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');


  
  
  $smarty->assign("ERROR", $ERROR);
  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
  leerClase('Tutor');
  
  $tutor=new Tutor();
  $proyectos = $tutor->getProyectos();
  $login=$_POST['login'];
  $clave=$_POST['clave'];
 // $nombre =$tutor->getIdTutor($login, $clave);
  $nombre =$tutor->getNombreTutor($login, $clave);
  $smarty->assign("objs", $proyectos);
  $smarty->assign("bb",$nombre);
  
  
  //fread("Estudiantes/Hilda", )
  

  
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

//$TEMPLATE_TOSHOW = 'index.academic.tpl';
//hilda
$TEMPLATE_TOSHOW = 'tutor/revision.tutor.tpl';
$smarty->display($TEMPLATE_TOSHOW);






?>
