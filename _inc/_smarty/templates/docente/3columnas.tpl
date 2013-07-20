{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="docente/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($columnacentro)}
        {include file="docente/columna.centro.tpl"}
      {else}
        {include file=$columnacentro}
      {/if}
      <!-- ############ -->
      {include file="docente/columna.right.tpl"}
      <!-- ############ -->
    </div>
  </div>
</div>
{include file="footer.tpl"}