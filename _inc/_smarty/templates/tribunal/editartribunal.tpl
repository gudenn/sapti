{include file="header.tpl"}

<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>EDITANDO</strong></td></center>
    
    <div class="clear"></div>
    
    
          <div style="width: 50%;float: left;" class="tbl_filtro">


  </div>
    <div style="width: 50%;float: left;" class="tbl_filtro">
        
   <form action="" method="post">
      <h1></h1>
       {section name=ic loop=$arraytribunaldatos}
       <label for="nombre">nombre:  {$arraytribunaldatos[ic]['nombre']}</label><br />
        <label for="nombre">Apellidos:  {$arraytribunaldatos[ic]['apellidos']}</label><br />
         <label for="nombre">Codigo Sis:  {$arraytribunaldatos[ic]['codigo_sis']}</label><br />
          <label for="nombre">Nombre Proyecto:  {$arraytribunaldatos[ic]['nombreproyecto']}</label><br />
       
       {/section}
      
 </form>
  
  
</div>   
       
       
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
           
           
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
          
          </td>
        </tr>
      
      
      </table>

      <input type="hidden" id="codigo" name="codigo" value="{$proyectotribunals->id}" /><br />
      
      
      <div>
        Mensaje<br/>
        <textarea name="mensaje" rows="5" style="width: 90%"></textarea>
      </div>
      <div>
        Observaci&oacute;n<br/>
        <textarea name="comentario" rows="4" style="width: 90%"></textarea>
      </div>
      
      
      <div style="text-align: center">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="salida_id" value="25" />
        <input type="submit" value="Guardar" name="tarea" class="sendme"  />
        <a href="listatribuanleditar.php" ><span class="t">Cancelar</span></a>
         
 
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
