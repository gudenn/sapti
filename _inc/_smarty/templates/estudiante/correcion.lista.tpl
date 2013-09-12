<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=estado_revision'           accesskey="" class="tajax"  title='Ordenar por Estado'       >Estado  {$filtros->iconOrder('estado')}</a></th>
      <th><a href='?order=revisor_tipo'              accesskey="" class="tajax"  title='Ordenar por Tipo Revisor' >Revisor {$filtros->iconOrder('revisor_tipo')}</a></th>
      <th></th>
      <th><a href='?order=fecha_revision'            class="tajax"  title='Ordenar por Fecha'        >Fecha        {$filtros->iconOrder('fecha_revision')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
  {section name=ic loop=$objs}
    <tr  class="{cycle values="light,dark"}">
      <td>{$revision->getEstadoRevision($objs[ic]['estado_revision'])}
      </td>
      <td>
        {icono($objs[ic]['revisor_tipo']|cat:'_48.png','Revisor')}
        {Revision::getRevisor($objs[ic]['revisor'],$objs[ic]['revisor_tipo'],true)|upper} 
      </td>
      <td>
        {Revision::getRevisor($objs[ic]['revisor'],$objs[ic]['revisor_tipo'])|upper}
      </td>
      <td>{$objs[ic]['fecha_revision_toshow']}</td>
      <td>
        <a href="observacion.gestion.php?revision_id={$objs[ic]['id']}" target="_blank" >Ver Detalle {icono('basicset/search_48.png','Detalle')}</a>
      </td>
    </tr>
  {/section}
</table>
