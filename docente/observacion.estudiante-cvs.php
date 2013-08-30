<?php
try {
  require('_start.php');
  if(!isDocenteSession())
    header("Location: login.php");  

  /** HEADER */
  $smarty->assign('title','SAPTI - Inscripcion de Estudiantes');
  $smarty->assign('description','Formulario de Inscripcion de Estudiantes');
  $smarty->assign('keywords','SAPTI,Estudiantes,Inscripcion');

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
  $docente=  getSessionDocente();
  $docenteid=$docente->id;
  $columnacentro = 'docente/columna.centro.observacion.estudiante-cvs.tpl';
  $smarty->assign('columnacentro',$columnacentro);
    function estainscrito($sis) {
      $cond=0;
    $sql = "SELECT *
    FROM inscrito it, estudiante es
    WHERE it.estudiante_id=es.id
    AND es.codigo_sis='$sis'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result)){
        $cond=1;
    };
    return $cond;
    };
   function busquedaeva($sis) {
      $cond='';
    $sql = "SELECT *
    FROM inscrito it, estudiante es
    WHERE it.estudiante_id=es.id
    AND es.codigo_sis='$sis'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result)){
        $cond=1;
    };
    return $cond;
    };
    function array_envia($url_array) 
           {
               $tmp = serialize($url_array);
               $tmp = urlencode($tmp);
           
               return $tmp;
           };
 function esvacio($val){
     if($val!=null){
         if($val>0){
             $res=$val;
         }else{
         $res=0;             
         }
     }else{
     $res=0;    
     }
     return $res;
 }
    //CREAR UN ESTUDIANTE
  leerClase('Revision');
  leerClase('Observacion');
  $inscritos=array();
  $noestudiante=array();
  $sql="
SELECT ev.id as id, es.codigo_sis as codigo, pe.proyecto_id idproy
FROM docente dt, dicta di, estudiante es, inscrito it, evaluacion ev, proyecto_estudiante pe
WHERE di.docente_id=dt.id
AND di.id=it.dicta_id
AND it.estudiante_id=es.id
AND it.evaluacion_id=ev.id
AND pe.estudiante_id=es.id
AND dt.id=5
AND di.id=4   
        ";
         $resultado = mysql_query($sql);
 while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
   $arrayestudiantes[]=$fila;
  }

  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar'  && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    $aux      = str_replace(array("\r\n", "\r", "\n"), '#CODIGOX#', trim($_POST['cvs'])); 
    $estudiantes = explode('#CODIGOX#', $aux);
    if (count($estudiantes)>=1)
          foreach ($estudiantes as $estudiante_array) {
            $ins=0;
        $estudiante_array = explode(';', $estudiante_array);
        if (count($estudiante_array)>=1 && is_numeric($estudiante_array[1]) )
        {
                  for($i=0;$i<count($arrayestudiantes);$i++){
                      if($estudiante_array[1]==$arrayestudiantes[$i]['codigo']){
                          if($estudiante_array[3]!=''){
                                $revision = new Revision();
                                $observacion = new Observacion();
                                date_default_timezone_set('UTC');
                                $revision->fecha_revision=date("d/m/Y");
                                $revision->objBuidFromPost();
                                $revision->estado = Objectbase::STATUS_AC;
                                $revision->revisor=$docenteid;
                                $revision->proyecto_id=$arrayestudiantes[$i]['idproy'];
                                $revision->save();
                                $observacion->objBuidFromPost();
                                $observacion->estado = Objectbase::STATUS_AC;
                                $observacion->observacion=$estudiante_array[3];
                                $observacion->revision_id = $revision->id;
                                $observacion->save();
                                  $inscritos[]=$estudiante_array;
                                  $ins=1;
                                  $i=count($arrayestudiantes);
                          }else{
                                  $ins=1;
                                  $i=count($arrayestudiantes);
                          }
                    }
                  }
                  if($ins==0)
                  $noestudiante[]=$estudiante_array;
        }
      }
      $inscritos=array_envia($inscritos);
      $noestudiante=array_envia($noestudiante);
      $url="observacion.estudiante-cvs-lista.php?inscritos=$inscritos&noestudiante=$noestudiante";
            $ir = "Location: $url";
      header($ir);
  }
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