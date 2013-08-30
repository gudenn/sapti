{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <h1 class="title">SEGUIMIENTO DE PROYECTO</h1>
            <p>
               <label for="nombre de proyecto"><small>NOMBRE DE PROYECTO:</small></label>
               <span>{$nombre_pr}</span><br/>
               <label for="nombre de estudiante"><small>NOMBRE DE ESTUDIANTE:</small></label>
               <span>{$nombre_es}</span>
            </p>
      {include file='docente/filtro.tpl'}
      {if !isset($mascara)}
        {include file='docente/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
        <p>{$ERROR}</p>
     </div>
    {$ERROR}
    </div>
</div>
{include file="footer.tpl"}