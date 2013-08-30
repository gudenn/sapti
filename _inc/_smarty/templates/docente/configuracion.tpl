
      <form   id="form1" action="" method="post"  id="sitesearch">
    
          
          
             <div class='container'>
                <h3>Seleccione</h3>
	       <br/>
        <div class='span12'>
          <select id='custom-headers' multiple='multiple' name="myselect[]">
            {html_options values=$area_id output=$area_nombre selected=$areaselec_id}
           
          </select>
          
          <br />
          
   
<select id='optgroup' multiple='multiple'  name="horario[]">
  <optgroup label='LUNES'>
   
    {html_options values=$area_id output=$area_nombre}
  </optgroup>
  <optgroup label='Martes'>
    
    {html_options values=$area_id output=$area_nombre}
  </optgroup>
  
</select>
        </div>
          
 
         
        
       </div>
      
           <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
          </form>
          <script> 
             $('#optgroup').multiSelect({ selectableOptgroup: true });
          </script>
          <script>
        //  
         $('#optgroup').multiSelect({
  selectableHeader: "<div class='custom-header'>SELECCIONE</div>",
  selectionHeader: "<div class='custom-header'>SELECCIONDOS</div>",
  
});
          </script>
          
          <script>
          $('#custom-headers').multiSelect({
  selectableHeader: "<div class='custom-header'>Selectable items</div>",
  selectionHeader: "<div class='custom-header'>Selection items</div>"

});
          </script>
   	
        
              

