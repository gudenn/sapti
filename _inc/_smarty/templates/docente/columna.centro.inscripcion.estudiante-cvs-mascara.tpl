      <div id="content" style="width:685px;min-height: 450px;">
          <form action="#" method="post" id="registro" name="registro" >
        <h1 class="title">INSCRIPCION DE ESTUDIANTES USANDO CVS</h1>
            <p>
              <select name="materia_selec" id="materia_selec" >
              {html_options values=$materia_values selected=$materia_selected output=$materia_output}
              </select>
              <label for="materia_selec"><small>Seleccione Materia para Inscrivir sus Estudiantes(*)</small></label>
           </p>
           <p>
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Seleccionar">
              &nbsp;
           </p>
              <h2 class="title">SELECCIONE MATERIA PARA CARGAR EL FORMULARIO DE INSCRIPCION</h2>
      
        <div id="respond">
        </div>
         </form>
        <p>{$ERROR}</p>
        <p>Todos los campos con (*) son obligatorios.</p>
      </div>
        