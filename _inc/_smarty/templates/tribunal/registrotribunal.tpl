{include file="header.tpl"}



<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
      
      <form action="" method="post">
           
           <label for="nombre">Nombre Proyecto</label> 
           <select name=proyecto_id>
            {html_options values=$proyecto_id output=$proyecto_nombre selected=$proyecto_id}
          </select><br />
             <div class='container'>
    
      
            <h3>Seleccione Los Docentes</h3>
		   
        
       <br/>
        <div class='span12'>
          <select multiple id="searchable" name="searchable[]">
          {html_options values=$usuario_id output=$usuario_nombre}
           
          </select>
          
          <br />
        </div>
        
       </div>
      
              
              <label for="nombre">Descripcion </label> <br />
              <textarea   id="descripcion_asignacion"  name="descripcion_asignacion"  value="{$tribunal->descripcion_asignacion}" >  </textarea><br/>
          <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
          </form>
    </div>
  </div>
</div>
              
              
              
{include file="footer.tpl"}
