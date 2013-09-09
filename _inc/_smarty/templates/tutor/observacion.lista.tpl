<table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=nombre'                   class="tajax"  title='Ordenar por Id'           >NOMBRE ESTUDIANTE           {$filtros->iconOrder('nombre')}</a></th>
      <th><a href='?order=apellidos'       class="tajax"  title='Ordenar por  Apellidos'        >NOMBRE PROYECTO        {$filtros->iconOrder('apellidos')}</a></th>
      <th><a href='?order=nombreproyecto'          class="tajax"  title='Ordenar por NombreProyecto'  >MODALIDAD  {$filtros->iconOrder('nombreproyecto')}</a></th>
      <th><a href='?order=nombremodalidad'          class="tajax"  title='Ordenar por NombreModalidad'  >AREA  {$filtros->iconOrder('modalidad')}</a></th>
      <th><a href='?order=nombresu'          class="tajax"  title='Ordenar por NombreSubArea'  >SUB-AREA  {$filtros->iconOrder('nombresubarea')}</a></th>
      <th>OPCIONES</th>
    </tr>
  </thead>
  {section name=ic loop=$objss}
  <tbody>
    <tr  class="{cycle values="light,dark"}">
      <td>{$objss[ic]->nombre} {$objss[ic]->apellidos}</td>
     <td>{$objss[ic]->nombreproyecto}</td>
     <td>{$objss[ic]->modalidad}</td>
     <td>{$objss[ic]->nombrearea}</td>
     <td>{$objss[ic]->nombresub}</td>
      {assign var="ides" value=$objsss[ic]['id']}
      <td>
        <a href="correciones.registro.php?observacion_id={$objss[ic]->nombre}" target="_blank" >{icono('detalle.png','Detalle')}</a>
      </td>
    </tr>
  </tbody>
  {/section}
</table>
