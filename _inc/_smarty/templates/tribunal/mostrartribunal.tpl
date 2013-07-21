{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO DE TRIBUNALES</strong></td></center>
    
    <div class="clear"></div>
    
    
          <div style="width: 50%;float: left;" class="tbl_filtro">
    <form action="" method="post" >
             <h1>  Busqueda por Estudiante</h1>
          <table  style="width: 100%;float: left;" class="tbl_filtro">
          <tr>
              <th><label for="estado_lugar">Codigo Sis</label></th>
              <th><label for="codigo_box">Nombre </label></th>
             
          </tr>
           <tr>
            
                 <td>
                      <input type="text" name="codigosis"  id="codigosis" value="" />
                  </td>
                  <td>
                      <input type="text" name="nombre"  id="nombre" value="" />
                  </td>
        
                  <td><input type="submit" value="Buscar" name="buscar" class="sendme" /></td>
           </tr>
          
          </table>
     </form>

  </div>
    <div style="width: 50%;float: left;" class="tbl_filtro">
        
   <form action="" method="post">
      <h1> Resultado de la  Busqueda por Estudiante</h1>
        <label for="nombre">nombre:{$usuariobuscado->nombre}</label><br />
        <label for="nombre">Apellidos:{$usuariobuscado->apellidos}</label><br />
         <label for="nombre">Codigo Sis:{$estudiantebuscado->codigo_sis}</label><br />
         <label for="nombre">Proyecto:{$proyectobuscado->nombre_proyecto}</label><br />
         <label for="nombre">Area del Proyecto:{$proyectoarea->nombre}</label><br />
        <input type="text" id="proyecto_id" name="proyecto_id" value="{$proyectobuscado->id}" /><br />

 </form>
  
  
</div>   
        <table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >Nombre     {$filtros->iconOrder('proyecto_id')}</a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >Apellidos     {$filtros->iconOrder('fecha_observacion')}</a></th>
       </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$arraytribunal}
    <tr  class="selectable">
     <td>{$arraytribunal[ic]['id']} </td>
      <td>{$arraytribunal[ic]['nombre']} </td>
       <td>{$arraytribunal[ic]['apellidos']}</td>
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
