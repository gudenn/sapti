{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <h1 style="text-align: center;margin: 5px 0;">
    Formulario de Asignacion de Tribunales
    </h1>
    <div class="clear"></div>
    
    
       <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>Proyectos Asignados</strong></td></center>





       <table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >Estudiante     {$filtros->iconOrder('proyecto_id')}</a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >Proyecto       {$filtros->iconOrder('fecha_observacion')}</a></th>
      <th><a href='?order=revisor'                            class="tajax"  title='Ordenar por Revisor'      >Tribunales     {$filtros->iconOrder('revisor')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$arraytribunal}
    <tr  class="selectable">
      <td>{$arraytribunal[ic]['id']}</td>
      <td>{$arraytribunal[ic]['nombre']} {$arraytribunal[ic]['apellidos']}</td>
      <td>{$arraytribunal[ic]['nombre_proyecto']}</td>
      <td> <a href="estudiante.detalle.php?estudiante_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
      </td>
      <td>
        <a href="p.detalle.php?estudiante_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
        <a href="estudiante.editar.php?estudiante_id={$objs[ic]['id']}" target="_blank">{icono('editar.png','Editar')}</a>
        <a href="estudiante.gestion.php?eliminar=1&estudiante_id={$objs[ic]['id']}" onclick="return confirm('Eliminar este Estudiante?');"  >{icono('borrar.png','Eliminar')}</a>
  
      </td>
        
    </tr>
  {/section}
    </tbody> 
</table> 


</table>

</div>
</div>
 
              
{include file="footer.tpl"}
