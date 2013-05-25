{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <form action="" method="post">
           <label for="nombre">Nombre Usuario </label>   <select name=usuario_id>
            {html_options values=$usuario_id output=$usuario_nombre selected=$usuario_id}
             </select><br />
              <label for="nombre">Tipo Defensa </label>   <select name=proyecto_nombre>
            {html_options values=$cust_ids output=$cust_names selected=$proyecto_nombre}
             </select><br />
        <label for="nombre">Fecha Defensa</label><input type="date" id="fecha_defensa" name="fecha_defensa" value="{$defensa->fecha_defensa}" /><br />
        <label for="nombre">Hora Defensa</label>  {html_select_time use_24_hours=true} <br />
        <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
