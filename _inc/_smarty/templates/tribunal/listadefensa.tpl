
    <div id="content">
   <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>ASIGNAR FECHA DE DEFENSA</strong></td></center>
      <form action="" method="post">
        
        <table class="tbl_lista">
  <thead>
    <tr>
      <th><a href='?order=id'                    accesskey="" class="tajax"  title='Ordenar por Id'           >ID      </a></th>
      <th><a href='?order=proyecto_id'                        class="tajax"  title='Ordenar por Proyecto'     >ETUDIANTE   </a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >PROYECTO </a></th>
      <th><a href='?order=fecha_observacion'                  class="tajax"  title='Ordenar por Fecha'        >ASIGNAR</a></th>
     </tr>
  </thead>
  
  
  <tbody>
   {section name=ic loop=$listasignacion}
    <tr  class="selectable">
     <td>{$listasignacion[ic]['id']}</td>
      <td>{$listasignacion[ic]['nombre']} {$listasignacion[ic]['apellidos']}</td>
       <td>{$listasignacion[ic]['nombreproyecto']} </td>
      <td> <a href="asignacion.php?tribunal_id={$listasignacion[ic]['id']}" target="_self" >{icono('detalle.png','PDF')}</a>
    
        </td>
      
        
    </tr>
  {/section}
    </tbody> 
</table> 
      </form>
    </div>
  