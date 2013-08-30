{include file="tribunal/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="tribunal/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($contenido)}
        {include file="tribunal/index.centro.tpl"}
      {else}
        {include file=$contenido}
      {/if}
    </div>
  </div>
</div>
{include file="footer.tpl"}