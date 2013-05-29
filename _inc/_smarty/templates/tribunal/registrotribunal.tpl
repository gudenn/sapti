{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <form action="" method="post">
           <label for="nombre">Nombre </label>
           <input type="text" id="nombre" name="nombre_tribunal" value="{$tribunal->nombre_tribunal}" /><br />
     
           <label for="nombre">Nombre Proyecto</label> 
           <select name=usuario_id>
            {html_options values=$usuario_id output=$usuario_nombre selected=$usuario_id}
             </select><br />
              <label for="nombre">Descripcion </label> <br />
              <textarea   id="descripcion_asignacion"  name="descripcion_asignacion"  value="{$tribunal->descripcion_asignacion}" >  </textarea><br />
            
          <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
