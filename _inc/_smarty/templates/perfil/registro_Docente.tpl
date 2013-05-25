{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <form action="" method="post">
        <table width="433" border="1"  align="center" cellpadding="5" cellspacing="5" bordercolor="#999999" class="Estilo1">
  <form action ="registrarDocente.php" method ="post" name="form" id="form" autocomplete="off" enctype="multipart/form-data">
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO DE DOCENTE</strong></td>
    </tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7">
<table width="100%">
	  		  <tr>
	  		  	<td width="43%" class="label" style="text-align:right" ><strong>
	  		  	  <label id="nombre_doc" for="nombre_doc">(*) Nombres:</label>
	  		  	</strong></td>
	  		  	<td width="57%" class="field" style="text-align:left"><input class="input_box" id="nombre_doc" name="nombre_doc" value="{$docente->nombre_doc}" type="text" maxlength="100" onkeypress="return permite(event, 'car')" /></td>
  		  	  </tr>
			   <tr>
	  		  	<td class="label" style="text-align:right"><strong>
	  		  	  <label id="apellido_doc" for="apellido_doc">(*) Apellidos:</label>
	  		  	</strong></td>
	  		  	<td class="field" style="text-align:left"><input  class="input_box"id="apellido_doc" name="apellido_doc" type="text" maxlength="100"  value="{$docente->apellido_doc}"onkeypress="return permite(event, 'car')"/></td>
  		  	  </tr>
			  
	  		  <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="ci_doc" for="ci">(*) CI:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><input class="input_box_peque" name="ci_doc" type="text" id="ci_doc" size=""  value="{$docente->ci_doc}"onkeypress="return permite(event, 'num')" maxlength="7"/></td>
  			  </tr>

			  <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="fecha_nac" for="fecha_doc">(*) Fecha Nacimiento:</label>
	  			</strong></td>
	  			<td class="field"  style="text-align:left"><input  class="input_box"id="fecha_doc" name="fecha_doc" type="date" maxlength="150"  onkeypress="return permite(event, 'num')"/>(aaaa-mm-dd)</td>
  			  </tr>
			  
			   <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="telefono" for="telefono">Telefono:</label>
	  			</strong></td>
	  			<td class="field"  style="text-align:left">
                <input  class="input_box"id="telefono" name="telefono" type="text" maxlength="150"  value="{$docente->telefono}" onkeypress="return permite(event, 'num')"/></td>
  			  </tr>
			   <tr>
	  			<td  style="text-align:right"><strong>
	  			  <label id="email" for="email">(*) email:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><span class="field" style="text-align:left">
	  			  <input class="input_box" id="email" name="email" type="text" maxlength="150" value="{$docente->email}" />
	  			</span></td>
  			  </tr>
              
	  		   
	  		  <tr >
                              <input type="hidden" id="regis" name="regis" value="grab" />
 	  			<td  colspan="2"><center><input id="signupsubmit" name="signup" type="submit" value="REGISTRAR DOCENTE"  class="boton"/>
  			    <input name="reset" type="reset" value="LIMPIAR"  class="boton"/></center></td>
	  		  </tr>
  </table></td></tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7"><center>
          <em><strong>Los campos con (*) son obligatorios</strong></em>
      </center></td>
    </tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7"><center>
          <em><strong><a href="lista.php" class="botonlink">VER LISTA</a></strong></em>
      </center></td>
    </tr></form>
</table>
        
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
