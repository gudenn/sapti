<?php

/**
 * Esta clase es para guardar los datos tipo Uusuario
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
  * Password del usuario
  * @var VARCHAR(45)
  */
  var $clave;

 /**
  * CI del usuario
  * @var VARCHAR(45)
  */
  var $ci;
}

?>