      <div id="content">
        <h1 class="title">Registro de Tutores</h1>
        <p>Formulario de registro de tutor</p>
        <h2 class="title">Formulario de Registro</h2>
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
            <p>
              <input type="text" name="ci" id="ci" value="{$tutor->ci}" size="100"  data-validation-engine="validate[required]" >
              <label for="ci"><small>CI (*)</small></label>
            </p>
            <p>
              <input type="text" name="nombre" id="nombre" value="{$tutor->nombre}" size="100"  data-validation-engine="validate[required]" >
              <label for="nombre"><small>Nombre (*)</small></label>
            </p>
            <p>
              <input type="text" name="apellidos" id="apellidos" value="{$tutor->apellidos}" size="200">
              <label for="apellidos"><small>Apellidos</small></label>
            </p>
            <p>
              <input type="text" name="email" id="email" value="{$tutor->email}" size="22" data-validation-engine="validate[],custom[email]"  >
              <label for="email"><small>E-Mail</small></label>
            </p>
            <p>
              <input type="text" name="fecha_cumple" id="fecha_cumple" value="{$tutor->fecha_cumple}" size="22">
              <label for="fecha_cumple"><small>Fecha de Cumplea&ntilde;os</small></label>
            </p>
            <p>
              <input type="text" name="login" id="login" value="{$tutor->login}" size="22">
              <label for="login"><small>Nombre de usuario</small></label>
            </p>
            <p>
              <input type="text" name="clave" id="clave" value="{$tutor->clave}" size="22">
              <label for="clave"><small>Clave de Ingreso</small></label>
            </p>
            <h2 class="title">Grabar Estudiante</h2>
            <p>
              <input type="hidden" name="id" value="{$tutor->id}">
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">
            </p>
          </form>
        </div>
        <p>{$ERROR}ERReo</p>
        <p>Todos los campos con (*) son obligatorios.</p>
        <script type="text/javascript">
        {literal} 
          $(function(){
            $('#fecha_cumple').datepicker({
              dateFormat:'dd/mm/yy',
              changeMonth: true,
              changeYear: true,
              yearRange: "1920:2013"
            });
          });
          jQuery(document).ready(function(){
            jQuery("#registro").validationEngine();
            var wo = 'bottomRight';
            jQuery('input').attr('data-prompt-position',wo);
            jQuery('input').data('promptPosition',wo);
            jQuery('textarea').attr('data-prompt-position',wo);
            jQuery('textarea').data('promptPosition',wo);
            jQuery('select').attr('data-prompt-position',wo);
            jQuery('select').data('promptPosition',wo);
          });
        {/literal} 
        </script>
      </div>
        