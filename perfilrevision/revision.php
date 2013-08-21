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


   //CREAR LAS CLASES

  leerClase("perfilregistro");
  leerClase("Estudiante");
  leerClase("Tutor");
  leerClase("Docente");
  leerClase("Revision_perfil");
  leerClase("Filtro");
  
 /////////////////////////////////////////
  
  
  
  
///// crear un estudiante////////////////
  $estudiante = new Estudiante();
  $estudiante_sql = $estudiante->getAll();
  $estudiante_id = array();
  $estudiante_nombre = array();
  $estudiante_apellidos = array();
  while ($estudiante_sql && $rows = mysql_fetch_array($estudiante_sql[0])) 
 {
     $estudiante_id[] = $rows['id'];
     $estudiante_nombre[] = $rows['nombre'];
     $estudiante_apellidos[] = $rows['apellidos'];
  }
  $smarty->assign('estudiante_id', $estudiante_id);
  $smarty->assign('estudiante_nombre', $estudiante_nombre);
  $smarty->assign('estudiante_apellidos', $estudiante_apellidos);
     
 /////////////////////////////////////////////////////////

$activo = Objectbase::STATUS_AC;
$sql=  "SELECT e.nombre , e.apellidos , e.codigo_sis 
FROM  usuario u , estudiante e 
WHERE u.id= e.usuario_id and" ;
$resultado=mysql_query($sql); // ejecutamos la consulta


  ///// crear un revision perfil////////////////
  $revision_perfil = new revision_perfil();
  $revision_perfil_sql = $revision_perfil->getAll();
  $revision_perfil_id = array();
  $revision_perfil_nombre = array();
  while ($revision_perfil_sql && $rows = mysql_fetch_array($revision_perfil_sql[0])) 
  {
     $revision_perfil_id[] = $rows['id'];
     $revision_perfil_nombre[] = $rows['titulo'];
  }
  $smarty->assign('revision_perfil_id', $revision_perfil_id);
  $smarty->assign('revision_perfil_titulo', $revision_perfil_titulo);
  
  /////////////////GUARADR REVISION PERFIL //////////////////////////////
  
     if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
      $revision_perfil->objBuidFromPost();
      $revision_perfil->estado = Objectbase::STATUS_AC;
      $revision_perfil->save();
    
     if (isset($_POST['ids']))
     foreach ($_POST['ids'] as $id)
     {
       echo $id;
               $revision_perfil= new revision_perfil();        
               $revision_perfil->usuario_id =$id;
                $revision_perfil->estado = Objectbase::STATUS_AC;
               $revision_perfil->proyecto_tribunal_id=$revision_perfil->id;;
                $revision_perfil->objBuidFromPost();
               $revision_perfil->save();
     }
   }
   
$smarty->assign("ERROR", $ERROR);
  //No hay ERROR
  $smarty->assign("ERROR",'');
  $smarty->assign("URL",URL); 
  
}    
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'perfilrevision/revision.tpl';
$smarty->display($TEMPLATE_TOSHOW);
?>