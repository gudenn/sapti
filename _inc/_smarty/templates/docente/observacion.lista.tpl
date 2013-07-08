<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >Proyecto     {$filtros->iconOrder('proyecto_id')}</a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >Fecha        {$filtros->iconOrder('fecha_observacion')}</a></th>
      <th><a href='?order=revisor'                            class="tajax"  title='Ordenar por Revisor'      >Revisor      {$filtros->iconOrder('revisor')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['proyecto_id']}</td>
      <td>{$objs[ic]['fecha_observacion']}</td>
      <td>{$objs[ic]['revisor']}</td>
      <td>
        <a href="estudiante.detalle.php?estudiante_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
        <a href="estudiante.editar.php?estudiante_id={$objs[ic]['id']}" target="_blank">{icono('editar.png','Editar')}</a>
        <a href="estudiante.gestion.php?eliminar=1&estudiante_id={$objs[ic]['id']}" onclick="return confirm('Eliminar este Estudiante?');"  >{icono('borrar.png','Eliminar')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
