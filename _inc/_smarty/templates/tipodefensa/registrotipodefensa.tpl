{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <form   id="frmContact"  action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text"  title="El campo es obligatorio" id="nombre" name="nombre_tipodefensa" value="{$tipodefensa->nombre_tipodefensa}" required/><br />
        <label for="nombre">Descripcion:</label>  
        <input type="text" id="nombre" name="descripcion_tipodefensa" value="{$tipodefensa->descripcion_tipodefensa}" /><br />
         <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
      </form>
    </div>
  </div>
</div>
        
            
{include file="footer.tpl"}
