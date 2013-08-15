<?php
include './upload.lib.php';
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
 // $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');
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
 
  
 $perfilregistro = new Perfilregistro();
 $smarty->assign("perfilregistro", $perfilregistro);

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

  $smarty->assign('institucion_id', $institucion_id);
  $smarty->assign('institucion_nombre', $institucion_nombre); 
  
  ///////////////////////// Estudiante ///////////////////////
  
  $estudiante= new Estudiante();
  $user=new Usuario(1);   ///mandar su "Id"
  $smarty->assign('user', $user);
  
  //$smarty->assign();
  
  /////////////////////// Creamos estudiante ////////////////////////
  $estud = new Estudiante();
  $estud_sql = $estud->getAll();
  $estud_sql_id = array();
  $estud_nombre = array();
  while ($estud_sql && $rows = mysql_fetch_array($estud_sql[0])) 
 {
     $estud_id[] = $rows['id'];
     $estud_nombre[] = $rows['nombre'];
  }

  $smarty->assign('estudiante_id', $estud_id);
  $smarty->assign('estudiante_nombre', $estud_nombre); 
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

/**
  $perfilregistro->numero=9;
  
  $perfilregistro->telefono=09;
  $perfilregistro->trabajoconjunto='si';
  $perfilregistro->gestionaprobacion="10uu";
  $perfilregistro->cambiotema='SI';
  $perfilregistro->titulo="KJFDL";
  $perfilregistro->objetivogeneral="DF";
  $perfilregistro->objetivoespecifico="FADSFAS";
  $perfilregistro->descripcionperfil="SDAFS";
  $perfilregistro->registradopor="JJJJ";
  $perfilregistro->estado="AC";
  $perfilregistro->verificaperfil_id=1;
  $perfilregistro->usuario_id=1;
  $perfilregistro->carrera_id=1;
  $perfilregistro->modalidad_id=1;
  $perfilregistro->institucion_id=1;
  $perfilregistro->area_id=1;
  $perfilregistro->sub_area_id=1;
  $perfilregistro->docente_id=1;
//$dirigido->verificaperfil_id=1;
 // $perfilregistro->objBuidFromPost();
  //$perfilregistro->save();
  */

  
  
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
if ( isset($_POST['tarea']) && $_POST['tarea'] == 'grabar' )
  {  
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
  }
      $perfilregistro->objBuidFromPost();
      $perfilregistro->estado = Objectbase::STATUS_AC;
      $perfilregistro->save();
    
     if (isset($_POST['ids']))
     foreach ($_POST['ids'] as $id)
     {
       echo $id;
        $perfilregistro= new Perfilregistro();         
        $perfilregistro->usuario_id =$id;
        $perfilregistro->estado = Objectbase::STATUS_AC;
        $perfilregistro->proyecto_tribunal_id=$perfilregistro->id;;
        $perfilregistro->objBuidFromPost();
        $perfilregistro->save();
     }
  $smarty->assign("ERROR", $ERROR);
  //No hay ERROR
  $smarty->assign("ERROR",'');
} 
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
$TEMPLATE_TOSHOW = 'perfilregistro/perfilregistro.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>