{include file="header.tpl"}
<div class="wrapper row3">
     <div class="rnd">
         <div id="container" class="clear">
<table width="85%" border="1"  align="center" cellpadding="5" cellspacing="5" bordercolor="#999999" class="Estilo2">
   <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7" style="text-align:center"><strong>LISTA DE ESTUDIANTES</strong></td>
    </tr>
  
  
    <tr bgcolor="#F1F5F8">
        <td bgcolor="#F7F7F7">
        <table width="100%" cellpadding="2" cellspacing="2" bordercolor="#999999" border="1">
    <td width="2%" class="label" style="text-align:center"><strong>N?</strong></td>
                <td width="2%" class="label" style="text-align:center"><strong>NOMBRES</strong></td>
	  		  	<td width="17%" class="label" style="text-align:center"><strong>APELlIDO PATERNO</strong></td>
	  		  	<td width="15%" class="field" style="text-align:center"><strong>APELLIDO MATERNO</strong></td>
                <td width="7%" class="label" style="text-align:center"><strong>CI</strong></td>
	  		  	<td width="14%" class="field" style="text-align:center">
                <strong>COD SIS</strong></td>
	  		  	<td width="14%" class="field" style="text-align:center">
                <strong>FECHA NACIMIENTO</strong></td>
                <td width="7%" class="label" style="text-align:center"><strong>TELEFONO</strong></td>
               
	  		  	<td width="12%" class="field" style="text-align:center"><strong>EMAIL</strong></td>
               <td width="12%" class="field" style="text-align:center"><strong>ACTUALIZAR</strong></td>
          {foreach key=key name=outer item=dato from=$datos}
      <tr class="">
	  <td width="15%" align="center">1</td>     
         {foreach key=key item=item from=$dato}
		 
		 
            <td width="15%" align="center">{$item}</td>
            
         {/foreach} 
         <td width="15%" align="center"><a href="modificar.php?codigo=<?php echo $cod_doc?>">modificar</a></td>
      </tr>
   {/foreach} 
   </td>
</tr>
</table>   
  <tr bgcolor="#F1F5F8">
    <td bgcolor="#F7F7F7" style="text-align:center"><em><strong><a href="registroE.php" class="botonlink">REGISTRAR ESTUDIANTE</a></strong></em></td>
    </tr>
</table>
</div>
</div>
</div>
   
{include file="footer.tpl"}
