      <div id="content" style="width:685px;min-height: 450px;">
        <h1 class="title">SUBIR EVALUACIONES DE ESTUDIANTES USANDO CVS</h1>
        <h2 class="title">FORMULARIO DE EVALUACION</h2>
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
            <p>
              <textarea name="cvs" rows="4" cols="60" style="width: 650px;height: 305px;" data-validation-engine="validate[required]"></textarea>
              <label for="cvs"><small>Ingrese Contenido CVS (*)</small></label>
            </p>
            <h2 class="title">GRAVAR EVALUACIONES</h2>
            <p>
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              
              <input name="submit" type="submit" id="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">
            </p>
          </form>
        </div>
        <p>{$ERROR}</p>
        <p>Todos los campos con (*) son obligatorios.</p>
        <script type="text/javascript">
        {literal} 
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
        