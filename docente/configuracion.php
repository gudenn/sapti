<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php"); 
  global $PAISBOX;
    /** HEADER */
  $smarty->assign('title','Modificacion de Observaciones');
  $smarty->assign('description','Formulario de Modificacion de Observaciones');
  $smarty->assign('keywords','SAPTI,Observaciones,Registro');

  //CSS
  $CSS[]  = URL_CSS . "academic/3_column.css";
  //$CSS[]  = URL_CSS . "/styleob.css";
  $CSS[]  = URL_JS  . "/validate/validationEngine.jquery.css";
  $CSS[]  = URL_JS . "ui/cafe-theme/jquery-ui-1.10.2.custom.min.css";
 
  $smarty->assign('CSS',$CSS);

  //JS
  $JS[]  = URL_JS . "jquery.1.9.1.js";

  //Datepicker UI
  $JS[]  = URL_JS . "ui/jquery-ui-1.10.2.custom.min.js";
  $JS[]  = URL_JS . "ui/i18n/jquery.ui.datepicker-es.js";
  $JS[]  = URL_JS . "jquery.addfield.js";

  
  
  $smarty->assign('JS',$JS);
  $smarty->assign("ERROR", '');
 //// leer las clases 
    leerClase("Area");
    leerClase("Apoyo");
    leerClase("Usuario");
    leerClase("Docente");

 
    
     
   if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {
    $docentes     =  getSessionDocente();
    $docente_idss =  $docentes->id;
 
    $sqla="select a.id, ap.`id` as idapoyo
from usuario u, docente d ,area a , apoyo ap
where u.id=d.`usuario_id` and d.`id`=ap.`docente_id` and ap.`area_id`=a.id and u.`estado`='AC' and d.`estado`='AC' and u.`id`=".$docente_idss.";";
    $resultad   =  mysql_query($sqla);
   
 
 while ($filass = mysql_fetch_array($resultad)) 
 {
    $apoyo= new Apoyo($filass['idapoyo']);
    $apoyo->delete();
 }
  
     
    $sql="select d.id from usuario u, docente d
    where u.id=d.`usuario_id` and u.`estado`='AC' and d.`estado`='AC' and u.`id`=".$docente_idss.";";
    $resultado   =  mysql_query($sql);
    $iddocente   =  0;
 
 while ($fila = mysql_fetch_array($resultado)) 
 {
    $iddocente=$fila['id'];
 }
  
   
     if (isset($_POST['myselect']))
     foreach ($_POST['myselect'] as $id)
     {
   // echo $id;
      $apoyo = new Apoyo();
                $apoyo->objBuidFromPost();
                $apoyo->estado = Objectbase::STATUS_AC;
                $apoyo->area_id=$id;
                $apoyo->docente_id =$iddocente;
                $apoyo->save();
          
     }
     
      if (isset($_POST['horario']))
     foreach ($_POST['horario'] as $ids)
     {
        echo $_POST['dia'];
        echo $ids[0];
        
   
           
     }
 
 }
    
    
  $area = new Area();
  $area_sql = $area->getAll();
  $area_id = array();

  $area_nombre = array();
  while ($area_sql && $rows = mysql_fetch_array($area_sql[0]))
  {
     $area_id[] = $rows['id'];
     $area_nombre[] = $rows['nombre'];
  }


  $smarty->assign('area_id', $area_id);
  $smarty->assign('area_nombre', $area_nombre);

  $docente     =  getSessionDocente();
    $docente_ids =  $docente->id;
    $sql="select a.id
from usuario u, docente d ,area a , apoyo ap
where u.id=d.`usuario_id` and d.`id`=ap.`docente_id` and ap.`area_id`=a.id and u.`estado`='AC' and d.`estado`='AC' and u.`id`=".$docente_ids.";";
    $resultado   =  mysql_query($sql);
    $areaselec_id= array();
 
 while ($fila = mysql_fetch_array($resultado)) 
 {
    $areaselec_id[]=$fila['id'];
 }
  $smarty->assign('areaselec_id'     ,$areaselec_id);

  
 
  $columnacentro = 'docente/configuracion.tpl';
  $smarty->assign('columnacentro',$columnacentro);

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

$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>
