{include file="header.tpl"}
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
        <center> <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO HORARIO</strong></td></center>
      <form action="" method="post">
        <label for="nombre">Disponibilidad de Tiempo</label><br>
        
     {html_radios name="id" values=$horario_id output=$horario_nombre
       selected=$customer_id separator="<br />"}
       
          
        <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}