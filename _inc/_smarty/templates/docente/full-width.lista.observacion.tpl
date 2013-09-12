{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
            <p>
               <label for="nombre de proyecto"><small>Nombre de Proyecto:</small></label>
               <span>{$nombre_pr}</span><br/>
               <label for="nombre de estudiante"><small>Nombre de Estudiante:</small></label>
               <span>{$nombre_es}</span>
            </p>
      {include file='docente/filtro.tpl'}
      {if !isset($mascara)}
        {include file='docente/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}