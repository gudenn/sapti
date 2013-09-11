      <div id="content" style="width:685px;min-height: 400px;">
        <div id="respond">
             <h1 class="title">REGISTRO DE EVENTOS</h1>
          <form action="#" method="post" id="registro" name="registro" >
            <p>
              <input type="text" name="asunto" id="asunto" value="{$evento->asunto}" size="22" data-validation-engine="validate[required]">
              <label for="asunto"><small>TITULO EVENTO (*)</small></label>
            </p>
            <p>
              <textarea name="descripcion" id="descripcion" value="{$evento->descripcion}" size="22" style="width: 650px;height: 100px;" data-validation-engine="validate[required]"></textarea>
              <label for="descripcion"><small>DESCRIPCION DEL EVENTO (*)</small></label>
            </p>
            <p>
              <input type="text" name="fecha_evento" id="fecha_evento" value="{$evento->fecha_evento}" size="22" data-validation-engine="validate[required]">
              <label for="fecha_evento"><small>FECHA DE EVENTO (*)</small></label>
            </p>
            <h2 class="title">Grabar Evento</h2>
            <p>
              <input type="hidden" name="id" value="{$evento->id}">
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
          $(function(){
            $('#fecha_evento').datepicker({
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
        