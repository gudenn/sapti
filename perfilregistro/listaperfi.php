<?php
try {
require('_start.php');
  global $PAISBOX;

  /** HEADER */
  $smarty->assign('title','Proyecto Final');
  $smarty->assign('description','Proyecto Final');
  $smarty->assign('keywords','Proyecto Final');

  //CSS
  $CSS[]  = "css/style.css";
  $smarty->assign('CSS','');

  //JS
  $JS[]  = "js/jquery.js";
  $smarty->assign('JS','');
//include('sapti.inc/libs/smarty/Smarty.class.php' ); // incluimos smarty en nuestro archivo
//include('conectar.php' ); // incluimos nuestra clase con la conexi�n a la base de datos

//$smarty = new Smarty();  // creamos un objeto de tipo smarty para acceder a todas sus funciones
//$funciones = new funciones(); // creamos un objeto de nuestra clase funciones

//$funciones->conectar(); // invocamos la funcion conectar

$sql="select * from perfilregistro"; // creamos la sentencia sql

$query=mysql_query($sql); // ejecutamos la consulta

$i=0;
//creamos un ciclo el cual guardara en un arreglo los datos extraidos de la base de datos
while($col=mysql_fetch_array($query))
{

    $datos[$i]=array($col['numero' ], $col['gestionaprobacion' ], $col['titulo' ], $col['fecharegistro' ]); //se guardan los datos en un arreglo
    $i+=1;
}
    
mysql_close(); // se cierra la conexion a la base de datos
$smarty->assign('datos' ,$datos, $i); // mandamos el arreglo datos a la plantilla
$TEMPLATE_TOSHOW = 'perfilregistro/listaperfi.tpl';
$smarty->display($TEMPLATE_TOSHOW);
}
catch(Exception $e) 
{
  $smarty->assign("ERROR", handleError($e));
}
//$smarty->display('contactos.tpl' ); // desplegamos la plantilla indicando su nombre
?>