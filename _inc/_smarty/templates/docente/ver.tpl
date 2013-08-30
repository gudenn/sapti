<div id="content">
 <div class="clear"></div>
 <form action="" method="post" >
  <p>SEÑOR</p>
   <p>{$docente->nombre}</p>
   <p>{$detalle}</p>
   <input type="hidden"  name="ids" value="{$idtribunal}" /><br />
   <select name=visto>
    <option  value="ACEPTAR" selected="selected" >ACEPTAR</option>
    <option value="RECHAZAR" >RECHAZAR</option>
   </select>
  
       <div>
        Observaci&oacute;n<br/>
        <textarea name="descripcion" rows="4" style="width: 90%"></textarea>
      </div>
   
        <div style="text-align: center">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="salida_id" value="25" />
        <input type="submit" value="grabar" name="tarea" class="sendme"  />
        </div>
  </div>    
 </div>