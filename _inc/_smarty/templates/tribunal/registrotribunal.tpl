{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO DE TRIBUNALES</strong></td></center>
    
    <div class="clear"></div>
    
    
          <div style="width: 50%;float: left;" class="tbl_filtro">
    <form action="" method="post" >
             <h1>  Busqueda por Estudiante</h1>
          <table  style="width: 100%;float: left;" class="tbl_filtro">
          <tr>
              <th><label for="estado_lugar">Codigo Sis</label></th>
               
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
      <h1> Resultado de la  Busqueda</h1>
        <label for="nombre">nombre:  {$usuariobuscado->nombre}</label><br />
        <label for="nombre">Apellidos:   {$usuariobuscado->apellidos}</label><br />
         <label for="nombre">Codigo Sis:   {$estudiantebuscado->codigo_sis}</label><br />
         <label for="nombre">Proyecto:   {$proyectobuscado->nombre}</label><br />
         <label for="Area">Numero:   {$proyectobuscado->id}</label><br />
         <label for="nombre">Area del Proyecto:   {$proyectoarea->nombre}</label><br />
       
 </form>
 </div>   
       
       
<div style="width: 100%;float: left;" class="tbl_filtro"></div>
<hr>
<form name="" action="" method="POST">
<div align="center"><br>
  <h1> Tipo de Asignacion de Tribunales</h1>
<input type="radio" name="group1" id="group1" value="Butter" checked> Manual
<input type="radio" name="group1" id="group1" value="Cheese" > Automático<br>
</div>
</form>

<div style="width: 100%;float: left;" class="tbl_filtro"></div>
   
      
           
<div >
  
  
   <div style="width: 100%;float: left;" class="tbl_filtro">
     <Hi> Lista de Docentes </Hi>
    <table class="tbl_lista" id="docentes"  mane="docentes">
  <thead>
  <tr>
    <th><a href='?order=id'                class="tajax"   title='Ordenar por Id'               >Id            </a></th>
    <th><a href='?order=codigo_box'        class="tajax"   title='Ordenar por Codigo'           >Nombre       </a></th>
    <th><a href='?order=proveedor'         class="tajax"   title='Ordenar por Proveedor'        >Apellidos     </a></th>
       <th><a href='?order=proveedor'         class="tajax"   title='Ordenar por Proveedor'        >Asignar  </a></th>
  
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
      <td><input type="button" value="Asignar"></td>
     
     
    </tr>
    
  {/section}
    </tbody> 
</table>
   </div>          
    <div style="width: 100%;float: left;" class="tbl_filtro">
      
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
            <th>Asignar    </th>
           
          </tr>
        </thead>
        <tbody>
  
        </tbody>
      </table>
          
          </td>
        </tr>
      
      
      </table>

      <input type="hidden" id="proyecto_id" name="proyecto_id" value="{$proyectobuscado->id}" /><br />
      
      
      <div>
        Mensaje<br/>
        <textarea name="comentario" rows="5" style="width: 90%"></textarea>
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
   </div>
 </form>
    </div>
   
 
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
