{include file="header.tpl"}



<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
      
      <form action="" method="post">
       
            <p>
        <select name=grupo_id>
   {html_options values=$grupo_id output=$grupo_nombre}
      </select>

          <label for="login"><small>Nombre de Grupo(*)</small></label>
            </p>
            
            
            <p>
        <select name=usuario_id>
      {html_options values=$usuario_id output=$usuario_nombre}
      </select>

          <label for="login"><small>Nombre de Usuario(*)</small></label>
            </p>
            
            
           
  
            <h2 class="title">Grabar</h2>
            <p>
                <input type="hidden" name="tarea" value="registrar">
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
