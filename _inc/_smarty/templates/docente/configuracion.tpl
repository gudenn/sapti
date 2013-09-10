 <div id="content">
      <form   id="form1" action="" method="post"  id="sitesearch">
    
          
   
                <h3>SELECIONE LAS AREAS QUE DESEA APOYAR COMO TRIBUNAL</h3>
	       <br/>
        <div class='span12'>
          <select id='custom-headers' multiple='multiple' name="myselect[]">
            {html_options values=$area_id output=$area_nombre selected=$areaselec_id}
           
          </select>
          
          <br />

        </div>
          
 
         
        
 
      
           <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
          </form>
   
          
          <script>
          $('#custom-headers').multiSelect({
  selectableHeader: "<div class='custom-header'>SELECCIONE AREA</div>",
  selectionHeader: "<div class='custom-header'>AREAS SELECCIONADAS</div>"

});
          </script>
   	
        
</div>            

