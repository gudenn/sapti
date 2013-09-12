 <div id="content">

    <div >
        
   <form action="" method="post">
      <h1> DETALLE DEL PROYECTO </h1>
        {section name=ic loop=$arraytribunaldatos}
       <label for="nombre">NOMBRE:  {$arraytribunaldatos[ic]['nombre']}</label><br />
        <label for="nombre">APELLIDOS:  {$arraytribunaldatos[ic]['apellidos']}</label><br />
         <label for="nombre">CODIGO SIS:  {$arraytribunaldatos[ic]['codigo_sis']}</label><br />
          <label for="nombre">PROYECTO:  {$arraytribunaldatos[ic]['nombreproyecto']}</label><br />
       
       {/section}
 </form>
  <div style="width: 50%;float: left;" class="tbl_filtro">  </div>
   <h1> TRIBUNALES </h1>
</div>  

        <table class="tbl_lista">
  <thead>
    <tr>
      <th><a  >ID          </a></th>
      <th><a  >NOMBRE  </a></th>
      <th><a  >APELLIDOS    </a></th>
      <th><a  >CARTA </a></th>
       </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$arraytribunal}
    <tr  class="selectable">
     <td>{$arraytribunal[ic]['id']} </td>
      <td>{$arraytribunal[ic]['nombre']} </td>
       <td>{$arraytribunal[ic]['apellidos']}</td>
      <td> <a href="carta.php?tribunal_id={$arraytribunal[ic]['id']}" target="_self" >{icono('detalle.png','PDF')}</a>
    
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