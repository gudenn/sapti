<?php
try {
  require('_start.php');
  if(!isAdminSession())
    header("Location: login.php");  

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


  //CREAR UN ESTUDIANTE
  leerClase('Usuario');
  leerClase('Estudiante');

  $id     = '';
  $editar = FALSE;
  if ( isset($_GET['estudiante_id']) && is_numeric($_GET['estudiante_id']) )
  {
    $editar = TRUE;
    $id     = $_GET['estudiante_id'];
  }

  $estudiante = new Estudiante($id);
  $usuario    = new Usuario($estudiante->usuario_id);
  
  $smarty->assign("usuario"   , $usuario);
  $smarty->assign("estudiante", $estudiante);
  
  //Asignar Semestre al estudiante
  leerClase('Semestre');
  $semestre     = new Semestre();
  $semestres    = $semestre->getAll();
  $semestre_values[] = '';
  $semestre_output[] = '- Seleccione -';
  while ($row = mysql_fetch_array($semestres[0])) 
  {
    $semestre_values[] = $row['id'];
    $semestre_output[] = $row['codigo'];
  }
  $smarty->assign("semestre_values", $semestre_values);
  $smarty->assign("semestre_output", $semestre_output);
  $smarty->assign("semestre_selected", ""); 
  
  //Asignar Materia al estudiante
  leerClase('Materia');
  $materia     = new Materia();
  $materias    = $materia->getAll();
  $materia_values[] = '';
  $materia_output[] = '- Seleccione -';
  while ($row = mysql_fetch_array($materias[0])) 
  {
    $materia_values[] = $row['id'];
    $materia_output[] = $row['nombre'];
  }
  $smarty->assign("materia_values", $materia_values);
  $smarty->assign("materia_output", $materia_output);
  $smarty->assign("materia_selected", "");  
  
  
  
  if (!$editar)
    $columnacentro = 'admin/columna.centro.estudiante-registro.tpl';
  else
    $columnacentro = 'admin/columna.centro.estudiante-registro-editar.tpl';
  $smarty->assign('columnacentro',$columnacentro);
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    
    mysql_query("BEGIN");
    $usuario->objBuidFromPost();
    $usuario->estado = Objectbase::STATUS_AC;
    $es_nuevo = (!isset($_POST['usuario_id'])||trim($_POST['usuario_id'])=='' )?TRUE:FALSE;
    $usuario->validar($es_nuevo);
    $usuario->save();

    $estudiante->objBuidFromPost();
    $estudiante->estado = Objectbase::STATUS_AC;
    $estudiante->usuario_id = $usuario->id;
    $estudiante->validar($es_nuevo);
    $estudiante->save();
    
    // grabamos si lo inscribimos a una materia
    if ( isset($_POST['dicta_id']) && isset($_POST['semestre_id']) )
    {
      leerClase('Inscrito');
      $inscrito = new Inscrito();
      $inscrito->semestre_id   = $_POST['semestre_id'];
      $inscrito->dicta_id      = $_POST['dicta_id'];
      $inscrito->estudiante_id = $estudiante->id;
      $inscrito->estado        = Objectbase::STATUS_AC;
      $inscrito->save();
      
    }
    
    mysql_query("COMMIT");
  }

  

  //No hay ERROR
  $smarty->assign("ERROR",'');
  
} 
catch(Exception $e) 
{
  mysql_query("ROLLBACK");
  $smarty->assign("ERROR", handleError($e));
}

$token                = sha1(URL . time());
$_SESSION['register'] = $token;
$smarty->assign('token',$token);

$TEMPLATE_TOSHOW = 'admin/3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>