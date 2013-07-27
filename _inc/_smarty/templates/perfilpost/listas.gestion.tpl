<div id="content">
  {include file='perfil/filtro.tpl'}
  {if !isset($mascara)}
    {include file='perfil/listas.lista.tpl'}
  {else}
    {include file=$mascara}
  {/if}
</div>
{$ERROR}
