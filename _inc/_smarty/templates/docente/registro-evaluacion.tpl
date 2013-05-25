      <div id="content">
        <h1 class="title">Registro de Evaluaciones</h1>
        <p>Formulario de registro de Revicion</p>
        <h2 class="title">Formulario de Revicion</h2>
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
            <p>
               <label for="nombre de proyecto"><small>Nombre de Proyecto:</small></label>
               <br/>
               <label for="nombre de estudiante"><small>Nombre de Estudiante:</small></label>
            </p>
            <br/>
            <object data="proyecto.pdf" type="application/pdf" width="400" height="300">
            <p> Al parecer usted no tiene un plugin PDF para este navegador.
            No hay problema ... puedes <a href="proyecto.pdf"> clic aquí para descargar el archivo PDF. </ a> </ p>
            </object>
            <p>
              <input type="text" name="observacion" id="observacion" value="{$usuario->nombre}" size="100"  data-validation-engine="validate[required]" >
              <label for="observacion"><small>Observacion</small></label>
            </p>
            <p>
              <input type="text" name="evaluacion" id="evaluacion" value="{$usuario->ci}" size="100"  data-validation-engine="validate[required]" >
              <label for="evaluacion"><small>Evaluacion</small></label>
            </p>

            <p>
              <input type="text" name="fecha_revicion" id="fecha_revicion" value="{$usuario->fecha_cumple}" size="22">
              <label for="fecha_revicion"><small>Fecha de Revicion</small></label>
            </p>

            <h2 class="title">Grabar Revicion</h2>
            <p>
              <input type="hidden" name="id" value="{$estudiante->id}">
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
            $('#fecha_revicion').datepicker({
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
        