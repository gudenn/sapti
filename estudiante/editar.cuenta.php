<?php 
// Editar un usuario a travez del formulario de registro
  require_once('_start.php');
  if(!isEstudianteSession())
    header("Location: login.php");  
  include('registro.php');

?>