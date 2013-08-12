      <div id="content">
        <h1 class="title">Edici&oacute;n de Observaciones</h1>
        <p>Formulario de Edici&oacute;n de Observaciones</p>
        <h2 class="title">Formulario de Edici&oacute;n</h2>
        	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EditableGrid Demo - Database Link</title>
                </head>
       	<div id="wrap">
			<!-- Feedback message zone -->
			<div id="message"></div>
			<!-- Grid contents -->
			<div id="tablecontent"></div>
			<!-- Paginator control -->
			<div id="paginator"></div>
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
        <p>Todos los campos con (*) son obligatorios.</p>
        
        <script src="js/editablegrid-2.0.1.js"></script>   
		<!-- I use jQuery for the Ajax methods -->
	<script src="js/jquery-1.7.2.min.js" ></script>
	<script src="js/demo.js" ></script>
        <script type="text/javascript">
                    datagrid = new DatabaseGrid('0');
                </script>
        </div>