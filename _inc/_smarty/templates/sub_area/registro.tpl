{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
        <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO SUB ÁREA</strong></td></center>
       <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <form action="" method="post">
      <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{$sub_area->nombre}" /><br />
         <label for="nombre">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="{$sub_area->descripcion}" /><br />
       
        <td height="26" colspan="10" valign="middle"><p align="center"><strong>&nbsp;</strong>     
   
       <input type="hidden" name="tarea" value="registrar">
       <input type="hidden" name="token" value="{$token}">
        <input name="submit" type="submit" id="submit" value="Grabar">
           &nbsp;
       <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear"> 
           

      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}