<?php

/**
 * Esta clase es para guardar los datos tipo Usuario
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Usuario  extends Objectbase 
{

 /**
  * Nombre del usuario
  * @var VARCHAR(100)
  */
  var $nombre;

 /**
  * Apellidos paterno y/o materno del usuario
  * @var VARCHAR(100)
  */
  var $apellidos;  

 /**
  * Email del estudiante
  * @var VARCHAR(100)
  */
  var $email;

 /**
  * Email del estudiante
  * @var DATE(100)
  */
  var $fecha_cumple;

 /**
  * Login del usuario
  * @var VARCHAR(45)
  */
  var $login;

 /**
  * Clave del usuario 
  * La clave del usuario minimo 5 digitos
  * @var VARCHAR(45)
  */
  var $clave;

 /**
  * CI del usuario
  * @var VARCHAR(45)
  */
  var $ci;

  /**
  * Sexo del usuario Puede ser M de Masculino o F de Femenino y en el futoro se puede manejas otros datos
  * @var VARCHAR(45)
  */
  var $sexo;
  
 /**
  * (Arreglo de objetos) El Tutor que esta asignado a este usuario
  * @var object|null 
  */
  var $tutor_objs;
  
 /**
  * (Arreglo de objetos) El Docente que esta asignado a este usuario
  * @var object|null 
  */
  var $docente_objs;
  
 /**
  * (Arreglo de objetos) El Tribunale que esta asignado a este usuario
  * @var object|null 
  */
  var $tribunal_objs;
  
 /**
  * (Arreglo de objetos) El estudiante que esta asignado a este usuario
  * @var object|null 
  */
  var $estudiante_objs;

  /**
   * Crear un usario a partir de su login o verificar que se puede usar un login
   * 
   * @param string $login el login
   * @param type $verSiEstaDisponible para solo verificar si es que se puede usar este email
   * @return boolean
   * @throws Exception 
   */
  public function getByLogin ($login, $verSifueTomado = false ) {
    $sql       = "select * from ".$this->getTableName()." where login = '$login'";
    $result = mysql_query($sql);
    if ($result === false)
      throw new Exception("?".$this->getTableName ()."&m=Cant getByEmail <br />$sql<br /> ".$this->getTableName() . ' -> '. mysql_error() );

    if ($verSifueTomado)
    {
      if (mysql_num_rows($result))
        throw new Exception("?login&m=Este login ya fue tomado");
      return;
    }

    $usuario = mysql_fetch_array($result,MYSQL_BOTH);
    self::__construct($usuario['id']);
    return true;
  }

  /**
   * Validamos al usuario ya sea para actualizar o para crear uno nuevo
   * @param type $es_nuevo
   */
  function validar($es_nuevo = true) {
    leerClase('Formulario');
    Formulario::validar('ci'                ,$this->ci          ,'texto','El CI');
    Formulario::validar('nombre'            ,$this->nombre      ,'texto','El Nombre');
    Formulario::validar('apellidos'         ,$this->apellidos   ,'texto','Los Apellidos',TRUE);
    Formulario::validar('login'             ,$this->login      ,'texto','El Login');
    if ( $es_nuevo ) // nuevo
    {
      $this->getByLogin($this->login,true);
      Formulario::validarPassword('clave',$this->clave, isset($_POST['clave2'])?$_POST['clave2']:false ,TRUE);
    }
    else
    {
      $pas1 = isset($_POST['password1'])?$_POST['password1']:false;
      $pas2 = isset($_POST['password2'])?$_POST['password2']:false;
      $pas3 = isset($_POST['password3'])?$_POST['password3']:false;
      Formulario::validarCambioPassword('password',$this->password,$pas1,$pas2,$pas3,true,'texto','La Clave de acceso',FALSE);
      $this->password = $pas2;
    }
    Formulario::validar_fecha('fecha_cumple',$this->fecha_cumple,TRUE);
  }
}

?>