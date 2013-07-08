<form action="{$filtros->clearaction}" method="get" name="filtro" id="filtro" >
  <table  style="width: 75%;float: left;" class="tbl_filtro">
    <tr>
      {section name=ic loop=$filtros->nombres}
        <th><label for="{$filtros->valores[ic][1]}">{$filtros->nombres[ic]}</label></th>
      {/section}
      <th>&nbsp;</th>
    </tr>
    <tr>
      {section name=ic loop=$filtros->valores}
        <td>
          {if ($filtros->valores[ic][0] == 'select')}
            <select name="{$filtros->valores[ic][1]}" id="{$filtros->valores[ic][1]}">
              {html_options selected=$filtros->valores[ic][2] values=$filtros->valores[ic][3] output=$filtros->valores[ic][4]}
            </select>
          {else}
            <input type="text" name="{$filtros->valores[ic][1]}"  id="{$filtros->valores[ic][1]}" value="{$filtros->valores[ic][2]}" />
          {/if}
        </td>
      {/section}
      <td><input type="submit" value="Buscar" name="find" class="sendme" /></td>
    </tr>
  </table>
</form>
<table  style="width: 108px;float: left;" class="tbl_filtro">
  <tr>
    <th>&nbsp;</th>
  </tr>
  <tr>
    <td>
      <form action="{$filtros->clearaction}" method="post" id="filtro_clear">
        <input type="submit" value="Limpiar" name="clear" class="sendme" />
      </form>
    </td>
  </tr>
</table>
{if isset($crear_nuevo)}
  <table  style="width: 90px;float: left;" class="tbl_filtro">
    <tr>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <td>
        <a href="{$crear_nuevo}" title="Crear Nuevo" class="sendme" style="line-height: 19px;">Crear</a>
      </td>
    </tr>
  </table>
{/if}