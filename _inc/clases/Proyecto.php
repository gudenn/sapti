<?php
/**
 * Esta clase es para guardar los datos tipo Estudiante
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Proyecto extends Objectbase 
{

  /** constant to add in the begin of the key to find the date values   */
  const URL                  = "proyecto-final/";
  /** constant to add in the begin of the key to find the date values   */
  const ARCHIVO_PATH         = "archivo";
  /** constant to add in the begin of the key to find the date values   */
  const ARCHIVO_PREFOLDER    = "proyecto_";
  /** constant to add in the begin of the key to find the date values   */
  const ARCHIVO_CORRECIONES  = "/CORRECIONES";


 /**
  * Codigo identificador del Objeto Usuario
  * @var INT(11)
  */
  var $nombre;


 /**
  * (Objeto simple) todas las reviciones que tiene este proyecto
  * @var object|null 
  */
  var $revision_objs;

  /**
   * 
   * @param string $codigo_sis el codigo_sis
   * @param type $verSiEstaDisponible para solo verificar si es que se puede usar este email
   * @return boolean
   * @throws Exception 
   */
 
  
  function getProyectoAprobados()
  {
    //@TODO revisar
    //leerClase('Proyecto_area');
    leerClase('Area');
    
    $activo = Objectbase::STATUS_AC;
   $sql = "select p.* from ".$this->getTableName('Proyecto_estudiante')." as pe , ".$this->getTableName('Proyecto')." as p   where pe.estudiante_id = '$this->id' and pe.proyecto_id = p.id and pe.estado = '$activo' and p.estado = '$activo'  ";
   
 //$sql = "select a.* from ".$this->getTableName('Proyecto_area')." as pa , ".$this->getTableName('Area')." as a   where pa.proyecto_id = '$this->id' and pa.area_id = a.id and pa.estado = '$activo' and a.estado = '$activo'  ";
      
//echo $sql;
    $resultado = mysql_query($sql);
    if (!$resultado)
      return false;
    $proyecto = mysql_fetch_array($resultado);
    $proyecto = new Proyecto($proyecto);
    return $proyecto;
  }
  
    function getProyectoAsignados()
  {
   //leerClase('Proyecto');
    $activo = Objectbase::STATUS_AC;
   // $sql = "select p.* from ".$this->getTableName('Proyecto_estudiante')." as pe , ".$this->getTableName('Proyecto')." as p   where pe.estudiante_id = '$this->id' and pe.proyecto_id = p.id and pe.estado = '$activo' and p.estado = '$activo'  ";
   
 $sql = "select p.* from ".$this->getTableName('Proyecto_estudiante')." as pe , ".$this->getTableName('Proyecto')." as p   where pe.estudiante_id = '$this->id' and pe.proyecto_id = p.id and pe.estado = '$activo' and p.estado = '$activo'  ";
      
//echo $sql;
    $resultado = mysql_query($sql);
    if (!$resultado)
      return false;
    $proyecto = mysql_fetch_array($resultado);
    var_dump($proyecto);
    $proyecto = new Proyecto($proyecto);
    return $proyecto;
  }
  
  function getFolder()
  {
    return self::ARCHIVO_PREFOLDER.$this->id;
    
  }
  
  
   function getArea()
    {
    //@TODO revisar
   //  leerClase('Proyecto_area');
    leerClase('Area');
    
    $activo = Objectbase::STATUS_AC;
   $sql = "select a.* from ".$this->getTableName('Proyecto_area')." as pa , ".$this->getTableName('Area')." as a   where pa.proyecto_id = '$this->id' and pa.area_id = a.id and pa.estado = '$activo' and a.estado = '$activo'  ";
     $resultado = mysql_query($sql);
    if (!$resultado)
      return false;
    $areas = mysql_fetch_array($resultado);
    $area = new Area($areas);
    return $area;
    }
  
  
  
}

?>