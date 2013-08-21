<?php

try {
 require('_start.php');
  global $PAISBOX;
  /** HEADER */
  
  
  if(!isEstudianteSession())
    header("Location: ../estudiante/login.php");  

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
 leerClase("Proyecto");
 
  
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
  
  
  
  $id     = '';
 
  if (isEstudianteSession())
  {
    $estudiante = getSessionEstudiante();
    $id     = $estudiante->id;
  }
  echo  $id;

  //$estudiante = new Estudiante($id);
  //$usuario    = new Usuario($estudiante->usuario_id);
 $usuario    = new Usuario($id);

  echo $usuario->nombre;
  $smarty->assign("usuario"   , $usuario);
  //$smarty->assign("estudiante", $estudiante);
  
 
  
  
  

  $smarty->assign('institucion_id', $institucion_id);
  $smarty->assign('institucion_nombre', $institucion_nombre); 
  
   
  /////////////////////// Creamos estudiante ////////////////////////
  $resultado=mysql_query("SELECT e.`id` ,e.`codigo_sis`,u.`nombre`, u.`apellidos` , u.`email`
from `usuario` u , `estudiante` e
where u.`id`=e.`usuario_id` and u.`estado`='AC';");
  
////////////////////////////////////////////////////////////

// AKI CREAMOS TUTOR PARA CARGAR AL FORMULARIO
  $tutor = new Tutor();
  $tutor_sql = $tutor->getAll();
  $tutor_id = array();
  $tutor_nombre = array();
  $tutor_apellidos = array();
  while ($tutor_sql && $rows = mysql_fetch_array($tutor_sql[0])) 
 {
      
     $tutor_id[] = $rows['id'];
     $nombres=$rows['nombre']+ $rows['apellidos'];
     $tutor_nombre[] = $nombres;
     $tutor_apellidos[] = $rows['apellidos'];
 }

  $smarty->assign('tutor_id', $tutor_id);
  $smarty->assign('tutor_nombre', $tutor_nombre); 
  $smarty->assign('tutor_apellidos', $tutor_apellidos); 
  
  
      $sqls="
SELECT d.`id` ,u.`nombre`, u.`apellidos`
from `usuario` u , `docente` d
where u.`id`=d.`usuario_id` and u.`estado`='AC' and d.`estado`='AC';";
 $resultado = mysql_query($sqls);
 
$docente_id= array();
$docente_nombre=array();
 while ($fila = mysql_fetch_array($resultado)) 
 {
    // var_dump($fila);
   $docente_id[]     = $fila['id'];
   $docente_nombre[] = $fila['nombre'] ;

 }
  $smarty->assign("docente_id"   , $docente_id);
  $smarty->assign("docente_nombre", $docente_nombre);
 
 
 
 
//////////////////  creamos docente/////////////////////
  $docente = new Docente();
  $docente_sql = $docente->getAll();
  $docente_sql_id = array();
  $docente_nombre = array();
  $docente_apellidos = array();
  $docente_email = array();
  while ($docente_sql && $rows = mysql_fetch_array($docente_sql[0])) 
 {
     $docente_id[] = $rows['id'];
    
  }

  //$smarty->assign('docente_id', $estudiante_id);
  $smarty->assign('docente_nombre', $estudiante_nombre); 
  $smarty->assign('docente_apellidos', $estudiante_apellidos);
  $smarty->assign('docente_email', $do_email); 

 /*
$upload = new upload;    // upload
$upload ->SetDirectory($dir);
$file = $_FILES['formularioaprobacion']['dir'];
$arreglo['url_documento']= " ";
if ($_FILES[$perfilregistro->formularioaprobacion]['dir'] != " ")
  {
  $tipo_archivo = $_FILES[$perfilregistro->formularioaprobacion]['type'];
  if (!(strpos($tipo_archivo, "pdf")))
   {
    $todoOK = false;
   echo "<script>alert('solo archivos pdf. Por favor verifique e intente de nuevo, tipo: ".$tipo_archivo."');</script>";
  } else 
  {
       $tamanio = $_FILES[$perfilregistro->formularioaprobacion]['size'];
	 $dir = "pdf_".time();
	 $upload -> SetFile("formularioaprobacion");
	 if ($upload -> UploadFile( $dir ))
	  {
	   $urldocumento = "$dir".$dir.".".$upload->ext;
	  }
      }
   }
// }         
   */    
///// crear un perfilregistro////////////////
  $perfilregistro = new Perfilregistro();
  $perfilregistro_sql = $perfilregistro->getAll();
  $perfilregistro_id = array();
  $perfilregistro_nombre = array();
  while ($perfilregistro_sql && $rows = mysql_fetch_array($perfilregistro_sql[0])) 
 {
     $perfilregistro_id[] = $rows['id'];
     $perfilregistro_nombre[] = $rows['titulo'];
  }
  $smarty->assign('perfilregistro_id', $perfilregistro_id);
  $smarty->assign('perfilregistro_titulo', $perfilregistro_titulo);          
          

 //GUARDA ALA BASE DE DATOS 
if (isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' && isset($_POST['token']) && $_SESSION['grabar'] == $_POST['token'])
  {
    if(isset($_POST['trabajoconjunto']))
    {
      if($_POST['trabajoconjunto']=="Si")
      {
        echo $_POST['trabajoconjunto'];
      }
      else
      {
        echo $_POST['trabajoconjunto'];
      }
    }
    $perfilregistro->objBuidFromPost();
    $perfilregistro->estado = Objectbase::STATUS_AC;
    $perfilregistro->save();
  }
/*  
if (isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {  
    echo 'hola eli';
    if(isset($_POST['trabajoconjunto']))
    {
      if($_POST['trabajoconjunto']=="Si")
      {
        echo $_POST['trabajoconjunto'];
      }else
      {
        echo $_POST['trabajoconjunto'];
      }
    }
  
      $perfilregistro->objBuidFromPost();
      $perfilregistro->estado = Objectbase::STATUS_AC;
      $perfilregistro->save();
   }
*/
    /*   if (isset($_POST['ids']))
 
  
     foreach ($_POST['ids'] as $id)
     {
       echo $id;
        $perfilregistro= new Perfilregistro();         
        $perfilregistro->usuario_id =$id;
        $perfilregistro->estado = Objectbase::STATUS_AC;
        $perfilregistro->proyecto_tribunal_id=$perfilregistro->id;;
        $perfilregistro->objBuidFromPost();
        $perfilregistro->save();
     } */
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