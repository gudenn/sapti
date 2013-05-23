<?php
/**
 * Esta clase es para guardar los datos tipo Estudiante
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Estudiante extends Objectbase 
{

 /**
  * Codigo identificador del Objeto Usuario
  * @var INT(11)
  */
  var $usuario_id;

 /**
  * Codigo sis del estudiante
  * @var VARCHAR(100)
  */
  var $codigo_sis;

  /**
   * Crear un estudiante a partir de su codigo sis o verificar que se puede usar un nuevo estudiante
   * 
   * @param string $codigo_sis el codigo_sis
   * @param type $verSiEstaDisponible para solo verificar si es que se puede usar este email
   * @return boolean
   * @throws Exception 
   */
  public function getByCodigoSis ($codigo_sis, $verSifueTomado = false ) {
    $sql       = "select * from ".$this->getTableName()." where codigo_sis = '$codigo_sis'";
    $result = mysql_query($sql);
    if ($result === false)
      throw new Exception("?".$this->getTableName ()."&m=Cant getByEmail <br />$sql<br /> ".$this->getTableName() . ' -> '. mysql_error() );

    if ($verSifueTomado)
    {
      if (mysql_num_rows($result))
        throw new Exception("?codigo_sis&m=Este Codigo SIS ya esta en Uso.");
      return;
    }

    $estudiante = mysql_fetch_array($result,MYSQL_BOTH);
    self::__construct($estudiante['id']);
    return true;
  }

  /**
   * Validamos al usuario ya sea para actualizar o para crear uno nuevo
   * @param type $es_nuevo
   */
  function validar($es_nuevo = true) {
    leerClase('Formulario');
    Formulario::validar('codigo_sis' ,$this->codigo_sis ,'texto','El Codigo SIS');
    if ( $es_nuevo ) // nuevo
      $this->getByCodigoSis($this->codigo_sis,true);
  }
}

?>