{include file="header.tpl"}
    <form action="" method="post" id="pedido_form" >
      <table class="tbl_lista" id="pedido">
        <thead>
          <tr>
            <th>Id            </th>
            <th>Codigo        </th>
            <th>proveedor     </th>
            <th>usuario       </th>
            <th>Estado        </th>
            <th>Fecha Ingreso </th>
            <th>Peso          </th>
            <th>Volumen       </th>
            <th>Invoice       </th>
          </tr>
        </thead>
        <tbody>
                  </tbody>
      </table>
      <br/>
      <br/>
      <div>
        Observaci&oacute;n<br />
        <textarea name="comentario" rows="4" style="width: 90%"></textarea>
      </div>
      <div style="text-align: center">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="salida_id" value="25" />
        <input type="submit" value="Grabar"        name="guardar" class="sendme" />
      </div>
    </form>
  </div>
    <br>
<script type="text/javascript">

  jQuery(function(){
    $("#pedido tbody").on("click", "tr", function(event){
      $("#almacen tbody").append('<tr>' + $(this).html() + '</tr>');
      $(this).remove();
      return false;
    });
  });


</script>
  
  <div class="box" >
    <div class="clear"></div>
    <h1 style="text-align: center;margin: 5px 0;">
    Mercaderia disponible en Almacen
    </h1>
    <div class="clear"></div>
    <form action="pedidoembarque.crear.php" method="get" name="filtro" id="filtro" >
  <table  style="width: 75%;float: left;" class="tbl_filtro">
    <tr>
              <th><label for="estado_lugar">Estado</label></th>
              <th><label for="codigo_box">Codigo</label></th>
              <th><label for="proveedor">Proveedor</label></th>
              <th><label for="fecha_ingreso">Ingreso</label></th>
              <th><label for="peso">Peso</label></th>
              <th><label for="peso_volumetrico">Peso Vol</label></th>
              <th><label for="tiene_invoice">Invoice</label></th>
            <th>&nbsp;</th>
    </tr>
    <tr>
              <td>
                      <select name="estado_lugar" id="estado_lugar">
              <option value="" selected="selected">Todos</option>
<option value="EA">En Apartado</option>
<option value="PE">Pedido de embarque</option>
<option value="OE">Orden de embarque</option>
<option value="EE">En Embarque</option>
<option value="EV">En Viaje</option>
<option value="LE">LLego Embarque</option>
<option value="LV">Llegada verificada</option>
<option value="AD">Almacen destino</option>
<option value="MU">En Manos del usuario</option>

            </select>
                  </td>
              <td>
                      <input type="text" name="codigo_box"  id="codigo_box" value="" />
                  </td>
              <td>
                      <input type="text" name="proveedor"  id="proveedor" value="" />
                  </td>
              <td>
                      <input type="text" name="fecha_ingreso"  id="fecha_ingreso" value="" />
                  </td>
              <td>
                      <input type="text" name="peso"  id="peso" value="" />
                  </td>
              <td>
                      <input type="text" name="peso_volumetrico"  id="peso_volumetrico" value="" />
                  </td>
              <td>
                      <select name="tiene_invoice" id="tiene_invoice">
              <option value="" selected="selected">Todos</option>
<option value="1">Tiene</option>
<option value="0">No Tiene</option>

            </select>
                  </td>
            <td><input type="submit" value="Buscar" name="find" class="sendme" /></td>
    </tr>
  </table>
</form>
<table  style="width: 108px;float: left;" class="tbl_filtro">
  <tr>
    <th>&nbsp;</th>
  </tr>
  <tr>
    <td>
      <form action="pedidoembarque.crear.php" method="post" id="filtro_clear">
        <input type="submit" value="Limpiar" name="clear" class="sendme" />
      </form>
    </td>
  </tr>
</table>

    <div  id="tlista">
      <div class="clear"></div>
