{include file="tutor/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="tutor/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($columnacentro)}
        {include file="tutor/index.centro.tutor.tpl"}
      {else}
        {include file=$columnacentro}
      {/if}
      
    </div>
  </div>
</div>
{include file="footer.tpl"}