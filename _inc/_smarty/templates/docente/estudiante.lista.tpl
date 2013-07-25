<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                  class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=nombre'              class="tajax"  title='Ordenar por Nombre'       >Nombre       {$filtros->iconOrder('nombre')}</a></th>
      <th><a href='?order=apellidos'           class="tajax"  title='Ordenar por Apellidos'    >Apellidos    {$filtros->iconOrder('apellidos')}</a></th>
      <th><a href='?order=proyecto'               class="tajax"  title='Ordenar por Proyecto'        >Proyecto        {$filtros->iconOrder('proyecto')}</a></th>
    <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['nombre']}</td>
      <td>{$objs[ic]['apellidos']}</td>
      <td>{$objs[ic]['nombrep']}</td>
      <td>
        <a href="observacion.lista.php?proyecto_id={$objs[ic]['id_pr']}" target="_blank" >{icono('detalle.png','Seguimiento')}</a>
        <a href="observacion.registro.php?proyecto_id={$objs[ic]['id_pr']}" target="_blank">{icono('editar.png','Revisar')}</a>
        <a href="proyecto.evaluacion.php?proyecto_id={$objs[ic]['id_pr']}&evaluacion_id={$objs[ic]['eva']}" target="_blank">{icono('borrar.png','Evaluar')}</a>
      </td>
    </tr>
  </tbody>

  {/section}
</table>
