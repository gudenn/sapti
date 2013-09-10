        <div id="content" style="width:685px;min-height: 450px;">
        <h1 class="title">EDICION DE OBSERVACIONES</h1>
          <p>
            <label for="proyecto_id"><small>Nombres de Proyecto: </small></label>
            <span>{{$array1['nombrep']}}</span>
          </p>
          <p>
            <label for="fecha_observacion"><small>Nombre de Estudiante: </small></label>
            <span>{{$array1['nombre']}} {{$array1['apellidos']}}</span>            
          </p>
        <h2 class="title">Formulario de Edici&oacute;n</h2>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">       	
        </head>
        
        <div id="wrap">
			<!-- Grid contents -->
			<div id="tablecontent"></div>

	    <form name="nueva_observacion" id="nueva_observacion" action="" onsubmit="enviarDatosObservacion(); return false">
		<h3>Nueva Observacion</h3>
                <table>
                <tr>
                <td>Observacion: </td>
                <td><label><input name="observacion" type="text" style="width:300px;" data-validation-engine="validate[required]"/></label></td>
               	</tr>
                </table>
            <h4 class="title">Grabar Revision</h4>
            <p>
              <input name="submit" type="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" tabindex="3" value="Resetear">
            </p>
          </form>
        <form action="#" method="post">
        <input name="borrar" type="submit" value="ELIMINAR TODAS LAS OBSERVACION(ES)">
        </form>
        </div>
        <p>{$ERROR}</p>
        
        <script src="js/editablegrid-2.0.1.js"></script>   
	<script src="js/tablaeditable.js" ></script>
        <script type="text/javascript">
                    datagrid = new DatabaseGrid('0',{$revisionesid});
        </script>
        <script type="text/javascript">
        {literal} 
          jQuery(document).ready(function(){
            jQuery("#nueva_observacion").validationEngine();
            var wo = 'bottomRight';
            jQuery('input').attr('data-prompt-position',wo);
            jQuery('input').data('promptPosition',wo);
            jQuery('textarea').attr('data-prompt-position',wo);
            jQuery('textarea').data('promptPosition',wo);
            jQuery('select').attr('data-prompt-position',wo);
            jQuery('select').data('promptPosition',wo);
          });
        {/literal} 
        </script>
        <style type="text/css">
        tr:nth-child(even) { background: #ddd }
        tr:nth-child(odd) { background: #fff}
        table {
        color: #666666;
        }
        </style>
        </div>