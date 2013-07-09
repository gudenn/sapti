{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
        
        <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO MODALIDAD</strong></td></center>
        <form action ="registrarDocente.php" method ="post" name="form" id="form" autocomplete="off" enctype="multipart/form-data">
         <label for="nombre">Nombre :</label>
        <input type="text" id="nombre" name="nombre" value="{$modalidad->nombre}" /><br />
        <label for="nombre">Descripcion :</label></center>
        <input type="text" id="descripcion" name="descripcion" value="{$modalidad->descripcion}" /><br />
        <input type="hidden" id="tarea" name="tarea" value="grabar" />
            <input type="submit" value="registro" />
         </form>
    </table>
    </div>
  </div>
</div>
{include file="footer.tpl"}
