{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
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
 </form>
  <div style="width: 50%;float: left;" class="tbl_filtro">  </div>
   <h1> Lista de los Tribunales </h1>
</div>  

        <table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >Nombre     {$filtros->iconOrder('proyecto_id')}</a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >Apellidos     {$filtros->iconOrder('fecha_observacion')}</a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >Carta  {$filtros->iconOrder('fecha_observacion')}</a></th>
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

 
  </div>

 

</div>
</div>
    
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
              
{include file="footer.tpl"}
