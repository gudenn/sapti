{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <form action="" method="post">
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" value="{$modalidad->nombre}" /><br />
        <label for="nombre">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" value="{$modalidad->descripcion}" /><br />
       
        <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
