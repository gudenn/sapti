{include file="perfilpost/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
     
      {if !isset($mascara)}
        {include file='perfilpost/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}