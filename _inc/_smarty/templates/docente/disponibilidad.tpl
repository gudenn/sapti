 <div id="content">

   <h1> DISPONIBILIDAD DE TIEMPO DEL DOCENTE</h1>
 <table class="tbl_lista">
  <thead>
    <tr>
      <th><a >DIA     </a></th>
      <th><a >HORARIO    </a></th>
      <th><a >ELIMINAR </a></th>
       </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$listadias}
    <tr  class="selectable">
     <td>{$listadias[ic]['nombredia']} </td>
       <td>{$listadias[ic]['nombreturno']}</td>
        
  
      <td>  <a href="disponibilidad.php?eliminar=1&horario_id={$listadias[ic]['id']}" onclick="return confirm('ELIMINAR EL HORARIO?');"  >{icono('borrar.png','ELIMINAR')}</a>
     
        </td>
      
        
    </tr>
  {/section}
    </tbody> 
</table>
    <form action="#" method="post" id="registro" name="registro" >
            <p>
              <select name="dia_id" id="dia_id" >
              {html_options values=$diaid selected=$diaid output=$dianombre}
              </select>
              <label for="semestre_id"><small>DIA(*)</small></label>
            </p>
            <p>
              <select name="turno_id" id="turno_id" >
              {html_options values=$turnoid selected=$turnoid output=$turnonombre}
              </select>
              <label for="materia_id"><small>HORARIO(*)</small></label>
            </p>
            
            <h2 class="title">Grabar </h2>
            <p>
              <input type="hidden" name="usuario_id"    value="{$usuario->id}">
              <input type="hidden" name="estudiante_id" value="{$estudiante->id}">
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              <input name="submit" type="submit" id="submit" value="Grabar">
             </p>
          </form>

    

 
<script type="text/javascript">

  jQuery(function(){
    $("#docentes tbody").on("click", "tr", function(event){
 if ($('#asignados > tbody >tr').length==3)
    {
     alert ( "Solo se Permitern tres Tribunales!!" );
      } else
        {
           $("#asignados").append('<tr>' + $(this).html() + '</tr>');
         $(this).remove();
          }
        return false;
      
      
     
      
    
    
    });
  });
</script>

<script type="text/javascript">

  jQuery(function(){
    $("#asignados tbody").on("click", "tr", function(event){
    
      $("#docentes tbody").append('<tr>' + $(this).html() + '</tr>');
      $(this).remove();
      return false;
    });
  });


</script>
              
 </div>