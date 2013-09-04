{include file="estudiante/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="estudiante/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($columnacentro)}
        {include file="estudiante/columna.centro.tpl"}
      {else}
        {include file=$columnacentro}
      {/if}
      <!-- ############ -->
      {include file="estudiante/columna.right.tpl"}
      <!-- ############ -->
    </div>
  </div>
</div>
{include file="footer.tpl"}