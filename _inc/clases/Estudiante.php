<?php
/**
 * Esta clase es para guardar los datos tipo Estudiante
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Estudiante extends Objectbase 
{
 /**
  * Codigo sis del estudiante
  * @var VARCHAR(100)
  */
  var $codigo_sis;

 /**
  * Cedula de identidad
  * @var VARCHAR(100)
  */
  var $ci;

 /**
  * Nombre del estudiante
  * @var VARCHAR(100)
  */
  var $nombre;

 /**
  * Apellidos paterno y/o materno del estudiante
  * @var VARCHAR(100)
  */
  var $apellidos;

 /**
  * Cumpleanios del estudiante
  * @var DATE
  */
  var $fecha_cumple;

 /**
  * Sexo del estudiante
  * @var VARCHAR(2)
  */
  var $sexo;

 /**
  * Estado civil del estudiante
  * @var VARCHAR(2)
  */
  var $estado_civil;

 /**
  * Email del estudiante
  * @var VARCHAR(150)
  */
  var $email;

 /**
  * Login del estudiante
  * @var VARCHAR(20)
  */
  var $login;

 /**
  * Password del estudiante
  * @var VARCHAR(100)
  */
  var $password;

}

?>