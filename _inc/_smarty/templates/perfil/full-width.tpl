{include file="perfil/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
      {include file='perfil/filtro.tpl'}
      {if !isset($mascara)}
        {include file='perfil/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}