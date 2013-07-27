<table class="tbl_lista">
  <thead>
  <tr>
    <th><a href='?order=id'                  class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
    <th><a href='?order=titulo'              class="tajax"  title='Ordenar por Estado'       >Titulo       {$filtros->iconOrder('titulop')}</a></th>
    <th><a href='?order=autor'              class="tajax"  title='Ordenar por Nombre'       >Autor       {$filtros->iconOrder('autorp')}</a></th>
    <th><a href='?order=tutor'           class="tajax"  title='Ordenar por Apellidos'    >Tutor    {$filtros->iconOrder('tutorp')}</a></th>
     <th><a href='?order=tutor'           class="tajax"  title='Ordenar por Apellidos'    >Gestion    {$filtros->iconOrder('gestionp')}</a></th>     
	 <th>Detalle</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['titulop']}</td>
      <td>{$objs[ic]['autorp']}</td>
      <td>{$objs[ic]['tutorp']}</td>
	  <td>{$objs[ic]['gestionp']}</td>
      <td><a href="estudiante.gestion.php?eliminar=1&estudiante_id={$objs[ic]['id']}" onclick="return confirm('Eliminar este Estudiante?');"  >{icono('borrar.png','Eliminar')}</a></td>
    </tr>
	
  </tbody>
 
  {/section}
</table>
<tr bgcolor="#F1F5F8">
    <td bgcolor="#F7F7F7" style="text-align:center"><em><strong><a href="proceso-pdf.php" class="botonlink">PDF</a></strong></em></td>
    </tr>


