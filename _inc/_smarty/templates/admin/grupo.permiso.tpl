<table class="tbl_lista">
  <tr>
    <th><a href='?order=id'                  class="tajax"  title='Ordenar por Id'           >Id           {$filtros->iconOrder('id')}</a></th>
    <th><a href='?order=estado'              class="tajax"  title='Ordenar por Estado'       >Estado       {$filtros->iconOrder('estado')}</a></th>
    <th><a href='?order=codigo'              class="tajax"  title='Ordenar por Codigo'       >Codigo       {$filtros->iconOrder('codigo')}</a></th>
    <th><a href='?order=descripcion'         class="tajax"  title='Ordenar por Descipcion'   >Descripcion  {$filtros->iconOrder('descripcion')}</a></th>
    <th><a href='?order=ver'                 class="tajax"  title='Ordenar por Ver'          >Ver          {$filtros->iconOrder('ver')}</a></th>
    <th><a href='?order=crear'               class="tajax"  title='Ordenar por Crear'        >Crear        {$filtros->iconOrder('crear')}</a></th>
    <th><a href='?order=editar'              class="tajax"  title='Ordenar por Editar'       >Editar       {$filtros->iconOrder('editar')}</a></th>
    <th><a href='?order=eliminar'            class="tajax"  title='Ordenar por Eliminar'     >Eliminar     {$filtros->iconOrder('eliminar')}</a></th>
  </tr>
  {section name=ic loop=$objs}
    <tr>
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['estado']}</td>
      <td>{$objs[ic]['modulo_codigo']}</td>
      <td>{$objs[ic]['modulo_descripcion']}</td>
      <td><input type="checkbox" name="id{$objs[ic]['id']}_ver"          value="1" {if ($objs[ic]['ver'])}       checked="checked" {/if} ></td>
      <td><input type="checkbox" name="id{$objs[ic]['crear']}_crear"     value="1" {if ($objs[ic]['crear'])}     checked="checked" {/if} ></td>
      <td><input type="checkbox" name="id{$objs[ic]['editar']}_editar"   value="1" {if ($objs[ic]['editar'])}    checked="checked" {/if} ></td>
      <td><input type="checkbox" name="id{$objs[ic]['eliminar']}_editar" value="1" {if ($objs[ic]['eliminar'])}  checked="checked" {/if} ></td>
    </tr>
  {/section}
</table>