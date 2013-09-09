{include file="estudiante/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <h1 class="title"><b>Tutor:</b><br />{$usuario->nombre} {$usuario->apellidos}</h1>
       
      {include file='tutor/filtro.tpl'}
      {if !isset($mascara)}
        {include file='tutor/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}