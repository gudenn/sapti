{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <h1 class="title">REGISTRO DE EVALUACIONES</h1>
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
        <h2 class="title">EVALUACIONES</h2>
        <div id="wrap">
		<div id="tablecontent"></div>
        </div>
        <p>{$ERROR}</p>
     </div>
    {$ERROR}
    </div>
</div>
{include file="footer.tpl"}
        <script src="js/editablegrid-2.0.1.js"></script>   
	<script src="js/tablaeditable.js" ></script>
        <script type="text/javascript">
                    datagrid = new DatabaseGrid('eva',{$evaluacion_ids});
        </script>