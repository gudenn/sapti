{include file="estudiante/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <h1 class="title"><b>Estudiante:</b><br />{$usuario->nombre}, {$usuario->apellidos}</h1>
        {if ($proyecto)}
          <h2 class="title"><b>Proyecto Final:</b><br />{$proyecto->nombre}.</h2>
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