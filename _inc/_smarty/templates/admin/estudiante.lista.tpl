<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                  class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
      <th><a href='?order=nombre'              class="tajax"  title='Ordenar por Nombre'       >Nombre       {$filtros->iconOrder('nombre')}</a></th>
      <th><a href='?order=apellidos'           class="tajax"  title='Ordenar por Apellidos'    >Apellidos    {$filtros->iconOrder('apellidos')}</a></th>
      <th><a href='?order=login'               class="tajax"  title='Ordenar por Login'        >Login        {$filtros->iconOrder('login')}</a></th>
      <th><a href='?order=email'               class="tajax"  title='Ordenar por Email'        >Email        {$filtros->iconOrder('email')}</a></th>
      <th><a href='?order=codigo_sis'          class="tajax"  title='Ordenar por Codigo Sis'   >Codigo Sis   {$filtros->iconOrder('codigo_sis')}</a></th>
      <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['usuario_nombre']}</td>
      <td>{$objs[ic]['usuario_apellidos']}</td>
      <td>{$objs[ic]['usuario_login']}</td>
      <td>{$objs[ic]['usuario_email']}</td>
      <td>{$objs[ic]['codigo_sis']}</td>
      <td>
        <a href="estudiante.detalle.php?estudiante_id={$objs[ic]['id']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
        <a href="estudiante.editar.php?estudiante_id={$objs[ic]['id']}" target="_blank">{icono('editar.png','Editar')}</a>
        <a href="estudiante.gestion.php?eliminar=1&estudiante_id={$objs[ic]['id']}" onclick="return confirm('Eliminar este Estudiante?');"  >{icono('borrar.png','Eliminar')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
