<!-- Omito la cabecera HTML, no hace falta -->
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td><strong>Usuario</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Dirección</strong></td>
    <td><strong>Comentarios</strong></td>
  </tr>
  {foreach from=$usuarios item=usuario}
  <tr>
    <td>{$usuario.usuario}</td>
    <td>{$usuario.nombre}</td>
    <td>{$usuario.direccion}</td>
    <td>{$usuario.comentarios}</td>
  </tr>
  {foreachelse}
  <tr><td colspan="4">No hay usuarios.</td></tr>
  {/foreach}
</table>