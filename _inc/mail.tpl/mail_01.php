<?php
  require_once("../_sistema.php");
  leerClase('Estudiante');
  leerClase('Mail');

  global  $revision;
  if ( !isset($revision) )
    $revision = new Mercaderia(55);
  $estudiante = new Usuario($revision->usuario_id);
  $MATERIA = new Materia($estudiante->pais_id);

  $href = $estudiante->getLinkParaconfirmarUsuario();
  $link = "<span style=\"font-size: 15px;\"><a href=\"$href\">Descargar Documento</a></span>";

  $style = "font-family: Verdana,Arial;font-size: 12px;"; 
  $date = date("F j, Y, g:i a");  ;
  
  
  $body_html = <<<___MAIL
    <div style="$style">
    Estimado/a <b>$estudiante->nombre $estudiante->apellidos</b>:<br>
    Hemos registrado Modificaciones <b>{$estudiante->codigo_sis}</b><br>
    
    <br><br><br>
    Detalle:
    <table style="$style;border:1px solid #000000;">
      <tr>
        <td>
          <b>
          Detalle:
          </b>
        </td>
        <td>
          {$revision->fecha}
        </td>
      </tr>
      <tr>
        <td>
          <b>
          Comentarios:
          </b>
        </td>
        <td>
          {$revision->comentarios}
        </td>
      </tr>
      <tr>
        <td>
          <b>
          Comentario:
          </b>
        </td>
        <td>
          {$revision->comentario}
        </td>
      </tr>
    </table>


    Fecha: {$date}<br>
    </div>
___MAIL;
  $body_txt  = "    
    Estimado/a $estudiante->nombre $estudiante->apellidos:
    Hemos registrado correccion {$estudiante->codigo_sis}
    

    Detalle:
    ------------------------------
    Detalle:\t\t{$revision->detalle}
    Comentario:\t{$revision->comentario}
    Link Doc:\t\t{$revision->link}
    ------------------------------





    Fecha:  \t  {$date}";

  /** Cuerpo del Email */
  require_once("mail_01.php");

  /** destinatarios */
  $url_name = $MATERIA->getTheUrlNAME(1);
  $url_mail = str_replace('www.', '', $url_name);
  
  $almacen   = new Almacen();
  $almacen->pais_id = $estudiante->pais_id;
  $almacenes = $almacen->getAll();
  while ($row = mysql_fetch_array($almacenes[0])) 
  {
    $administrador = new Administrador($row['administrador_id']);
    if ( trim($administrador->email) != '' )
      $to_addrs[]    = $administrador->email;
  }
  
  $to_addrs[] = "umss@$url_mail";
  $to_addrs[] = 'guyencu@gmail.com';
  $to_addrs[] = $estudiante->email;
  $Subject = "$url_name ingreso de mercaderia ";

  if (ENDESARROLLO)
  {
    echo "<pre>";
    print_r($almacenes);
    echo "</pre>";
    echo "<hr>";
    echo "Subject:$Subject";
    echo "<hr>";
    echo "<pre>";
    print_r($to_addrs);
    echo "</pre>";
    echo "<hr>";
    echo $body_html;
    echo "<hr>";
    echo "<pre>".$body_txt."</pre>";
  }
  else /** Enviamos el email */
  {
    require(DIR_LIB.'/Mail/mime.php');
    

      $message = new Mail_mime();
      $message->setTXTBody($body_txt);
      $message->setHTMLBody($body_html);
      $body = $message->get();
      $extraheaders = array(
          'From'    => "\"$url_name\"<envios@$url_mail>",
          'Subject' => $Subject
      );
      $headers = $message->headers($extraheaders);
      $mail    = Mail::factory('sendmail');//, $smtpinfo);

      foreach ($to_addrs as $to_addr)
      {
          $rv1 = $mail->send($to_addr, $headers, $body);
      }

  }

?>