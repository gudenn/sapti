{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
      <h1 class="title">LISTA DE ESTUDIANTES INSCRITOS</h1>
      {if !isset($mascara)}
        {include file='docente/listas.lista.tpl'}
      {else}
        {include file=$mascara}
      {/if}
      <a href="observacion.estudiante-cvs.php" type="button">CARGAR OBSERVACION(ES) POR CVS</a>
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}