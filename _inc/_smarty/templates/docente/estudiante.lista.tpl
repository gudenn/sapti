<table class="tbl_lista">
  <thead>
    <tr>
      <th><a>Id       </a></th>
      <th><a>Nombre   </a></th>
      <th><a>Apellidos</a></th>
      <th><a>Proyecto </a></th>
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
        <a href="revision.lista.php?array={urlencode(serialize($objs[ic]))}" target="_blank" >{icono('detalle.png','Seguimiento')}</a>
        <a href="observacion.registro.php?array={urlencode(serialize($objs[ic]))}" target="_blank">{icono('editar.png','Revisar')}</a>
        <a href="proyecto.evaluacion.php?array={urlencode(serialize($objs[ic]))}" target="_blank">{icono('evaluar.png','Evaluar')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>