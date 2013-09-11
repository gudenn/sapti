{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="docente/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($mascara)}
        {include file='docente/listas.lista.evento.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
  </div>
</div>
{include file="footer.tpl"}