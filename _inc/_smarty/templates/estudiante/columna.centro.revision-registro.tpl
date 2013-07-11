      <div id="content">
        <h1 class="title">Registro de Modificaciones</h1>
        <p>Formulario de registro de Modificaciones</p>
        <h2 class="title">Formulario de Modificaciones</h2>
        <div id="respond">
          <form action="#" method="post" id="modificaciones" name="modificaciones" >
            <p>
              <input type="text" name="comentario" id="comentario" value="{$estudiante->codigo_sis}" size="100"  data-validation-engine="validate[required]">
              <label for="comentario"><small>Comentario Revisi&oacute;n (*)</small></label>
            </p>
            <p>
              <input type="file" name="file" id="file" data-validation-engine="validate[required]">
              <label for="file"><small>Archivo (*)</small></label>
            </p>
            <h2 class="title">Grabar Revisi&oacute;n</h2>
            <p>
              <input type="hidden" name="usuario_id"    value="{$usuario->id}">
              <input type="hidden" name="estudiante_id" value="{$estudiante->id}">
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
            </p>
          </form>
        </div>
        <p>{$ERROR}</p>
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
          });1
          jQuery(document).ready(function(){
            jQuery("#modificaciones").validationEngine();
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
        