<?php
//include './upload.lib.php';
try {
    require('_start.php');
 
 if(!isEstudianteSession())
    header("Location: ../estudiante/login.php");  
 
 
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

  // CREAR UN PERFIL DIRIGIDO
leerClase("Formulario");
 leerClase("Pagination");
 leerClase("Filtro");
 leerClase("Perfilregistro");
 leerClase("Carrera");
 leerClase("Modalidad");
 leerClase("Area");
 leerClase("Sub_area");
 leerClase("Institucion");
 leerClase("Usuario");
 leerClase("Estudiante");
 leerClase("Docente");
 leerClase("Tutor");
 leerClase("Semestre");
 leerClase('Perfil_archivo');

 /////// carga al estudiante ///////////////////
 $estudiante_aux = getSessionEstudiante();
  $estudiante  = new Estudiante($estudiante_aux->estudiante_id);
  
  $usuari= $estudiante->getUsuario();
  //$proyecto  = $estudiante->getProyecto();
  
  $smarty->assign("estudiante", $estudiante);
  $smarty->assign("usuari", $usuari);
  //$smarty->assign("proyecto", $proyecto);
 
 ///////////////////////////////////////////////
/*
 $sqlr="SELECT d.`id` ,concat(u.nombre , u.apellidos) as nombres
from `usuario` u , `docente` d
where u.`id`=d.`usuario_id` and u.`estado`='AC' and d.`estado`='AC';";
 $resultado = mysql_query($sqlr);
 $docente_id= array();
 $docente_nombre=array();
 
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
 {
  // $arraytribunal=$fila;
   $docente_id[] = $fila['id'];
     $docente_nombre[] = $fila['nombre'];
  }
 $smarty->assign('docente_id'  , $docente_id);
 $smarty->assign('docente_nombre'  , $docente_nombre);
 */
 /////////// Semestre ////////////////
/*
 $sqls="SELECT s. `id`,s.`codigo`,s.`estado`
FROM  semestre s
WHERE  s.`estado`='AC';";
 $resultado= mysql_query($sqls);
 $semestre_id= array();
 $semestre_codigo=array();
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
 {
     $semestre_id[]=$fila['id'];
     $semestre_codigo[]=$fila['codigo'];
 }
 $smarty->assign('$semestre_id',$semestre_id);
 $smarty->assign('$semestre_codigo',$semestre_codigo);
 * */
///// AKI CREAMOS LOS ID DE LA CARRERA  PARA CARGAR AL FORMULARIO ////////
  $carrera = new Carrera();
  $carrera_sql = $carrera->getAll();
  $carrera_id = array();
  $carrera_nombre = array();
  while ($carrera_sql && $rows = mysql_fetch_array($carrera_sql[0])) 
 {
     $carrera_id[] = $rows['id'];
     $carrera_nombre[] = $rows['nombre'];
  }

  $smarty->assign('carrera_id', $carrera_id);
  $smarty->assign('carrera_nombre', $carrera_nombre);
 
  ///////// gestion /////////////////////

  $semestre = new Semestre();
  $semestre_sql = $semestre->getAll();
  $semestre_id = array();
  $semestre_codigo = array();
  while ($semestre_sql && $rows = mysql_fetch_array($semestre_sql[0])) 
 {
     $semestre_id[] = $rows['id'];
     $semestre_codigo[] = $rows['codigo'];
  }

  $smarty->assign('semestre_id', $semestre_id);
  $smarty->assign('semestre_codigo', $semestre_codigo);
////// AKI CREAMOS LOS ID DE LA MODALIDAD  PARA CARGAR AL FORMULARIO //////
  $modalidad = new Modalidad();
  $modalidad_sql = $modalidad->getAll();
  $modalidad_id = array();
  $modalidad_nombre = array();
  while ($modalidad_sql && $rows = mysql_fetch_array($modalidad_sql[0])) 
 {
     $modalidad_id[] = $rows['id'];
     $modalidad_nombre[] = $rows['nombre'];
  }

  $smarty->assign('modalidad_id', $modalidad_id);
  $smarty->assign('modalidad_nombre', $modalidad_nombre);
 
  // AKI CREAMOS LOS ID Del AREA  PARA CARGAR AL FORMULARIO
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
  
 // AKI CREAMOS LOS ID Del Sub Area  PARA CARGAR AL FORMULARIO
  $sub_area = new Sub_area();
  $sub_area_sql = $sub_area->getAll();
  $sub_area_id = array();
  $sub_area_nombre = array();
  while ($sub_area_sql && $rows = mysql_fetch_array($sub_area_sql[0])) 
 {
     $sub_area_id[] = $rows['id'];
     $sub_area_nombre[] = $rows['nombre'];
  }

  $smarty->assign('sub_area_id', $sub_area_id);
  $smarty->assign('sub_area_nombre', $sub_area_nombre); 
 
   // AKI CREAMOS LOS ID Del Institucion  PARA CARGAR AL FORMULARIO
  $institucion = new Institucion();
  $institucion_sql = $institucion->getAll();
  $institucion_id = array();
  $institucion_nombre = array();
  while ($institucion_sql && $rows = mysql_fetch_array($institucion_sql[0])) 
 {
     $institucion_id[] = $rows['id'];
     $institucion_nombre[] = $rows['nombre'];
  }

  $smarty->assign('institucion_id', $institucion_id);
  $smarty->assign('institucion_nombre', $institucion_nombre); 
  
  ///////////////////////// Administrador ///////////////////////
  
  $user=new Usuario(1);      ///mandar su "Id"
  $smarty->assign('user', $user);
   
////////////////////////////////////////////////////////////

// AKI CREAMOS LOS ID Del TuTOr = Usuario  PARA CARGAR AL FORMULARIO
  $usuario = new Usuario();
  $usuario_sql = $usuario->getAll();
  $usuario_id = array();
  $usuario_nombre = array();
  $usuario_apellidos = array();
  while ($usuario_sql && $rows = mysql_fetch_array($usuario_sql[0])) 
 {
     $usuario_id[] = $rows['id'];
     $usuario_nombre[] = $rows['nombre'];
     $usuario_apellidos[] = $rows['apellidos'];
 }

  $smarty->assign('usuario_id', $usuario_id);
  $smarty->assign('usuario_nombre', $usuario_nombre); 
  $smarty->assign('usuario_apellidos', $usuario_apellidos); 

        
 $perfilregistro = new Perfilregistro();
 //$smarty->assign("perfilregistro", $perfilregistro); 
 //GUARDA ALA BASE DE DATOS 
if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar' && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    if(isset($_POST['trabajoconjunto']))
    {
      if($_POST['trabajoconjunto']=="Si")
      {
        
    $perfilregistro->objBuidFromPost();
    $perfilregistro->estado = Objectbase::STATUS_AC;
    $perfilregistro->save();
      }
    }
   
    echo " <script> windows.location.href ='estudiante/index.php' </script>";
    //header('location:'.urldecode($url("estudiante/index.php")));
  }
  $token = sha1(URL . time());
  $_SESSION['register'] = $token;
  $smarty->assign('token',$token);
  $smarty->assign("ERROR", $ERROR);
  //No hay ERROR
  $smarty->assign("ERROR",'');
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}

$TEMPLATE_TOSHOW = 'perfilregistro/perfilregistros.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>
