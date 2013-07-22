<?php

class Materia extends Objectbase 
{
  
  
 /**
  * Id de la materia
  * @var INT(11)
  */
  var $nombre;
  
  /**
   * Obtiene todos los docentes que dictan una materia por semestre
   * 
   * @author Guyen Campero <guyencu@gmail.com>
   * 
   * @param type $semestre_id identificador del semestre
   * @return boolean|\Docente
   */
  function getDocentesDictan($semestre_id)
  {
    leerClase('Dicta');
    leerClase('Docente');
    $docentesQueDictan = new Dicta();
    $docentesQueDictan->materia_id  = $this->id;
    $docentesQueDictan->semestre_id = $semestre_id;
    $docentesQueDictan->estado      = Objectbase::STATUS_AC;
    $result =  $docentesQueDictan->getAll();
    if (!$result)
      return false;
    $docentes = array();
    while ($row = mysql_fetch_array($result[0]))
    {
      $docente_aux = new Docente($row['docente_id']);
      $docente_aux->dicta_id = $row['id'];
      $docentes[]  = $docente_aux;
    }
    return $docentes;    
    
  }
}


?>
