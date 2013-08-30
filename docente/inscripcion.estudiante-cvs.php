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

  $columnacentro = 'docente/columna.centro.inscripcion.estudiante-cvs.tpl';
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
  function array_envia($url_array) 
           {
               $tmp = serialize($url_array);
               $tmp = urlencode($tmp);
           
               return $tmp;
           };
  function array_recibe($url_array) { 
     $tmp = stripslashes($url_array); 
     $tmp = urldecode($tmp); 
     $tmp = unserialize($tmp); 

    return $tmp; 
  };
  if ( isset($_GET['ids']))
  $idmat = $_GET['ids'];
  $smarty->assign('ids', $idmat);
    if ( isset($_GET['mat']) )
  $mat = $_GET['mat'];
  $smarty->assign('mat', $mat);
    //CREAR UN ESTUDIANTE
  leerClase('Estudiante');
  leerClase('Inscrito');
  leerClase('Evaluacion');
  $docente=  getSessionDocente();
  $docenteid=$docente->id;
  $inscritos=array();
  $yainscritos=array();
  $noestudiante=array();
  
  if (isset($_POST['tarea']) && $_POST['tarea'] == 'registrar'  && isset($_POST['token']) && $_SESSION['register'] == $_POST['token'])
  {
    mysql_query("BEGIN");
    $aux      = str_replace(array("\r\n", "\r", "\n"), '#CODIGOX#', trim($_POST['cvs'])); 
    $estudiantes = explode('#CODIGOX#', $aux);
    if (count($estudiantes)>=1)
      foreach ($estudiantes as $estudiante_array) {
        $estudiante_array = explode(';', $estudiante_array);
        if (count($estudiante_array)>=1 && is_numeric($estudiante_array[1]) )
        {

                  $estudiante = new Estudiante();
                  $inscrito   = new Inscrito();
                  $evaluacion = new Evaluacion();
          $estudiante->getByCodigoSis($estudiante_array[1]);
            if ($estudiante->id){
                if(estainscrito($estudiante_array[1])=='0'){
                    $evaluacion->evaluacion_1=0;
                    $evaluacion->evaluacion_2=0;
                    $evaluacion->evaluacion_3=0;
                    $evaluacion->save();
                    $inscrito->evaluacion_id = $evaluacion->id;
                    $inscrito->estado        = Objectbase::STATUS_AC;
                    $inscrito->dicta_id      = $idmat;
                    $inscrito->estudiante_id = $estudiante->id;
                    $inscrito->save();
                    $inscritos[]=$estudiante_array;
                    }else{
                    $yainscritos[]=$estudiante_array;
                    }
            }else{
               $noestudiante[]=$estudiante_array;
                 }
        }
      }
      $yainscritos=array_envia($yainscritos);
      $inscritos=array_envia($inscritos);
      $noestudiante=array_envia($noestudiante);
      $url="inscripcion.estudiante-cvs-lista.php?yainscritos=$yainscritos&inscritos=$inscritos&noestudiante=$noestudiante";
            $ir = "Location: $url";
      header($ir);
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

$TEMPLATE_TOSHOW = 'docente/docente.3columnas.tpl';
$smarty->display($TEMPLATE_TOSHOW);

?>