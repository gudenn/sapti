<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                   class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=fecha_revision'       class="tajax"  title='Ordenar por Fecha'        >Fecha        {$filtros->iconOrder('fecha_revision')}</a></th>
      <th><a href='?order=observacion'          class="tajax"  title='Ordenar por Observacion'  >Observaciones  {$filtros->iconOrder('observacion')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
  {section name=ic loop=$objs}
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['revision_fecha_revision_toshow']}</td>
      <td>{$objs[ic]['observacion']}</td>
      <td>
      </td>
    </tr>
  {/section}
    <tr  class="{cycle values="light,dark"}">
      <td></td>
      <td></td>
      <td></td>
      <td>
        <a href="avance.registro.php?revision_id={$objs[0]['revision_id']}" target="_blank" >Resolver {icono('basicset/pencil_48.png','Detalle')}</a>
      </td>
    </tr>
  </tbody>
</table>
