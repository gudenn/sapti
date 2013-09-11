{include file="estudiante/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        {if ($proyecto)}
          <h1 class="title"><b>Proyecto Final:</b><br />{$proyecto->nombre}.</h1>
        {/if}
      {include file='estudiante/filtro.tpl'}
      {if !isset($mascara)}
        {include file='estudiante/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}