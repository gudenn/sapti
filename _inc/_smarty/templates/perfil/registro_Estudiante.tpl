{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <form action="" method="post">
        <table width="433" border="1"  align="center" cellpadding="5" cellspacing="5" bordercolor="#999999" class="Estilo1">

    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO DE ESTUDIANTES</strong></td>
    </tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7">
<table width="100%">
	  		  <tr>
	  		  	<td width="43%" class="label" style="text-align:right" ><strong>
	  		  	  <label id="nombre" for="nombre">(*) Nombres:</label>
	  		  	</strong></td>
	  		  	<td width="57%" class="field" style="text-align:left"><input id="nombre" name="nombre" type="text" maxlength="100" value="{$estudiante->nombre}" onkeypress="return permite(event, 'car')" /></td>
  		  	  </tr>
			   <tr>                                                      
	  		  	<td class="label" style="text-align:right"><strong>
	  		  	  <label id="apellido_paterno" for="apellido">(*) Apellido Paterno:</label>
	  		  	</strong></td>
	  		  	<td class="field" style="text-align:left"><input id="apellido_paterno" name="apellido_paterno" type="text" maxlength="100"  value="{$estudiante->apellido_paterno}"onkeypress="return permite(event, 'car')"/></td>
  		  	  </tr>
			  
	  		  <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="apellido_materno" for="ci">(*) Apellido Materno:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><span class="field" style="text-align:left">
	  			  <input id="apellido_materno" name="apellido_materno" type="text" maxlength="100"  value="{$estudiante->apellido_materno}"onkeypress="return permite(event, 'car')"/></td>
	  			</span></td>
	  		  </tr>
                          <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="ci" for="ci">(*) C.I.:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><span class="field" style="text-align:left">
	  			  <input id="ci" name="ci" type="text" maxlength="100"  value="{$estudiante->ci}"onkeypress="return permite(event, 'car')"/></td>
	  			</span></td>
	  		   </tr>
                           <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="codigo_sis" for="codigo_sis">(*) COD.SIS.:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><span class="field" style="text-align:left">
	  			  <input id="codigo_sis" name="codigo_sis" type="text" maxlength="100"  value="{$estudiante->codigo_sis}"onkeypress="return permite(event, 'car')"/></td>
	  			</span></td>
	  		   </tr>

			 <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="fecha_cumple" for="fecha_cumple">(*) Fecha Nacimiento:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><span class="field" style="text-align:left">
	  			  <input id="fecha_cumple" name="fecha_cumple" type="date" maxlength="100"  value="{$estudiante->fecha_cumple}"onkeypress="return permite(event, 'car')"/></td>
	  			</span></td>
	  		   </tr>
			  
			   <tr>
	  			<td class="label"  style="text-align:right"><strong>
	  			  <label id="telefono_e" for="telefono_e">Telefono:</label>
	  			</strong></td>
	  			<td class="field"  style="text-align:left">
                <input  class="input_box"id="telefono_e" name="telefono_e" type="text" maxlength="150"  value="{$estudiante->telefono_e}"onkeypress="return permite(event, 'num')"/></td>
  			  </tr>
			   <tr>
	  			<td  style="text-align:right"><strong>
	  			  <label id="email_e" for="email_e">(*) email:</label>
	  			</strong></td>
	  			<td class="field" style="text-align:left"><span class="field" style="text-align:left">
	  			  <input class="input_box" id="email_e" name="email_e" type="text" value="{$estudiante->email_e}"maxlength="150" />
	  			</span></td>
  			  </tr>
              
	  		   
	  		  <tr >
 	  			<td  colspan="2"><center>
                                    <input type="hidden" id="tarea" name="tarea" value="grabar" />
                                    <input type="submit" value="REGISTRAR ESTUDIANTE"  class="boton"/>
  			    <input name="reset" type="reset" value="LIMPIAR"  class="boton"/></center></td>
                                    
                              
	  		  </tr>
  </table>
      </td>
    </tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7"><center>
          <em><strong>Los campos con (*) son obligatorios</strong></em>
      </center></td>
    </tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7"><center>
          <em><strong><a href="lista.php" class="botonlink">VER LISTA</a></strong></em>
      </center></td>
    </tr>
</table>
        
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
