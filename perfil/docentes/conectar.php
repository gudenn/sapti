<?php
class funciones 
{
   // funcion para conectar a la Base de datos
    function conectar()
    {
       // abrimos la conexi�n a la base de datos indicando el hostname, usuario y contrase�a
       $mysql_id=mysql_connect('localhost' ,'root' ,'' );
       mysql_select_db('sapti2' ,$mysql_id); // indicamos el nombre de la base de datos
    } 
function cerrarBD($link){
 mysql_close($link);
}

 function consultaSelect( $sql )
 {
   global $enlace;
   $resultado = mysql_query( $sql, $enlace)
   		or die( "No se pudo realizar la consulta" );
 	return $resultado;
 }
//esta funcion solo contempla los casos para el uso de insert, create , update, alter tablas
function registrar($sql)
{
	//global $enlace;
	$resultado=mysql_query( $sql);
	return $resultado;
}

//Esta funcion devuelve el numero de filas del resultado de la consulta
//ingresando el resultado de la consulta , que se devuelve de mysql_query
function numFilas($tablaRes)
{
	$num_filas=mysql_num_rows($tablaRes);
	return $num_filas;
}

//funcion que devuelve el numero de campos en la tabla resultante
function numCampos($tablaRes)
{
	$numCols=mysql_num_fields ($tablaRes);
	return $numCols;
}

//esta funcion devuelve una fila completa , recibiendo la tabla Resultante
//que se devuelve de mysql_query
function extraerRegistro($tablaRes)
{
	$registro=mysql_fetch_array($tablaRes);
	return $registro;
}

//     Esta funcion cierra la conexion con una BD
function desconectarBD()
 {
   global $enlace;
   mysql_close($enlace); 
 }
 
//funcion que me detecta los errores y Devuelve el texto del mensaje de error de la última operación MySQL

function error()
{
global $enlace;
	$cadenaError=mysql_error ($enlace);	
	return $cadenaError;
}
}
?>