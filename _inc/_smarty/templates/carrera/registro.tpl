{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
        <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO CARRERA</strong></td></center>
      <form action="" method="post">
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" value="{$carrera->nombre}" /><br />
        <label for="nombre">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" value="{$carrera->descripcion}" /><br />
       
        <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
