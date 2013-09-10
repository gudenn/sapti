      <div id="content">
        <h1 class="title">Registro de Correciones</h1>
        <p>Formulario de registro de Correciones</p>
        <h2 class="title">Formulario de Correciones</h2>
        <div id="respond">
          <form action="" method="post" id="modificaciones" name="modificaciones" enctype="multipart/form-data" >
            <p>
              <label for="comentario"><small>Comment (required)</small></label>
            </p>
            <p>
              <textarea name="comentario" id="comentario" cols="100%" rows="10"  data-validation-engine="validate[required]"></textarea>
            </p>
            <p>
              <input type="file" name="file" id="file" data-validation-engine="validate[required]">
              <label for="file"><small>Archivo (*)</small></label>
            </p>
            <h2 class="title">Grabar Correci&oacute;n</h2>
            <p>
              <input type="hidden" name="usuario_id"    value="{$usuario->id}">
              <input type="hidden" name="estudiante_id" value="{$estudiante->id}">
              <input type="hidden" name="tarea" value="registrar_correcion">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
            </p>
          </form>
        </div>
        <p>{$ERROR}</p>
        <p>Todos los campos con (*) son obligatorios.</p>
        <script type="text/javascript">
        {literal} 
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
        