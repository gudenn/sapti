{include file="header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
      {include file='tribunal/filtro.tpl'}
      {if !isset($mascara)}
        {include file='tribunal/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}