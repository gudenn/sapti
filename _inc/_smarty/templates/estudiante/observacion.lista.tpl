<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                   class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=fecha_revision'       class="tajax"  title='Ordenar por Fecha'        >Fecha        {$filtros->iconOrder('fecha_revision')}</a></th>
      <th><a href='?order=observacion'          class="tajax"  title='Ordenar por Observacion'  >Observaciones  {$filtros->iconOrder('observacion')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['revision_fecha_revision']}</td>
      <td>{$objs[ic]['observacion']}</td>
      {assign var="ides" value=$objs[ic]['id']}
      <td>
        <a href="correciones.registro.php?observacion_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
