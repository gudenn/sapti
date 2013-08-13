<?php
require('_start.php');
  global $PAISBOX;
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=postergado.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php

 
$sql = "SELECT p.id,u.nombre, p.titulo ,p.gestionaprobacion,u.apellidos
FROM  estudiante e, perfilregistro p, usuario u
WHERE p.estudiante_id = e.id
AND e.usuario_id = u.id AND p.estado='DC'";
$result=mysql_query($sql);
 
?>
 
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<th width="50%" style="background-color:#006; text-align:center; color:#FFF"><strong>NOMBRE</strong></th>
<th width="50%" style="background-color:#006; text-align:center; color:#FFF"><strong>APELLIDOS</strong></th>
<th width="50%" style="background-color:#006; text-align:center; color:#FFF"><strong>TITULO</strong></th>
<th width="50%" style="background-color:#006; text-align:center; color:#FFF"><strong>GESTION</strong></th>
<?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["nombre"],$row["apellidos"],$row["titulo"],$row["gestionaprobacion"]);
}

  //Cierras la Conexión
?>
</table>
</body>
</html>