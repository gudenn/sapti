 <div id="content">
     <form action="" method="post">
      <h1> DETALLE DEL PROYECTO</h1>
        {section name=ic loop=$arraytribunaldatos}
       <label for="nombre">NOMBRE       :  {$arraytribunaldatos[ic]['nombre']}</label><br />
        <label for="nombre">APELLIDOS   :   {$arraytribunaldatos[ic]['apellidos']}</label><br />
         <label for="nombre">CODIGO SIS :  {$arraytribunaldatos[ic]['codigo_sis']}</label><br />
          <label for="nombre">PROYECTO  :  {$arraytribunaldatos[ic]['nombreproyecto']}</label><br />
          
          <input type="hidden" name="proyecto_tribunal_id" value="{$arraytribunaldatos[ic]['idproyecto']}">
       {/section}
  <h1> LISTA DE TRIBUNALES ASIGNADOS</h1>
 <table class="tbl_lista">
  <thead>
    <tr>
      <th><a >ID              </a></th>
      <th><a   >TRIBUNAL   </a></th>
    
      <th><a >TIEMPO </a></th>
    </tr>
  </thead>
  
  
  <tbody>
{section name=ic loop=$arraytribunal}
   
    <tr  class="selectable">
   
      <td>{$arraytribunal[ic][0]}
        <input type="hidden" name="ids[]" value="{$arraytribunal[ic][0]}">
      </td>
      <td>
        {$arraytribunal[ic][1]}
        {$arraytribunal[ic][2]}
      </td>
 <td>     <a  class="tooltip"> VER
  <span>
  <b>
 </b>
{foreach name=outer item=contact from=$arraytribunal[ic][3]}
  <hr />
  {foreach key=key item=item from=$contact}
  {$item}
  {/foreach}
{/foreach}
 </span> 
    </a>
  </td>

     
    </tr>
  {/section}
    </tbody> 
</table> 
       
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
<select name="Time_inicio">
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09" selected>09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="Time_inicio">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15" >15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20" >20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45" selected>45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>

             <label for="fecha_cumple"><small>HORA INICIO</small></label>
            </p>

            <p>
              <select name="Time_final">
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09" selected>09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="Time_final">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15" >15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20" >20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45" selected>45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
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