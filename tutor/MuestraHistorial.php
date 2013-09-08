<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Muestra2
 *
 * @author Hilda
 */
    
     
   // echo "hola hilda";
try {
  require('_start.php');
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

  $smarty->assign("objs", $proyectos);
  
  
  
$directorio = opendir("$DOCUMENT_ROOT../"); //ruta actual
$carpeta="Estudiantes/Hilda Quiroz/";
opendir($carpeta);

while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    
        echo $archivo . "<br />";
 }
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

//$TEMPLATE_TOSHOW = 'index.academic.tpl';
//hilda
$TEMPLATE_TOSHOW = 'tutor/historial.estudiante.tpl';
$smarty->display($TEMPLATE_TOSHOW);




?>
