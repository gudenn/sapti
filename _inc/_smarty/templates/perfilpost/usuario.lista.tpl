<table class="tbl_lista">
  <thead>
  <tr>
    <th><a href='?order=id'                  class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('cod')}</a></th>
    <th><a href='?order=titulo'              class="tajax"  title='Ordenar por Estado'       >Titulo       {$filtros->iconOrder('titulo')}</a></th>
    <th><a href='?order=autor'              class="tajax"  title='Ordenar por Nombre'       >Autor       {$filtros->iconOrder('autor')}</a></th>
    <th><a href='?order=tutor'           class="tajax"  title='Ordenar por Apellidos'    >Tutor    {$filtros->iconOrder('tutor')}</a></th>
     <th><a href='?order=tutor'           class="tajax"  title='Ordenar por Apellidos'    >Gestion    {$filtros->iconOrder('gestion')}</a></th>     
	 <th>Detalle</th>
    </tr>
  </thead>
  {section name=ic loop=$objs}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['titulo']}</td>
      <td>{$objs[ic]['autor']}</td>
      <td>{$objs[ic]['tutor']}</td>
	  <td>{$objs[ic]['gestion']}</td>
     <td>
        
        <a href="estudiante.gestion.php?eliminar=1&estudiante_id={$objs[ic]['id']}" onclick="return confirm('Eliminar este Estudiante?');"  >{icono('borrar.png','Eliminar')}</a>
  
      </td>
    </tr>
	
	 </td>
      
  </tbody>
 
  {/section}
</table>
<tr bgcolor="#F1F5F8">
    <td bgcolor="#F7F7F7" style="text-align:center"><em><strong><a href="postergados-pdf.php" class="botonlink">PDF</a></strong></em></td>
    </tr>


