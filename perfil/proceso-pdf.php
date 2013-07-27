<?php
require_once('class.ezpdf.php');

$pdf =& new Cezpdf('LETTER');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
$conexion = mysql_connect("localhost", "root","");
mysql_select_db("sapti", $conexion);
$queEmp = "SELECT * FROM proceso ORDER BY id ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)){
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'id'=>'<b>numero</b>',
				'titulop'=>'<b>Titulo</b>',
				'autorp'=>'<b>Autor</b>',
				'tutorp'=>'<b>Tutor</b>',
				'gestionp'=>'<b>Gestion</b>',
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
//$txttit = "<b>Instituto Tecnológico de Los Mochis</b>\n";
//$txttit.= "Reporte general de prestamos de edificios\n";

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

?>