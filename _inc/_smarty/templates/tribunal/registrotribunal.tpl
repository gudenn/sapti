{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <h1 style="text-align: center;margin: 5px 0;">
    Formulario de Asignacion de Tribunales
    </h1>
    <div class="clear"></div>
    <form action="pedidoembarque.crear.php" method="get" name="filtro" id="filtro" >
     
      <table>
        <tr>
          
          <td>
            <h1>  Busqueda por Estudiante</h1>
          <table  style="width: 75%;float: left;" class="tbl_filtro">
          <tr>
              <th><label for="estado_lugar">Codigo Sis</label></th>
              <th><label for="codigo_box">Nombre </label></th>
              <th>&nbsp;</th>
          </tr>
           <tr>
            
                 <td>
                      <input type="text" name="codigo_box"  id="codigo_box" value="" />
                  </td>
                   <td>
                      <input type="text" name="proveedor"  id="proveedor" value="" />
                  </td>
        
                  <td><input type="submit" value="Buscar" name="find" class="sendme" /></td>
           </tr>
          </table>
          
          </td>
          <td>
                 <h1>  Busqueda por Proyecto</h1> 
<table  style="width: 75%;float: left;" class="tbl_filtro">
    <tr>
              <th><label for="estado_lugar">Nombre Proyecto</label></th>
              <th><label for="codigo_box">Codigo</label></th>
              <th>&nbsp;</th>
    </tr>
    <tr>
            
                 <td>
                      <input type="text" name="codigo_box"  id="codigo_box" value="" />
                  </td>
                   <td>
                      <input type="text" name="proveedor"  id="proveedor" value="" />
                  </td>
        
                  <td><input type="submit" value="Buscar" name="find" class="sendme" /></td>
    </tr>
  </table>
          
          </td>
        </tr>
      
      
      </table>
  

          </form>
    
  <form action="" method="post" id="pedido_form" >
    
      <table border="0">
        <tr>
          
          <td>
            <h1> Lista de Docentes </h1>
 <table class="tbl_lista" id="almacen">
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
      <td>{$objs[ic]['id']}</td>
      <td>{$objs[ic]['usuario_nombre']}</td>
      <td>{$objs[ic]['usuario_apellidos']}</td>
      <td>{$objs[ic]['codigo_sis']}</td>
    </tr>
  {/section}
    </tbody> 
</table>
      
          
          </td>
          <td>
             <h1> Lista de Docentes Asignados </h1>
       <table class="tbl_lista" id="pedido">
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
    </form>


  </div>

  

</div>
</div>
  
  
  <script type="text/javascript">

  jQuery(function(){
    $("#almacen tbody").on("click", "tr", function(event){
 if ($('#pedido > tbody >tr').length==3)
    {
     alert ( "Solo se Permitern tres Tribunales!!" );
      } else
        {
           $("#pedido").append('<tr>' + $(this).html() + '</tr>');
         $(this).remove();
          }
        return false;
      
      
     
      
    
    
    });
  });
</script>

<script type="text/javascript">

  jQuery(function(){
    $("#pedido tbody").on("click", "tr", function(event){
    
      $("#almacen tbody").append('<tr>' + $(this).html() + '</tr>');
      $(this).remove();
      return false;
    });
  });


</script>
              
{include file="footer.tpl"}
