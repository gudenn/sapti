{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
   <div class="clear"></div>
    <h1 style="text-align: center;margin: 5px 0;">
    Lista de los proyectos Asignados
    </h1>
    <div class="clear"></div>
        <form action="" method="get" >
     <table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >Estudiante     {$filtros->iconOrder('proyecto_id')}</a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >Proyecto       {$filtros->iconOrder('fecha_observacion')}</a></th>
      <th><a href='?order=revisor'                            class="tajax"  title='Ordenar por Revisor'      >Ver Tribunales     {$filtros->iconOrder('revisor')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$arraytribunal}
    <tr  class="selectable">
      <td>{$arraytribunal[ic]['id']}</td>
      <td>{$arraytribunal[ic]['nombre']} {$arraytribunal[ic]['apellidos']}</td>
      <td>{$arraytribunal[ic]['nombreproyecto']}</td>
      <td> <a href="mostrartribunal.php?tribunal_id={$arraytribunal[ic]['id']}" target="_blank" >{icono('detalle.png','Ver Tribunales')}</a>
      </td>
      <td>
    <a href="eliminartribunal.php?eliminar&tribunaleliminar_id={$arraytribunal[ic]['id']}" onclick="return confirm('Eliminar la Asignacion de Tribunales?');"  >{icono('borrar.png','Eliminar')}</a>
  
      </td>
        
    </tr>
  {/section}
    </tbody> 
</table> 
      </form>
</div>
</div>
 </div>
              
{include file="footer.tpl"}
