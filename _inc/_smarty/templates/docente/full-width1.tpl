{include file="admin/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
      {include file='docente/filtro.tpl'}
      {if !isset($mascara)}
        {include file='docente/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
      <div id="nota">
        <h1 class="title">Registro de Evaluaciones</h1>
        <p>Formulario de Registro de Evaluacion</p>
         <p>
           <input type="text" name="evaluacion" id="evaluacion" value="{$revision->revisor}" size="22">
           <label for="fecha_revision"><small>Evaluacion</small></label>
         </p>
       </div>
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}