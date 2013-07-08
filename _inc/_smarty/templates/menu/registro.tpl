{include file="header.tpl"}



<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
      
      <form action="" method="post">
       
            <p>
              <input type="text" name="nombre_menu" id="nombre_menu" value="{$menu->nombre_menu}"  data-validation-engine="validate[required]"  size="22">
              <label for="login"><small>Nombre de Grupo (*)</small></label>
            </p>
            
             <p>
              <input type="text" name="url_menu" id="url_menu" value="{$menu->url_menu}"  data-validation-engine="validate[required]"  size="22">
              <label for="login"><small>Nombre de Grupo (*)</small></label>
            </p>
  
            <h2 class="title">Grabar Grupo</h2>
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
