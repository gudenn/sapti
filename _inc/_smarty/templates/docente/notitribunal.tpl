 <div id="content">

      
        <div class="clear"></div>
      <div class="clear"></div>    
 <div style="width: 50%;float: left;" class="tbl_filtro">
  
  </div>
    <div style="width: 50%;float: left;" class="tbl_filtro">
  
  <div style="width: 50%;float: left;" class="tbl_filtro">  </div>
   <h1> Lista de los Tribunales </h1>
</div>  

        <table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >ID      </a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >ETUDIANTE   </a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >PROYECTO </a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >VER</a></th>
     </tr>
  </thead>
  
  
  <tbody>
  {section name=ic loop=$notitribunal_id}
    <tr  class="selectable">
     <td>{$notitribunal_id[ic]['id']} </td>
      <td>{$notitribunal_id[ic]['nombreusuario']}</td>
       <td>{$notitribunal_id[ic]['nombre']} </td>
      <td> <a href="ver.php?tribunal_id={$notitribunal_id[ic]['idtribunal']}" target="_blank" >{icono('detalle.png','PDF')}</a>
    
        </td>
      
        
    </tr>
  {/section}
    </tbody> 
</table>               
 </div>