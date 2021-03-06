      <div id="content">
        <h1 class="title">Registro de Estudiantes</h1>
        <p>Formulario de registro de estudiantes</p>
        <h2 class="title">Formulario de Registro</h2>
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
            <p>
              <select name="semestre_id" id="semestre_id" >
              {html_options values=$semestre_values selected=$semestre_selected output=$semestre_output}
              </select>
              <label for="semestre_id"><small>Semestre (*)</small></label>
            </p>
            <p>
              <select name="materia_id" id="materia_id" >
              {html_options values=$materia_values selected=$materia_selected output=$materia_output}
              </select>
              <label for="materia_id"><small>Materia (*)</small></label>
            </p>
            <p>
              <select name="dicta_id" id="dicta_id" ></select>
              <label for="dicta_id"><small>Docente (*)</small></label>
            </p>
            <p>
              <input type="text" name="codigo_sis" id="codigo_sis" value="{$estudiante->codigo_sis}" size="100"  data-validation-engine="validate[required]">
              <label for="codigo_sis"><small>C&oacute;digo SIS (*)</small></label>
            </p>
            <p>
              <input type="text" name="ci" id="ci" value="{$usuario->ci}" size="100"  data-validation-engine="validate[required]" >
              <label for="ci"><small>CI (*)</small></label>
            </p>
            <p>
              <input type="text" name="nombre" id="nombre" value="{$usuario->nombre}" size="100"  data-validation-engine="validate[required]" >
              <label for="nombre"><small>Nombres (*)</small></label>
            </p>
            <p>
              <input type="text" name="apellidos" id="apellidos" value="{$usuario->apellidos}" size="200">
              <label for="apellidos"><small>Apellidos</small></label>
            </p>
            <p>
              <input type="text" name="fecha_cumple" id="fecha_cumple" value="{$usuario->fecha_cumple}" size="22">
              <label for="fecha_cumple"><small>Fecha de Cumplea&ntilde;os</small></label>
            </p>
            <p>
              <input type="text" name="email" id="email" value="{$usuario->email}" size="22" data-validation-engine="validate[],custom[email]"  >
              <label for="email"><small>E-Mail</small></label>
            </p>
            <p>
              <input type="text" name="login" id="login" value="{$usuario->login}"  data-validation-engine="validate[required]"  size="22">
              <label for="login"><small>Nombre de usuario (*)</small></label>
            </p>
            <p>
              <input type="password" name="clave" id="clave" value="" data-validation-engine="validate[required]"  size="22">
              <label for="password"><small>Clave de Ingreso (*)</small></label>
            </p>
            <p>
              <input type="password" name="clave2" id="clave2" value="" data-validation-engine="validate[equals[clave]]"   size="22">
              <label for="password"><small>Verifique Clave (*)</small></label>
            </p>
            <h2 class="title">Grabar Estudiante</h2>
            <p>
              <input type="hidden" name="usuario_id"    value="{$usuario->id}">
              <input type="hidden" name="estudiante_id" value="{$estudiante->id}">
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
          jQuery(function(){
            jQuery("select#materia_id").change(function(){
              if (jQuery('#semestre_id').val() == '')
                return jQuery('#semestre_id').validationEngine('showPrompt', 'Seleccione un semestre', 'error', true);;
                
              jQuery.getJSON("ajax.estudiante.registro.php",{'materia': jQuery(this).val(),'semestre': jQuery('#semestre_id').val(),  ajax: 'true'}, function(j){
                var options = '';
                for (var i = 0; i < j.length; i++) {
                  options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
                }
                jQuery("select#dicta_id").html(options);
              })
            })
          });
        {/literal} 
        </script>
      </div>
        