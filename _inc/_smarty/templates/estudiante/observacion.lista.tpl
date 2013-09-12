<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=estado_observacion'   class="tajax"  title='Ordenar por Estado'       >Observaciones  {$filtros->iconOrder('estado_observacion')}</a></th>
      <th><a href='?order=observacion'          class="tajax"  title='Ordenar por Observacion'  >Observaciones  {$filtros->iconOrder('observacion')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
  {section name=ic loop=$objs}
    <tr  class="{cycle values="light,dark"}">
      <td>{$observacion->getEstadoObservacion($objs[ic]['estado_observacion'])}</td>
      <td>{$objs[ic]['observacion']}</td>
      <td>
      </td>
    </tr>
  {/section}
    <tr  class="{cycle values="light,dark"}">
      <td></td>
      <td></td>
      <td>
        <a href="avance.registro.php?revision_id={$objs[0]['revision_id']}" target="_blank" >Resolver {icono('basicset/pencil_48.png','Detalle')}</a>
      </td>
    </tr>
  </tbody>
</table>
