{include file="header.tpl"}

<!-- ####################################################################################################### -->
<div class="wrapper row3">
 <div class="rnd">
  <div id="container" class="clear">
     
<!-- ####################################################################################################### -->   

<!--include('Smarty.class.php'); -->
<center><h2 align="center"> <img src="../xampp/htdocs/sapti/images/umss-trian.jpg" width="80" height="85" align="middle" /><strong>FORMULARIO APROBACION TEMA DE TRABAJO DIRIGIDO</strong> <img src="Words/fcyt_logo.gif" width="85" height="85" align="middle" /></h2></center>
<table width="78%" height="911" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9%" rowspan="2" valign="top"><p><strong>Nombre </strong><br />
    <strong>Estudiante:</strong><strong> </strong></p></td>
    <td colspan="9" valign="top"><p align="right"><strong>  No:
                <input name="numero" type="text" size="10" />
</strong></p>    </td>
  </tr>
  <tr>
    <td colspan="3" valign="top" nowrap="nowrap"><p align="center"><strong>Ap.Paterno</strong>:
        <input name="appaterno" type="text" size="20" /></p></td>
    <td colspan="4" valign="top" nowrap="nowrap"><p align="center"><strong>Ap.Materno</strong><strong>: </strong>
      <input name="apmaterno" type="text" size="20" />
    </p></td>
    <td colspan="2" valign="top"><p align="center"><strong> Nombres</strong><strong>: </strong>
      <input name="nombre" type="text" size="20" />
    </p></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><p><strong>Tel&eacute;fono :</strong><strong> </strong>
            <input name="telefono" type="text" value="" size="20" />
</p>      </td>
    <td colspan="7" valign="top"><p><strong>Email :</strong>
            <input name="email" type="email" size="30" />
</p>    </td>
  </tr>
  <tr>
    <td colspan="10" align="left" valign="top"><p><strong>Primer Tutor :</strong> 
        <select name="primertutor">
          <option>---seleccione---</option>
        </select>
      </p>
      <p><strong>Segundo Tutor :</strong>
        <select name="segundotutor">
          <option>---seleccione---</option>
        </select>
      </p>
      <p><strong>Tercer  Tutor:</strong>      
        <select name="tercertutor">
          <option>---seleccione---</option>
        </select>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>Carrera :</strong><strong> </strong>
      <select name="carrera">
        <option>---seleccione---</option>
        </select>
    </p>      </td>
    <td colspan="4" valign="top"><p align="left"><strong>Trabajo Conjunto :</strong><strong></strong><strong> </strong>
      <select name="trabajoconjunto">
        <option>---seleccione---</option>
        <option>Si</option>
        <option>No</option>
        </select>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>Gesti&oacute;n Aprobaci&oacute;n :</strong><strong> </strong>
        <input name="gestionaprobacion" type="text" size="15" />
    </p>      </td>
    <td colspan="4" valign="top"><p align="left"><strong>Cambio de Tema :</strong><strong> </strong>
      <select name="cambiotema">
        <option>---seleccione---</option>
        <option>Si</option>
        <option>No</option>
        </select>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="10" valign="top"><p><strong>T&iacute;tulo: </strong>
        <textarea name="titulo" cols="115" rows="1.5"></textarea>
      </p>
    </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>&Aacute;rea :</strong><strong> </strong>
      <select name="area">
        <option>---seleccione---</option>
        </select>
    </p>      </td>
    <td colspan="4" valign="top"><p><strong>Sub&aacute;rea :</strong><strong> </strong>
      <select name="subarea">
        <option>---seleccione---</option>
        </select>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><p><strong>Modalidad :</strong><strong> </strong>
      <select name="modalidad">
        <option>---seleccione---</option>
        </select>
    </p>      </td>
    <td colspan="4" valign="top"><p><strong>Instituci&oacute;n Participante :</strong><strong> </strong>
        <select name="institucionparticipante">
        <option>---seleccione---</option>
        
        </select>
    </p>      </td>
  </tr>
  <tr>
    <td height="75" colspan="10" valign="middle"><p><strong>Objetivo General :</strong></p>
      <p align="center">
        <textarea name="objetivogeneral" cols="105" rows="2"></textarea>
    </p></td>
  </tr>
  <tr>
    <td height="203" colspan="10" valign="top"><p><strong>Objetivos Espec&iacute;ficos    :</strong></p>
      <p align="center">
         <textarea name="objetivoespecifico" cols="105" rows="10"></textarea>
    </p>      </td>
  </tr>
  <tr>
    <td height="203" colspan="10" valign="top"><p><strong>Descripci&oacute;n :</strong>
      </p>
      <p align="center">
        <textarea name="descripcionproyecto" cols="105" rows="10"></textarea>
    </p>      </td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="bottom"><p align="center">
      <select name="directorcarrera">
        <option>---seleccione---</option>
        </select></p>    </td>
    <td colspan="3" valign="top"><p align="center">
      <select name="docentemateria">
        <option>---seleccione---</option>
        </select></p>      </td>
    <td colspan="2" valign="top"><p align="center">
      <select name="tutor">
        <option>---seleccione---</option>
      </select>
        </p>    </td>
    <td colspan="2" valign="top"><p align="center">
      <select name="responsable">
        <option>---seleccione---</option>
        </select></p>      </td>
    <td width="18%" valign="top"><p align="left">
      <input name="estudiante" type="text" value="" size="25" />
    </p>      </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><p align="center"><strong>Director Carrera</strong></p></td>
    <td colspan="3" valign="top"><p align="center"><strong>Docente Materia</strong></p></td>
    <td colspan="2" valign="top"><p align="center"><strong>Tutor</strong></p></td>
    <td colspan="2" valign="top"><p align="center"><strong>Responsable</strong></p></td>
    <td valign="top"><p align="center"><strong> Estudiante</strong></p></td>
  </tr>
  <tr>
    <td colspan="7" valign="top"><p><strong>Formulario  Aprobaci&oacute;n :</strong>
        <input name="formularioaprobacion" type="file" size="25" />
      <br />
        <strong>Registrado    Por : </strong><strong> </strong>
        <input name="registradopor" type="text" size="35" />
    </p>      </td>
    <td colspan="2" valign="top"><p><strong>Firma:</strong><strong> </strong></p>        </td>
    <td valign="top" nowrap="nowrap"><p align="left"><strong>
      <label for="nombre"> Fecha: <br/>
      </label>
                <input type="date" size="25" id="fecha" name="fecharegistro" value="{$perfil->fecharegistro}" />
      
      <br />
        </strong> 
      </p>     
    </td>
  </tr>
  <tr>
    <td height="26" colspan="10" valign="middle"><p align="center"><strong>&nbsp;</strong> 
            <input type="submit" value="Guardar" name="Guardar" />
            <input type="reset" value="Resetear" name="Resetear" />           
    </p></td>
  </tr>
</table>


  
<!-- ####################################################################################################### -->
  </div> </div> </div>
{include file="footer.tpl"}
