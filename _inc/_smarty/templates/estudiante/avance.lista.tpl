<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=estado_avance' class="tajax"  title='Ordenar por Estado'      >Estado       {$filtros->iconOrder('estado_avance')}</a></th>
      <th><a href='?order=fecha_avance'  class="tajax"  title='Ordenar por Fecha'       >Fecha        {$filtros->iconOrder('fecha_avance')}</a></th>
      <th><a href='?order=descripcion'   class="tajax"  title='Ordenar por Descripcion' >Descripcion  {$filtros->iconOrder('descripcion')}</a></th>
      <th>Detalle</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$avance->getEstadoAvance($objs[ic]['estado_avance'])}</td>
      <td>{$objs[ic]['fecha_avance_toshow']}</td>
      <td>{$avance->getResumen($objs[ic]['descripcion'])}</td>
      {assign var="ides" value=$objs[ic]['id']}
      <td>
        <a href="avance.detalle.php?avance_id={$objs[ic]['id']}" target="_blank" >Ver {icono('basicset/search_48.png','Detalle')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
