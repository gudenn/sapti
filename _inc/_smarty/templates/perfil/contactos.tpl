{include file="header.tpl"}
<div class="wrapper row3">
     <div class="rnd">
         <div id="container" class="clear">
<table width="85%" border="1"  align="center" cellpadding="5" cellspacing="5" bordercolor="#999999" class="Estilo2">
   <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7" style="text-align:center"><strong>LISTA DE PERFILES PROCESO</strong></td>
    </tr>
  
  
    <tr bgcolor="#F1F5F8">
        <td bgcolor="#F7F7F7">
        <table width="100%" cellpadding="2" cellspacing="2" bordercolor="#999999" border="1">
    
                <td width="2%" class="label" style="text-align:center"><strong>NUMERO</strong></td>
	  		  	<td width="17%" class="label" style="text-align:center"><strong>TITULO</strong></td>
	  		  	<td width="15%" class="field" style="text-align:center"><strong>AUTOR</strong></td>
                <td width="7%" class="label" style="text-align:center"><strong>TUTOR</strong></td>
	  		  	
  
                <td width="7%" class="label" style="text-align:center"><strong>GESTION</strong></td>
               
	  		  	
          {foreach key=key name=outer item=dato from=$datos}
      <tr class="">
	    
         {foreach key=key item=item from=$dato}
		 
		 
            <td width="15%" align="center">{$item}</td>
           
         {/foreach} 
         <td width="15%" align="center"><a href="usuario.gestion.php?action=editar&estudiante_id={$objs[ic]['id']}" onclick="return confirm('Eliminar esta Observacion?');"><span class="l"></span><span class="r"></span><span class="t">eliminar</span></a></li</td>
      </tr>
   {/foreach} 
   </td>
</tr>
</table>   
  <tr bgcolor="#F1F5F8">
    <td bgcolor="#F7F7F7" style="text-align:center"><em><strong><a href="proceso-pdf.php" class="botonlink">PDF</a></strong></em></td>
    </tr>
</table>
</div>
</div>
</div>
   
{include file="footer.tpl"}
