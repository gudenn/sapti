{include file="header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ############ -->
      {include file="perfil/columna.left.tpl"}
      <!-- ############ -->
      {if !isset($columnacentro)}
        {include file="perfil/columna.centro.tpl"}
      {else}
        {include file=$columnacentro}
      {/if}
      <!-- ############ -->
      {include file="perfil/columna.right.tpl"}
      <!-- ############ -->
    </div>
  </div>
</div>
{include file="footer.tpl"}