<div  id="pagination_up" ><div class="contentpane" style="margin-bottom: 20px;">
  <div class="pagination">
          <span class="nextprev">&laquo;First</span>
          <span class="nextprev">&laquo;Previous</span>
          <span class="current">1</span>
          <span><a href="?pg=2"  class="tajax" >2</a></span>
          <span><a href="?pg=3"  class="tajax" >3</a></span>
          <span class="nextprev">...</span>
          <span><a href="?pg=5" class="tajax" >5</a></span>
          <span><a href="?pg=6" class="tajax" >6</a></span>
          <span><a href="?pg=7" class="tajax" >7</a></span>
          <span><a href="?pg=2"  class="tajax" >Next&raquo;</a></span>
          <span><a href="?pg=7"  class="tajax" >Last&raquo;</a></span>
      </div>
</div></div>
<div class="clear"></div>
<table class="tbl_lista" id="almacen">
  <thead>
  <tr>
    <th><a href='?order=id'                class="tajax"   title='Ordenar por Id'               >Id            </a></th>
    <th><a href='?order=codigo_box'        class="tajax"   title='Ordenar por Codigo'           >Codigo        </a></th>
    <th><a href='?order=proveedor'         class="tajax"   title='Ordenar por Proveedor'        >proveedor     </a></th>
    <th><a href='?order=usuario_nombre'    class="tajax"   title='Ordenar por USuario'          >usuario       </a></th>
    <th><a href='?order=estado'            class="tajax"   title='Ordenar por Estado'           >Estado        </a></th>
    <th><a href='?order=fecha_ingreso'     class="tajax"   title='Ordenar por Fecha Ingreso'    >Fecha Ingreso </a></th>
    <th><a href='?order=peso'              class="tajax"   title='Ordenar por Peso'             >Peso          </a></th>
    <th><a href='?order=peso_volumetrico'  class="tajax"   title='Ordenar por Peso Volumetrico' >Volumen       </a></th>
    <th><a href='?order=tiene_invoice'     class="tajax"   title='Ordenar por Peso Invoice'     >Invoice       </a></th>
  </tr>
  </thead>
  <tbody>
      <tr class="selectable">
      <td>78<input type="hidden" name="mercaderia_id[]" value="78"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>11 May 2013</td>
      <td>23</td>
      <td>3</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>77<input type="hidden" name="mercaderia_id[]" value="77"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>33</td>
      <td>0</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>67<input type="hidden" name="mercaderia_id[]" value="67"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>32</td>
      <td>10</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>66<input type="hidden" name="mercaderia_id[]" value="66"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>15</td>
      <td>107</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>65<input type="hidden" name="mercaderia_id[]" value="65"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>32</td>
      <td>10</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>64<input type="hidden" name="mercaderia_id[]" value="64"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>15</td>
      <td>107</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>63<input type="hidden" name="mercaderia_id[]" value="63"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>32</td>
      <td>10</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>62<input type="hidden" name="mercaderia_id[]" value="62"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>15</td>
      <td>107</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>61<input type="hidden" name="mercaderia_id[]" value="61"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>32</td>
      <td>10</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>60<input type="hidden" name="mercaderia_id[]" value="60"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>15</td>
      <td>107</td>
      <td>1</td>
    </tr>
      <tr class="selectable">
      <td>59<input type="hidden" name="mercaderia_id[]" value="59"></td>
      <td>CBA00540-BO</td>
      <td>Amazon</td>
      <td>Guyen</td>
      <td>AC</td>
      <td>15 May 2013</td>
      <td>32</td>
      <td>10</td>
      <td>1</td>
    </tr>
    </tbody> 
</table>
<script type="text/javascript">
    {literal}
  jQuery(function(){
    $("#almacen tbody").on("click", "tr", function(event){
    alert( " hola");
      $("#pedido").append('<tr>' + $(this).html() + '</tr>');
      $(this).remove();
      return false;
    });
  });
    {/literal}

</script>
{include file="footer.tpl"}
