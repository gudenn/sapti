<?php
require('_start.php');
  global $PAISBOX;
  require_once('class.ezpdf.php');
  $pdf =& new Cezpdf('LETTER');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
  $sqlr="SELECT p.id,u.nombre, p.titulo ,p.gestionaprobacion,u.apellidos
FROM  estudiante e, perfilregistro p, usuario u
WHERE p.estudiante_id = e.id
AND e.usuario_id = u.id AND p.cambiotema='si'; 
  ;";
$resEmp = mysql_query($sqlr) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)){
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'id'=>'<b>Numero</b>',
				'nombre'=>'<b>Nombres</b>',
				'apellidos'=>'<b>Apellidos</b>',
				'titulo'=>'<b>Titulo</b>',
				'gestionaprobacion'=>'<b>Gestion</b>',
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
//$txttit = "<b>Instituto Tecnol�gico de Los Mochis</b>\n";
$txttit.= "Lista de Perfiles que Realizaron Cambios\n";

$pdf->ezimage("umms4.JPG",0,500,'none','left');
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
//$pdf->ezText("<b>Hora:</b> ".date("H:i:s"),10);
//$pdf->ezText('<b>Fuente:</b> <c:alink:http://blog.unijimpe.net/>blog.unijimpe.net</c:alink>');
$pdf->ezStream();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
