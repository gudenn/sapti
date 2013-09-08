<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListaDir
 *
 * @author Hilda
 */

   $directorio = opendir("c:\\xampp\\htdocs\\sapti\\tutor\\Estudiantes\\Hilda Quiroz\\"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
         // echo $archivo . "<br />";
    }
  /*  else
    {
        echo $archivo . "<br />";
    }*/
}
?>
