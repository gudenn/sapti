<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                        accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=proyecto_id'                            class="tajax"  title='Ordenar por Proyecto'     >Proyecto     {$filtros->iconOrder('proyecto_id')}</a></th>
      <th><a href='?order=fecha_observacion'                      class="tajax"  title='Ordenar por Fecha'        >Fecha        {$filtros->iconOrder('fecha_observacion')}</a></th>
      <th><a href='?order=observacion'                            class="tajax"  title='Ordenar por Observacion'  >Observacion  {$filtros->iconOrder('observacion')}</a></th>
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
      {assign var="ides" value=$objs[ic]['id']}
      <td>
        <a href="observacion.detalle.php?revisiones_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
        <a href="observacion.editar.php?revisiones_id={$objs[ic]['id']}" target="_blank">{icono('editar.png','Editar')}</a>
        <a href="observacion.lista.php?eliminar=1&revisiones_id={$objs[ic]['id']}" onclick="return confirm('Eliminar esta Observacion?');"  >{icono('borrar.png','Eliminar')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
