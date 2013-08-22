<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                        accesskey="" class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=revisor_tipo'              accesskey="" class="tajax"  title='Ordenar por Tipo Revisor' >Revisor {$filtros->iconOrder('revisor_tipo')}</a></th>
      <th></th>
      <th><a href='?order=fecha_revision'            class="tajax"  title='Ordenar por Fecha'        >Fecha        {$filtros->iconOrder('fecha_revision')}</a></th>
      <th><a href='?order=observacion'               class="tajax"  title='Ordenar por Observacion'  >Observaciones  {$filtros->iconOrder('observacion')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}
      </td>
      <td>
        {icono($objs[ic]['revisor_tipo']|cat:'_48.png','Revisor')}
        {Revision::getRevisor($objs[ic]['revisor'],$objs[ic]['revisor_tipo'],true)|upper} 
      </td>
      <td>
        {Revision::getRevisor($objs[ic]['revisor'],$objs[ic]['revisor_tipo'])|upper}
      </td>
      <td>{$objs[ic]['fecha_revision_toshow']}</td>
      <td>Detalle</td>
      {assign var="ides" value=$objs[ic]['id']}
      <td>
        <a href="observacion.gestion.php?revision_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
