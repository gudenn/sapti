{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <h1 style="text-align: center;margin: 5px 0;">
    Formulario de Asignacion de Tribunales
    </h1>
    <div class="clear"></div>
    
    
    <form action="" method="post" >
             <h1>  Busqueda por Estudiante</h1>
          <table  style="width: 75%;float: left;" class="tbl_filtro">
          <tr>
              <th><label for="estado_lugar">Codigo Sis</label></th>
              <th><label for="codigo_box">Nombre </label></th>
              <th>&nbsp;</th>
          </tr>
           <tr>
            
                 <td>
                      <input type="text" name="codigosis"  id="codigosis" value="" />
                  </td>
                  <td>
                      <input type="text" name="nombre"  id="nombre" value="" />
                  </td>
        
                  <td><input type="submit" value="Buscar" name="buscar" class="sendme" /></td>
           </tr>
          
          </table>
           </form>
    
       
      
      
           
<div  >
  
  
   <div>
    <table class="tbl_lista" id="docentes"  mane="docentes">
  <thead>
  <tr>
    <th><a href='?order=id'                class="tajax"   title='Ordenar por Id'               >Id            </a></th>
    <th><a href='?order=codigo_box'        class="tajax"   title='Ordenar por Codigo'           >Nombre       </a></th>
    <th><a href='?order=proveedor'         class="tajax"   title='Ordenar por Proveedor'        >Apellidos     </a></th>
    <th><a href='?order=usuario_nombre'    class="tajax"   title='Ordenar por USuario'          >Area      </a></th>
     </tr>
  </thead>
  <tbody>
  {section name=ic loop=$objs}
    <tr  class="selectable">
      <td>{$objs[ic]['id']}
        <input type="hidden" name="ids[]" value="{$objs[ic]['id']}">
      </td>
      <td>{$objs[ic]['usuario_nombre']}</td>
      <td>{$objs[ic]['usuario_apellidos']}</td>
      <td>{$objs[ic]['codigo_sis']}</td>
    </tr>
  {/section}
    </tbody> 
</table>
   </div>          

    <form action="" method="post" id="pedido_form" >
    
  
    
      <table >
        <tr>
     
          <td>
             <h1> Lista de Docentes Asignados </h1>
         
             
       <table  multiple id="asignados" >
        <thead>
          <tr>
            <th>Id            </th>
            <th>Nombre       </th>
            <th>Apellidos    </th>
            <th>Area    </th>
           
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
          
          </td>
        </tr>
      
      
      </table>

    
      <div>
        Observaci&oacute;n<br/>
        <textarea name="comentario" rows="4" style="width: 90%"></textarea>
      </div>
      <div style="text-align: center">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="salida_id" value="25" />
        <input type="submit" value="grabar" name="tarea" class="sendme" 
         
 
      </div>
   </div>
 </form>
 
  
    
    

  </div>

 

</div>
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
              
{include file="footer.tpl"}
