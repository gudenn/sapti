{include file="header.tpl"}
{include file="slider.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
        <!-- ###### -->
        <div id="left_column">
          <h2>Prospective Students</h2>
           <h2>Current Students</h2>
             <h2>International Students</h2>
             <h2>Alumni</h2>
                 </div>
        <!-- ###### -->
        <div id="latestnews">
          <h2>ANUCIOS</h2>
           <table class="tbl_lista">
  <thead>
    <tr>
      <th><a >NOMBRE      </a></th>
      <th><a>APELLIDOS       </a></th>
      <th><a>PROYECTO    </a></th>
      <th><a >FECHA      </a></th>
      <th><a>LUGAR       </a></th>
      <th><a>TIPO   </a></th>
   
       </tr>
  </thead>
  
  
  <tbody>
     {section name=ic loop=$listadefensas}
    <tr  class="selectable">
     <td>{$listadefensas[ic]['nombre']} </td>
      <td>{$listadefensas[ic]['apellidos']} </td>
       <td>{$listadefensas[ic]['nombreproyecto']}</td>
       <td>{$listadefensas[ic]['fecha_defensa']} </td>
      <td>{$listadefensas[ic]['nombrelugar']} </td>
       <td>{$listadefensas[ic]['tiponombre']}</td>
     
      
        
    </tr>
  {/section}
  
    </tbody> 
</table> 
        </div>
        <!-- ###### -->
    
          
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
</div>
{include file="footer.tpl"}
