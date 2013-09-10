 <div id="content">
     <form action="" method="post">
      <h1> Detalle del Proyecto </h1>
        {section name=ic loop=$arraytribunaldatos}
       <label for="nombre">NOMBRE       :  {$arraytribunaldatos[ic]['nombre']}</label><br />
        <label for="nombre">APELLIDOS   :   {$arraytribunaldatos[ic]['apellidos']}</label><br />
         <label for="nombre">CODIGO SIS :  {$arraytribunaldatos[ic]['codigo_sis']}</label><br />
          <label for="nombre">PROYECTO  :  {$arraytribunaldatos[ic]['nombreproyecto']}</label><br />
          
          <input type="hidden" name="proyecto_tribunal_id" value="{$arraytribunaldatos[ic]['idproyecto']}">
       {/section}

       
       <p>
         <select name=lugar_id>
         {html_options values=$lugar_id output=$lugar_nombre}
         </select>
         <label for="lugar"><small>LUGAR</small></label>
         </p>
         
           <p>
         <select name=tipo_defensa_id>
         {html_options values=$tipo_id output=$tipo_nombre}
         </select>
         <label for="lugar"><small>TIPO DEFENSA</small></label>
         </p>
       

             <p>
              <input type="text" name="fecha_defensa" id="fecha_defensa" value="" size="22">
              <label for="fecha_cumple"><small>FECHA DEFENSA</small></label>
            </p>
            
            <p>
             <select name=hora_inicio>
             {html_select_time use_12_hours=true}
             </select>
             <label for="fecha_cumple"><small>HORA INICIO</small></label>
            </p>
            
            <p>
             {html_select_time use_12_hours=true}
             <label for="hora_final"><small>HORA FIN</small></label>
            </p>
            <div style="text-align: center">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="salida_id" value="25" />
        <input type="submit" value="grabar" name="tarea" class="sendme"  />
         
 
      </div>
            
           
            
       
       
       
 </form>
              
 </div>
              
               <script type="text/javascript">
        {literal} 
          $(function(){
            $('#fecha_defensa').datepicker({
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