

 <div id="content">
     
    <center> <strong>FORMULARIO DE REGISTRO DE TRIBUNALES</strong></td></center>
    
    <div style="width: 50%;float: left;"  class="tbl_filtro">
    <form action="" method="post" >
             <h1>  BUSQUEDA POR ESTUDIANTE</h1>
          <table  >
          <tr>
              <th><label for="estado_lugar">CODIGO SIS</label></th>
               
          </tr>
           <tr>
            
                 <td>
                      <input type="text" name="codigosis"  id="codigosis" value="" />
                  </td>
        <td><input type="submit" value="Buscar" name="buscar" class="sendme" /></td>
           </tr>
          
          </table>
     </form>

  </div>
    <div style="width: 50%;float: left;" class="tbl_filtro">
        
   <form action="" method="post">
      <h1> RESULTADO DE LA BUSQUEDA</h1>
        <label for="nombre">NOMBRE:  {$usuariobuscado->nombre}</label><br />
        <label for="nombre">APELLIDOS:   {$usuariobuscado->apellidos}</label><br />
         <label for="nombre">CODIGO SIS:   {$estudiantebuscado->codigo_sis}</label><br />
         <label for="nombre">PROYECTO:   {$proyectobuscado->nombre}</label><br />
         <label for="Area">NUMERO:   {$proyectobuscado->id}</label><br />
         <label for="nombre">AREA:   {$proyectoarea->nombre}</label><br />
       
 </form>
 </div>   
  <hr>
      
           
<div >
  
  
   <div style="width: 45%;float: left;" class="tbl_filtro">
     <Hi> LISTA DE LOS DOCENTES</Hi>
    <table class="tbl_lista" id="docentes"  mane="docentes">
  <thead>
  <tr>
    <th><a >ID          </a></th>
    <th><a >NOMBRE      </a></th>
    <th><a  >APELLIDOS     </a></th>
    <th><a >ES</a></th>
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
    <div style="width: 45%;float: left; padding-left:27px">
      
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
             <th>ES</th>
           
          </tr>
        </thead>
        <tbody>
  
        </tbody>
      </table>
        
     
      <input type="hidden" id="proyecto_id" name="proyecto_id" value="{$proyectobuscado->id}" /><br />
       <input type="hidden" id="proyecto_id" name="estudiante_id" value="{$estudiantebuscado->codigo_sis}" /><br />
      
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
