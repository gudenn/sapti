
<?php

/**
 * generarPDF: genra informe en pdf
 *
 * @param html Código HTML
 * @param  modo Salida.
   I - Incrustado en el navegador,
  D - Fuerza el Fichero para descarga,
 */
  require('_start.php');

function generarPDF($html,$modo='I'){

  // require_once($_SERVER['DOCUMENT_ROOT'].'/tcpdf/config/lang/es.php');
   require_once($_SERVER['DOCUMENT_ROOT'].'/tcpdf/tcpdf.php');
   // Crear nuevo informe
   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   // Información del documento
   $pdf->SetCreator(PDF_CREATOR);
   $pdf->SetAuthor('12bytes');
   $pdf->SetTitle('Ejemplo PDF');
   $pdf->SetSubject('docebytes.blogspot.com');
   //Keywords asociadas al documento
   $pdf->SetKeywords('12bytes, PDF, tcpdf');

   // Cabecera del informe
   $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

   // Configuración de fuentes para cabecera y pie
   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

   // Mismo ancho para los caracteres
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

   //Margenes
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

   //Salto de página automático al llegar al final de una página
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

   //relación para escalado de imagen
   $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
   // Fuente para el contenido
   // Las fuentes las puedes colocar en el directorio fonts
   // Es recomendable usar fuentes de poco tamaño para generar pdfs de menor tamaño
   $pdf->SetFont('helvetica', '', 10);

   //Añadir primera página
   $pdf->AddPage();

   //HTML pasado como parametro
   $htmlcontent = $html;

   // Salida del  HTML
   $pdf->writeHTML($htmlcontent, true, 0, true, 0);
   $pdf->Output('informe.pdf', $modo);

}

//Usuarios
$usuarios = array();
//Conexion a la BD
$BD = mysqli_connect("localhost","root","");
mysqli_select_db($BD,"sapti");
$q = mysqli_query($BD,"SELECT * FROM usuario");
//Almacenamos los usuarios en el array usuarios
while ($usuario = mysqli_fetch_assoc($q)) {
 $usuarios[] = $usuario;
}
//Cerrar conexion BD
mysqli_close($BD);
//Datos para la plantilla
$smarty->assign('usuarios',$usuarios);
//HTML
$html = $smarty->fetch('tribunal/pdf.tpl');

//Ejemplo de como generar un informe
generarPDF($html,'D');
?>