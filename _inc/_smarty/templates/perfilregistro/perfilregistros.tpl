{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
 <div class="rnd">
  <div id="container" class="clear">  
<!-- ####################################################################################################### -->   
 <form action="" method="post">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <center><h2 align="center"> <strong>FORMULARIO REGISTRÓ DE PERFIL </strong> </h2></center>
 <table width="78%" height="911" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9%" rowspan="2" valign="top"><p><strong>Nombre </strong><br />
    <strong>Estudiante:</strong><strong> </strong></p></td>
    <td colspan="9" valign="top"><p align="right"><strong> No:
                <input name="numero" type="text" size="10" />
  </strong></p></td>
  </tr>
  <tr>
    <td colspan="6" valign="top" nowrap="nowrap"><p align="center"><strong>Apellidos </strong>&nbsp;:&nbsp;
        <input name="apellidos" value="{$usuario->apellidos}" type="text" size="20" /></p></td>

    <td colspan="6" valign="top"><p align="center"><strong> Nombres </strong>&nbsp;:&nbsp; 
      <input name="nombres" value="{$usuario->nombre}" type="text" size="20" />
    </p></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><p><strong>Tel&eacute;fono</strong> :
            <input name="telefono" type="text" value="" size="20" />
  </p> </td>
    <td colspan="7" valign="top"><p><strong>Email</strong>:
            <input name="email" value="{$usuario->email}" type="email" size="30" />
  </p> </td>
  </tr>
  <tr>
    <td colspan="10" align="left" valign="top"><p><strong>Primer Tutor</strong>: 
            
        <select name=primertutor> 
       <option>-----Seleccione-----</option>
    {html_options  values=$docente_id output=$docente_nombre} 
      </select>
      </p>
      <p><strong>Segundo Tutor</strong>:
       <select name=segundotutor>
           <option>-----Seleccione-----</option>
   {html_options values=$usuario_id output=$usuario_nombre}
      </select>
      </p>
      <p><strong>Tercer  Tutor</strong>:      
       <select name=tercertutor>
           <option>-----Seleccione-----</option>
   {html_options values=$usuario_id output=$usuario_nombre}
      </select>
      </p> </td>
  </tr>
  <tr>
    <td colspan="6" valign="top">
        <p><strong>Carrera</strong>:
      <select name=carrera>
          <option>-----Seleccione-----</option>
   {html_options values=$carrera_id output=$carrera_nombre}
      </select>
  <!-- <a class="active"  href="{$URL}carrera/registro.php">Nueva Carrera</a></p></td> -->
    <td colspan="4" valign="top"><p align="left"><strong>Trabajo Conjunto</strong>:
        
    <INPUT type="radio" name="trabajoconjunto" value="Si" ><strong>Si</strong>
    <INPUT type="radio" name="trabajoconjunto" value="No"> <strong>No</strong>

  
    </p>      </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>Gesti&oacute;n Aprobaci&oacute;n</strong>:
        <input name="gestionaprobacion" type="text" size="15" />
    </p>      </td>
    <td colspan="4" valign="top"><p align="left"><strong>Cambio de Tema</strong>:
        <INPUT type="radio" name="cambiotema" value="Si" > <strong>Si</strong>
    <INPUT type="radio" name="cambiotema" value="No"> <strong>No</strong>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="10" valign="top"><p><strong>T&iacute;tulo</strong>:
        <textarea name="titulo" cols="115" rows="1.5"></textarea>
      </p>
    </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>&Aacute;rea</strong>:
     <select name=area>
         <option>-----Seleccione-----</option>
   {html_options values=$area_id output=$area_nombre}
      </select>
     <a href="{$URL}area/registro.php">Nueva &Aacute;rea</a></td>
    </p>  
    <td colspan="4" valign="top"><p><strong>Sub &aacute;rea</strong>:
      <select name=subarea>
          <option>-----Seleccione-----</option>
   {html_options values=$sub_area_id output=$sub_area_nombre}
      </select>
       <a href="{$URL}sub_area/registro.php">Nueva Sub &aacute;rea</a></p></td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>Modalidad</strong>:
      <select name=modalidad>
          <option>-----Seleccione-----</option>
   {html_options values=$modalidad_id output=$modalidad_nombre}
      </select>
   <!--   <a href="{$URL}modalidad/registro.php">Nueva Modalidad</a></p></td>  -->
         
    <td colspan="4" valign="top"><p><strong>Institución</strong>:
        <select name=institucion>
            <option>-----Seleccione-----</option>
   {html_options values=$institucion_id output=$institucion_nombre}
      </select>
         <a href="{$URL}institucion/registro.php">Nueva Institución</a></p></td>
  </tr>
  <tr>
    <td height="75" colspan="10" valign="middle"><p><strong>Objetivo General</strong>:</p>
      <p align="center">
        <textarea name="objetivogeneral" cols="105" rows="2"></textarea>
    </p></td>
  </tr>
  <tr>
    <td height="203" colspan="10" valign="top"><p><strong>Objetivos Espec&iacute;ficos</strong>:</p>
      <p align="center">
         <textarea name="objetivoespecifico" cols="105" rows="10"></textarea>
    </p>      </td>
  </tr>
  <tr>
    <td height="203" colspan="10" valign="top"><p><strong>Descripci&oacute;n</strong>:
      </p>
      <p align="center">
        <textarea name="descripcionperfil" cols="105" rows="10"></textarea>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="bottom"><p align="center">
      <select name=directorcarrera> 
          <option>-----Seleccione-----</option>
    {html_options values=$usuario_id output=$usuario_nombre}
      </select>
    </p> 
    </td>
    <td colspan="3" valign="top"><p align="center">
      <select name=docentemateria> 
          <option>-----Seleccione-----</option>
    {html_options values=$usuario_id output=$usuario_nombre}
      </select>
     </p>
    </td>
    <td colspan="2" valign="top"><p align="center">
      <select name=tutor> 
          <option>-----Seleccione-----</option>
    {html_options values=$usuario_id output=$usuario_nombre}
      </select>
     </p>
    </td>
    <td colspan="2" valign="top"><p align="center">
      <select name=revisor> 
          <option>-----Seleccione-----</option>
    {html_options values=$usuario_id output=$usuario_nombre}
      </select>
    </p> 
    </td>
    <td width="18%" valign="top"><p align="left">
       <input name="estudiante" value="{$user->nombre} {$user->apellidos}"  type="text"  size="26" />
    </p>    
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><p align="center"><strong>Director Carrera</strong></p></td>
    <td colspan="3" valign="top"><p align="center"><strong>Docente Materia</strong></p></td>
    <td colspan="2" valign="top"><p align="center"><strong>Tutor</strong></p></td>
    <td colspan="2" valign="top"><p align="center"><strong>Revisor</strong></p></td>
    <td valign="top"><p align="center"><strong> Estudiante</strong></p></td>
  </tr>
  <tr>
    <td colspan="7" valign="top"><p><strong>Formulario  Aprobaci&oacute;n</strong>:
            
     <a href= "formularioaprobacion" ><input name="formularioaprobacion"  type="file"/></a>  
        <strong>Registrado Por: </strong>
        <input name="registradopor" value="{$user->nombre} {$user->apellidos}"  type="text"  size="26" />    
     <!--  <input name="registradopor" type="text" size="35" />  -->
    </p>      </td>
    <td colspan="2" valign="top"><p><strong>Firma</strong>:</p></td>
    <td valign="top" nowrap="nowrap"><p align="left"><strong>
      <label for="nombre">Fecha:<br/>
      </label>
        <input type="date" size="25" id="fecha" name="fecharegistro" value="{$smarty.now|date_format:"%D"}" />   
        </strong> 
      </p>     
    </td>
  </tr>
 </table>
 <td height="26" colspan="10" valign="middle"><p align="center"><strong>&nbsp;</strong> 
        
       <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registrar" />
       
          <!--  <input type="reset" value="Restear" name="Resetear" /> -->
          <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">     
    </p>
   </p>
			
  </div>
</form>
<!-- ####################################################################################################### -->
  </div> 
 </div> 
</div>
{include file="footer.tpl"}