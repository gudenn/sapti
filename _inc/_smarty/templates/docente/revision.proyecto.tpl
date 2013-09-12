<table class="tbl_lista">
  <thead>
    <tr>
      <th><a>Id                 </a></th>
      <th><a>Proyecto           </a></th>
      <th><a>Fecha              </a></th>
      <th><a>Nª Observacion     </a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id_re']}</td>
      <td>{$objs[ic]['nombrep']}</td>
      <td>{$objs[ic]['fecha']}</td>
      <td>{$objs[ic]['num']}</td>
      {assign var="ides" value=$objs[ic]['id']}
      <td>
        <a href="observacion.detalle.php?revisiones_id={$objs[ic]['id_re']}" target="_self" >{icono('detalle.png','Detalle')}</a>
        <a href="observacion.editar.php?revisiones_id={$objs[ic]['id_re']}&array={urlencode(serialize($array))}" target="_self">{icono('editar.png','Editar')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
