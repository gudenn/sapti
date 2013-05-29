{include file="admin/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="admin/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($columnacentro)}
        {include file="admin/columna.centro.tpl"}
      {else}
        {include file=$columnacentro}
      {/if}
      <!-- ############ -->
      {include file="admin/columna.right.tpl"}
      <!-- ############ -->
    </div>
  </div>
</div>
{include file="footer.tpl"}