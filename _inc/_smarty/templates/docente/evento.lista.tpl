<table class="tbl_lista" style="width:685px;">
  <thead>
    <tr>
      <th><a>Id       </a></th>
      <th><a>Titulo   </a></th>
      <th><a>Descripcion</a></th>
      <th><a>Fecha </a></th>
    <th>Opciones</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['asunto']}</td>
      <td>{$objs[ic]['descripcion']}</td>
      <td>{$objs[ic]['fecha_evento']}</td>
      <td>
        <a href="iframe2.html" class="clsVentanaIFrame clsBoton" rel="Este es el segundo iframe">{icono('detalle.png','Seguimiento')}</a>
        <input type="hidden" name="eventoid" id="eventoid" value={$objs[ic]['id']}/>
        <a href="observacion.registro.php?array={urlencode(serialize($objs[ic]))}" target="_blank">{icono('editar.png','Revisar')}</a>
        <a href="proyecto.evaluacion.php?array={urlencode(serialize($objs[ic]))}" target="_blank">{icono('evaluar.png','Evaluar')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>