{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
 <div class="rnd">
  <div id="container" class="clear">  
<!-- ####################################################################################################### -->   
 <form action="" method="post">
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 {section name=js_i loop=$JS}
      <script type="text/javascript" src="{$JS[js_i]}"></script>
 {/section}
 <center><h2 align="center"> <strong>FORMULARIO REGISTRÓ DE PERFIL </strong> </h2></center>
 <table width="76%" height="940" border="1">
  <tr>
    <td width="9%" rowspan="2" valign="top"><p><strong>Nombre </strong><br />
            <strong>Estudiante:</strong><strong> </strong></p></td>
    <td colspan="6" valign="top"><p align="right"><strong>No:
      <input name="numero" type="text" size="10" data-validation-engine="validate[required]" />
    </strong></p></td>
  </tr>
  <tr>
    <td colspan="5" valign="top" nowrap="nowrap"><p align="center"><strong>Apellidos </strong>&nbsp;:&nbsp;
            <input name="apellidos" value="{$usuari->apellidos}" type="text" size="20" />
    </p></td>
    <td width="52%" colspan="2" valign="top"><p align="center"><strong> Nombres </strong>&nbsp;:&nbsp;
            <input name="nombres" value="{$usuari->nombre}" type="text" size="20" />
    </p></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><p><strong>Tel&eacute;fono</strong> :
      <input name="telefono" type="text" value="" size="20" data-validation-engine="validate[required]"/>
    </p></td>
    <td colspan="4" valign="top"><blockquote>
      <p><strong>Email</strong>:
        <input name="email" value="{$usuari->email}" type="email" size="30" />
      </p>
    </blockquote></td>
  </tr>
  <!--
  <tr>
    <td colspan="7" align="left" valign="top"><p><strong>Primer Tutor</strong>:
      <select name=primertutor>
         <option>****SELECCIONE PRIMER TUTOR****</option>
        
   {html_options  values=$docente_id  output=$docente_nombre}
  
      </select>
    </p>
        <p><strong>Segundo Tutor</strong>:
          <select name=segundotutor>
              <option>****SELECCIONE SEGUNDO TUTOR****</option>
            
  {html_options  values=$docente_id  output=$docente_nombre}
      
          </select>
        </p>
      <p><strong>Tercer  Tutor</strong>:
        <select name=tercertutor>
              <option>****SELECCIONE TERCER TUTOR****</option>
          
   {html_options values=$docente_id  output=$docente_nombre}
      
        </select></p></td>
  </tr>
  -->
  
  <tr>
    <td height="77" colspan="6" valign="top"><p><strong>Carrera</strong>:
        <select name="carrera_id">
          <option>***SELECCIONE CARRERA***</option>
     {html_options values=$carrera_id output=$carrera_nombre}
        </select>
        <!-- <a class="active"  href="{$URL}carrera/registro.php">Nueva Carrera</a></p></td> -->
    </p>
      <p>        <strong>Gesti&oacute;n Aprobaci&oacute;n</strong>:
         <!-- <input name="gestionaprobacion" value="{$semestre->codigo}" type="text" size="15" /> -->
        <select name="semestre_id">
          <option>**GESTIÓN**</option>
           {html_options values=$semestre_id output=$semestre_codigo}
         </select>
      </p></td>
    <td valign="top"><blockquote>
      <p align="center"><strong> Trabajo Conjunto</strong>:&nbsp;
        <input type="checkbox" name="trabajoconjunto" value="Si" />
        <strong>Si</strong>&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="trabajoconjunto" value="No" />
        <strong>No</strong> </p>
    </blockquote></td>
  </tr>
  <tr>
    <td colspan="7" valign="top"><p><strong>T&iacute;tulo</strong>:
      <textarea name="titulo" cols="130" rows="1,5"></textarea>
    </p>    </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>&Aacute;rea</strong>:
      <select name="area_id">
              <option>***SELECCIONE ÁREA***</option>
        
   {html_options values=$area_id output=$area_nombre}
      
      </select>
        <a href="{$URL}area/registro.php" target="_blank">Nueva&Aacute;rea</a></p></td>
    <td valign="top"><p align="left"><strong>Sub&aacute;rea</strong>:
      <select name="sub_area_id">
        <option>***SELECCIONE SUB ÁREA***</option>
        
   {html_options values=$sub_area_id output=$sub_area_nombre}
    
      </select>
      
        <a href="{$URL}sub_area/registro.php" target="_blank"> Nueva Sub&aacute;rea</a></p></td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>Modalidad</strong>:
      <select name="modalidad_id">
              <option>***SELECCIONE MODALIDAD***</option>
        
   {html_options values=$modalidad_id output=$modalidad_nombre}
      
      </select>
            <!--   <a href="{$URL}modalidad/registro.php">Nueva Modalidad</a></p></td>  -->
    </p></td>
   <!-- oculta campo <INPUT TYPE="hidden" NAME="funcion"  VALUE="enviar_mail"> -->
    <td valign="top"><p align="left"><strong>Institución</strong>:
        <select name="institucion_id">
          <option>***SELECCIONE INSTITUCIÓN***</option>
        
   {html_options values=$institucion_id output=$institucion_nombre}
   </select>
        <a href="{$URL}institucion/registro.php" target="_blank"> Nueva Intitucion</a></p>    </td>
  </tr>
  <tr>
    <td height="75" colspan="7" valign="middle"><p><strong>Objetivo General</strong>:</p>
        <p align="center">
          <textarea name="objetivogeneral" cols="150" rows="2"></textarea>
      </p></td>
  </tr>
  <tr>
    <td height="203" colspan="7" valign="top"><p><strong>Objetivos Espec&iacute;ficos</strong>:</p>
        <p align="center">
          <textarea name="objetivoespecifico" cols="150" rows="10"></textarea>
      </p></td>
  </tr>
  <tr>
    <td height="203" colspan="7" valign="top"><p><strong>Descripci&oacute;n</strong>: </p>
        <p align="center">
          <textarea name="descripcion" cols="150" rows="10"></textarea>
      </p></td>
  </tr>
  <tr>
    <td height="116" colspan="7" valign="top"><p align="left"><strong>Formulario  Aprobaci&oacute;n</strong>:<a href= "formularioaprobacion" >
        <input  type="file" mutliple="true" name="formulariopdf"   size="35" maxlength="10000">
      </a></p>
      <p align="left"><strong>Fecha: </strong>        
      <input name="fecharegistro"  id="fecha" value={$smarty.now|date_format:"%D"} size="10"/>
      </p>
      <p align="left"><strong>Registrado Por: </strong>
        <input name="registradopor" value="{$user->nombre} {$user->apellidos}"  type="text"  size="26" />
      </p>    </td>
  </tr>
</table>
 
 <!--<INPUT TYPE="button" VALUE="Cargar otra ventana" onClick="window.location.replace ('button2.html');"> -->
 <!--<INPUT TYPE="button"  VALUE="Cerrar ventana"  onClick="window.close();"> -->
	
         <td height="26" colspan="10" valign="middle"><p align="center"><strong>&nbsp;</strong>  
                 
       <input type="hidden" name="tarea" value="registrar">
       <input type="hidden" name="token" value="{$token}">
        <input name="submit" type="submit" id="submit" value="Grabar">
           &nbsp;
       <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">        
    </p>
</form>
 </div>
 </div>
  
</div>
{include file="footer.tpl"}
