<div id="content">
  {include file='admin/filtro.tpl'}
  {if !isset($mascara)}
    {include file='admin/listas.lista.tpl'}
  {else}
    {include file=$mascara}
  {/if}
</div>
{$ERROR}
