 <div id="content">

    <center> <strong>EDITANDO</strong></td></center>
     
          
   <form action="" method="post">
      <h1></h1>
       {section name=ic loop=$arraytribunaldatos}
       <label for="nombre">NOMBRE:  {$arraytribunaldatos[ic]['nombre']}</label><br />
        <label for="nombre">APELLIDOS:  {$arraytribunaldatos[ic]['apellidos']}</label><br />
         <label for="nombre">CODIGO SIS:  {$arraytribunaldatos[ic]['codigo_sis']}</label><br />
          <label for="nombre">PROYECTO:  {$arraytribunaldatos[ic]['nombreproyecto']}</label><br />
       
       {/section}
      
   </form>

  <h1></h1>     
           
<div >
  
  
   <div style="width: 45%;float: left;" class="tbl_filtro">
     <Hi> LISTA DE LOS DOCENTES</Hi>
    <table class="tbl_lista" id="docentes"  mane="docentes">
  <thead>
  <tr>
    <th><a >ID          </a></th>
    <th><a >NOMBRE      </a></th>
    <th><a  >APELLIDOS     </a></th>
    <th><a >ESPE</a></th>
     </tr>
  </thead>
  <tbody>
  {section name=ic loop=$listadocentes}
   
    <tr  class="selectable">
   
      <td>{$listadocentes[ic][0]}
        <input type="hidden" name="ids[]" value="{$listadocentes[ic][0]}">
      </td>
      <td>
        {$listadocentes[ic][1]}
      </td>
      <td>{$listadocentes[ic][2]}</td>
          <td>     <a  class="tooltip"> VER
  <span>
  <b>
 </b>
{foreach name=outer item=contact from=$listadocentes[ic][3]}
  <hr />
  {foreach key=key item=item from=$contact}
  {$item}<br />
  {/foreach}
{/foreach}
 </span> 
        
       </a>
</td>

     
    </tr>
  {/section}
    </tbody> 
</table>
   </div>          
    <div style="width: 45%;float: left; padding-left:20px" >
      
       <form action="" method="post" id="pedido_form" >
 
   <Hi> LISTA DE LOS DOCENTES ASIGNADOS</Hi>
     
        <tr>
     
          <td>
             
         
             
       <table  multiple id="asignados" >
        <thead>
          <tr>
            <th>ID          </th>
            <th>NOMBRE       </th>
            <th>APELLIDOS   </th>
             <th>ESPE</th>
           
          </tr>
        </thead>
        <tbody>
          {section name=ic loop=$listadocenteselec}
   
    <tr  class="selectable">
   
      <td>{$listadocenteselec[ic][0]}
        <input type="hidden" name="ids[]" value="{$listadocenteselec[ic][0]}">
      </td>
      <td>
        {$listadocenteselec[ic][1]}
      </td>
      <td>{$listadocenteselec[ic][2]}</td>
          <td>     <a  class="tooltip"> VER
  <span>
  <b>
 </b>
{foreach name=outer item=contact from=$listadocenteselec[ic][3]}
  <hr />
  {foreach key=key item=item from=$contact}
  {$item}<br />
  {/foreach}
{/foreach}
 </span> 
        
       </a>
</td>

     
    </tr>
  {/section}
          
  
        </tbody>
      </table>
        
     
      <input type="hidden" id="proyecto_id" name="proyecto_id" value="{$proyectobuscado->id}" /><br />
       <input type="hidden" id="proyecto_id" name="estudiante_id" value="{$estudiantebuscado->codigo_sis}" /><br />
       <input type="hidden" id="proyecto_tribunal_id" name="proyecto_tribunal_id" value="{$idproyectotribunal}" /><br />
    
        </div>
       
       <div style ="clear:both;"></div>
      <div>
        Mensaje<br/>
        <textarea name="detalle" rows="5" style="width: 90%"></textarea>
      </div>
      <div>
        Observaci&oacute;n<br/>
        <textarea name="comentario" rows="4" style="width: 90%"></textarea>
      </div>
      
      
      <div style="text-align: center">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="salida_id" value="25" />
        <input type="submit" value="grabar" name="tarea" class="sendme"  />
         
 
      </div>
 
 </form>
    </div>
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