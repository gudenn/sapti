 <div id="content">

   <h1> DISPONIBILIDAD DE TIEMPO DEL DOCENTE</h1>
 <table class="tbl_lista">
  <thead>
    <tr>
      <th><a >DIA     </a></th>
      <th><a >HORARIO    </a></th>
      <th><a >ELIMINAR </a></th>
       </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$arraytribunal}
    <tr  class="selectable">
     <td>{$arraytribunal[ic]['id']} </td>
      <td>{$arraytribunal[ic]['nombre']} </td>
       <td>{$arraytribunal[ic]['apellidos']}</td>
      <td> <a href="carta.php?tribunal_id={$arraytribunal[ic]['id']}" target="_blank" >{icono('detalle.png','PDF')}</a>
    
        </td>
      
        
    </tr>
  {/section}
    </tbody> 
</table>
    
    

 
<script type="text/javascript">

  jQuery(function(){
    $("#docentes tbody").on("click", "tr", function(event){
 if ($('#asignados > tbody >tr').length==3)
    {
     alert ( "Solo se Permitern tres Tribunales!!" );
      } else
        {
           $("#asignados").append('<tr>' + $(this).html() + '</tr>');
         $(this).remove();
          }
        return false;
      
      
     
      
    
    
    });
  });
</script>

<script type="text/javascript">

  jQuery(function(){
    $("#asignados tbody").on("click", "tr", function(event){
    
      $("#docentes tbody").append('<tr>' + $(this).html() + '</tr>');
      $(this).remove();
      return false;
    });
  });


</script>
              
 </div>