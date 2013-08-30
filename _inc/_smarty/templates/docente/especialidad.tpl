{include file="header.tpl"}



<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
      
      <form action="" method="post">
       
         <h2 class="title">LISTA DE AREAS</h2>
      
      
     {html_checkboxes name="area_id" values=$area_id output=$area_nombre
   selected=$areaselect_id  separator="<br />"}
   
       <select name=customer_id>
       {html_options values=$numero output=$numero selected=$seleccionado}
       </select>
            <h2 class="title">GUARDAR DATOS</h2>
            <p>
                <input type="hidden" name="tarea" value="grabar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">
            </p>
          </form>
    </div>
  </div>
</div>
              
              
              
{include file="footer.tpl"}
