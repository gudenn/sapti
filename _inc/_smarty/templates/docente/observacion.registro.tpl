      <div id="content">
        <h1 class="title">Registro de Evaluaciones</h1>
        <p>Formulario de registro de Revision</p>
        <h2 class="title">Formulario de Revision</h2>
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
            <p>
               <label for="nombre de proyecto"><small>Nombre de Proyecto:</small></label>
               <br/>
               <label for="nombre de estudiante"><small>Nombre de Estudiante:</small></label>
            </p>
            <br/>
            <object data="proyecto.pdf" type="application/pdf" width="900" height="300">
            <p> Al parecer usted no tiene un plugin PDF para este navegador.
            No hay problema ... puedes <a href="proyecto.pdf"> clic aquí para descargar el archivo PDF. </ a> </ p>
            </object>
            <div id="div_1">
            <label  accesskey="">Observacion
            </label>
            </p>
            <input  type="text"  name="materiales[]" id="materiales[]" style="width:500px;" /> 
            <input class="bt_plus" id="1" type="button" value="Añadir Observacion" />
            <div class="error_form"></div>
            </div>

            <p>
              <input type="text" name="fecha_observacion" id="fecha_cumple" value="{$revision->fecha_observacion}" size="22">
              <label for="fecha_observacion"><small>Fecha de Revison</small></label>
            </p>
            <p>

            
                        <p>
              <input type="text" name="fecha_revision" id="fecha" value="{$revision->id}" size="22">
              <label for="fecha_revision"><small>id rev</small></label>
            </p>
                        <p>
              <input type="text" name="fecha_revision" id="fecha_" value="{$revision->proyecto_id}" size="22">
              <label for="fecha_revision"><small>id proy</small></label>
            </p>
                        <p>
              <input type="text" name="fecha_revision" id="fecha_r" value="{$revision->revisor}" size="22">
              <label for="fecha_revision"><small>Revisor</small></label>
            </p>

            <h2 class="title">Grabar Revision</h2>
            <p>
              <input type="hidden" name="id" value="{$revision->id}">
              <input type="hidden" name="id" value="{$observacion->id}">
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
        <script type="text/javascript" src="jquery-latest.js"></script>
        <script type="text/javascript" src="jquery.addfield.js"></script>
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
        </script>
      </div>
        