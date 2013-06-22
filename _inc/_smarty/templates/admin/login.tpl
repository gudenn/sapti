{include file="header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
        <div class="holder">
          <h2 class="title">Ingreso de administrador</h2>
        </div>
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
            <p>
              <input type="text" name="login" id="login" value="" size="100"  data-validation-engine="validate[required]">
              <label for="login"><small>Login (*)</small></label>
            </p>
            <p>
              <input type="password" name="clave" id="clave" value="" data-validation-engine="validate[required]"  size="22">
              <label for="password"><small>Clave de Ingreso (*)</small></label>
            </p>
            <h2 class="title">Datos de ingreso</h2>
            <p>
              <input type="hidden" name="tarea" value="ingreso">
              <input type="hidden" name="token" value="{$token}">
              <input name="submit" type="submit" id="submit" value="Ingresar">
            </p>
          </form>
        </div>
        <p>{$ERROR}</p>
        <p>Todos los campos con (*) son obligatorios.</p>
    </div>
  </div>
</div>
{include file="footer.tpl"}