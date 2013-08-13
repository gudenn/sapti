{include file="header.tpl"}


<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      
        <div class="clear"></div>
    <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>LISTA DE PERFILES QUE REALIZARON CAMBIOS</strong></td></center>
    
    <div class="clear"></div>
    
    
          
  
       
       
<div style="width: 100%;float: left;" class="tbl_filtro"></div>
<hr>


<div style="width: 100%;float: left;" class="tbl_filtro"></div>
   
      
           
<div >
  
  
   <div style="width: 100%;float: left;" class="tbl_filtro">
     <Hi> Lista de Perfil </Hi>
    <table class="tbl_lista" id="docentes"  mane="docentes">
  <thead>
  <tr>
    <th><a href='?order=id'                class="tajax"   title='Ordenar por Id'               >Id            </a></th>
    <th><a href='?order=codigo_box'        class="tajax"   title='Ordenar por Codigo'           >Nombre       </a></th>
    <th><a href='?order=proveedor'         class="tajax"   title='Ordenar por Proveedor'        >Apellidos     </a></th>
    <th><a href='?order=especialidad'         class="tajax"   title='Ordenar por Especialidad'        >Titulo</a></th>
    <th><a href='?order=id'                class="tajax"   title='Ordenar por Id'               >Gestion</a></th>
    <th>Opciones</th>    
  </tr>
  </thead>
  <tbody>
  {section name=ic loop=$listadocentes}
   
    <tr  class="selectable">
      
      <td>{$listadocentes[ic]['id']}
        <input type="hidden" name="ids[]" value="{$listadocentes[ic]['id']}">
      </td>
      <td>{$listadocentes[ic]['nombre']}</td>
      <td>{$listadocentes[ic]['apellidos']}</td>
      <td>{$listadocentes[ic]['titulo']}</td>
        <td>{$listadocentes[ic]['gestionaprobacion']}</td>
     
     <td>
        <a href="observacion.detalle.php?revisiones_id={$objs[ic]['id_re']}" target="_blank" >{icono('detalle.png','Detalle')}</a>
   
        <a href="observacion.lista.php?eliminar=1&revisiones_id={$objs[ic]['id_re']}" onclick="return confirm('seguro que quiere eliminar?');"  >{icono('borrar.png','Eliminar')}</a>
      </td>
     
    </tr>
    
  {/section}
    </tbody> 
    
</table>
   </div>          
    
 
    </div>

   <tr bgcolor="#F1F5F8">
   <center> <td bgcolor="#F7F7F7" style="text-align:center"><em><strong><a href="cambiosexcel.php" class="botonlink">excel</a></strong></em>
   <em><strong><a href="cambiospdf.php" class="botonlink">PDF</a></strong></em></td></center>
    </tr>

  
    
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

{include file="footer.tpl"}
