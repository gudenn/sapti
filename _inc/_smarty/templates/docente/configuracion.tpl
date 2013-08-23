{include file="header.tpl"}



<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
      
      <form action="" method="post">
       
         <h2 class="title">LISTA DE AREAS</h2>
      
      
     {html_checkboxes name="area_id" values=$area_id output=$area_nombre
   selected=$areaselect_id  separator="<br />"}
   
       <select name=customer_id>
       {html_options values=$numero output=$numero selected=$seleccionado}
       </select>
            <h2 class="title">GUARDAR DATOS</h2>
            <p>
                <input type="hidden" name="tarea" value="grabar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">
            </p>
          </form>
              
              
              
              
              
              
              
              
                      <div id="content" style="width:685px;min-height: 450px;">
        <h1 class="title">Edici&oacute;n de Observaciones</h1>
        <p>Formulario de Edici&oacute;n de Observaciones</p>
        <h2 class="title">Formulario de Edici&oacute;n</h2>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">       	
        </head>
        
        <div id="wrap">
			<!-- Grid contents -->
			<div id="tablecontent"></div>

	    <form name="nueva_observacion" action="" onsubmit="enviarDatosObservacion(); return false">
		<h3>Nueva Observacion</h3>
                <table>
                <tr>
                <td>Observacion: </td>
                <td><label><input name="observacion" type="text" style="width:300px;" /></label></td>
               	</tr>
                </table>
            <h4 class="title">Grabar Revision</h4>
            <p>
              <input name="Submit" type="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" tabindex="3" value="Resetear">
            </p>
          </form>
        </div>
        <p>{$ERROR}</p>
        <a href='javascript:ocultarColumna(1)'>Ocultar/Mostrar columna 1</a>
        
        <script src="js/editablegrid-2.0.1.js"></script>   
		<!-- I use jQuery for the Ajax methods -->
	<script src="js/jquery-1.7.2.min.js" ></script>
	<script src="js/demo.js" ></script>
        <script type="text/javascript">
                    datagrid = new DatabaseGrid('0',{$revisionesid});
        </script>
        <script type="text/javascript">
//la función recibe como parámetros el numero de la columna a ocultar 
function ocultarColumna(num,ver) 
{ 
  //aquí utilizamos el id de la tabla, en este caso es 'tabla'
  fila=document.getElementById('tablecontent').getElementsByTagName('tr');

 //mostramos u ocultamos la cabecera de la columna 
 if (fila[0].getElementsByTagName('th')[num].style.display=='none')
    {
    fila[0].getElementsByTagName('th')[num].style.display=''
    }
  else
    {
    fila[0].getElementsByTagName('th')[num].style.display='none'
    }
   //mostramos u ocultamos las celdas de la columna seleccionada
  for(i=1;i<fila.length;i++)
    {
        if (fila[i].getElementsByTagName('td')[num].style.display=='none')
            {
                fila[i].getElementsByTagName('td')[num].style.display='';  
             }      
        else
            {
             fila[i].getElementsByTagName('td')[num].style.display='none'
            }       
    }         
    
}
        </script>

        <style type="text/css">
        tr:nth-child(even) { background: #ddd }
        tr:nth-child(odd) { background: #fff}
        table {
        color: #666666;
        }
        </style>
        </div>
              
              
              
              
              
              
              
    </div>
  </div>
</div>
              
              
              
{include file="footer.tpl"}
