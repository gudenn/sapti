 <div id="content">

      
        <div class="clear"></div>
      <div class="clear"></div>    
 <div style="width: 50%;float: left;" class="tbl_filtro">
  
  </div>
    <div style="width: 50%;float: left;" class="tbl_filtro">
        
   <form action="" method="post">
      <h1> Detalle del Proyecto </h1>
        {section name=ic loop=$arraytribunaldatos}
       <label for="nombre">nombre:  {$arraytribunaldatos[ic]['nombre']}</label><br />
        <label for="nombre">Apellidos:  {$arraytribunaldatos[ic]['apellidos']}</label><br />
         <label for="nombre">Codigo Sis:  {$arraytribunaldatos[ic]['codigo_sis']}</label><br />
          <label for="nombre">Nombre Proyecto:  {$arraytribunaldatos[ic]['nombreproyecto']}</label><br />
       
       {/section}

       
         <p>
           <select name=customer_id>
   {html_options options=$cust_options selected=$customer_id}
</select>
         </p>
       
           <p>
              <input type="text" name="email" id="email" value="{$usuario->email}" size="22" data-validation-engine="validate[],custom[email]"  >
              <label for="email"><small>E-Mail</small></label>
            </p>
             <p>
              <input type="text" name="fecha_cumple" id="fecha_cumple" value="{$usuario->fecha_cumple}" size="22">
              <label for="fecha_cumple"><small>Fecha de Cumplea&ntilde;os</small></label>
            </p>
            
            <p>
             {html_select_time use_12_hours=true}
             <label for="fecha_cumple"><small>HORA INICIO</small></label>
            </p>
            
            <p>
             {html_select_time use_12_hours=true}
             <label for="fecha_cumple"><small>HORA FIN</small></label>
            </p>
            
            
           
            
       
       
       
 </form>
  <div style="width: 50%;float: left;" class="tbl_filtro">  </div>
   <h1> Lista de los Tribunales </h1>
</div>  

 

 


              
 </div>
              
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