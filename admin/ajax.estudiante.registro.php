<?php
define ("MODULO", "DOCENTES-VER");
require_once("../_inc/_sistema.php");
if(!isAdminSession())
  exit('No tiene permiso');

if (isset($_GET['ajax'])){
  /**
   * Obtenemos los docentes de la materia
   */
  if ( isset($_GET['materia']) && isset($_GET['semestre']) )
  {
    leerClase('Materia');
    $materia = new Materia($_GET['materia']);
    $docentesDictan = $materia->getDocentesDictan($_GET['semestre']);
    
    foreach ($docentesDictan as $docente) {
      leerClase('Usuario');
      $usuario = new Usuario($docente->usuario_id);
      // mandamos el id de Dicta 
      $resp .= '{"optionValue":"'.$docente->dicta_id.'", "optionDisplay": "'.$usuario->nombre.'"},';
    }
    $resp = rtrim($resp,',');
    echo <<<____HERE_DOC
      [{"optionValue":"", "optionDisplay": "-- Seleccione --"},$resp]
____HERE_DOC;
    exit();
  }

}
echo <<<HERE_DOC
  [{"optionValue":0, "optionDisplay": "Select"}]
HERE_DOC;
?>