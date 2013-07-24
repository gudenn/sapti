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
      <div id="respond">
        <form action="#" method="post" id="registro" name="registro" >
        <h1 class="title">Registro de Evaluaciones</h1>
         <p>
           <input type="text" name="evaluacion" id="evaluacion" value="{$evaluacion->evaluacion_1}" size="22">
           <label for="evaluacion"><small>Evaluacion</small></label>
         </p>
         <h2 class="title">Grabar Evaluacion</h2>
            <p>
              <input type="hidden" name="id" value="{$evaluacion->id}">
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">
            </p>
          </form>
        </div>
        <p>{$ERROR}</p>
        <p>Todos los campos con (*) son obligatorios.</p>
       </div>
    </div>
    {$ERROR}
    </div>
  </div>
</div>
{include file="footer.tpl"}