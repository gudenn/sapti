{include file="header.tpl"}

<!-- ####################################################################################################### -->
<div class="wrapper row3">
 <div class="rnd">
  <div id="container" class="clear">
     
<!-- ####################################################################################################### -->   
 <form action="" method="post">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <center> <h2>Observacion</h2></center>
<p>Estudiante:
  <input name="estudiante" value="{$user->nombre}" type="text" size="35" />
</p>
<p>Titulo Perfil:
  <input name="titulo"  type="text" size="150" />
</p>
<p>
    <object data="test1.pdf" type="application/pdf" width="880" height="300">
    <p> Al parecer usted no tiene un plugin PDF para este navegador.
        No hay problema ... puedes <a href="\\..\\..\\Estudiantes\\test1.pdf"> Descargar el archivo PDF. </ a> </ p>
    </object>
</p>

<div id="div_1">
            <label  accesskey="">Observaciones:
            </label>            
      <p align="center">
        <textarea name="observacion" cols="150" rows="13,5"></textarea>
    </p>
            </div>
        <p>Docente Revisor:
            <input name="docenterevisor" value="{$user->nombre} {$user->apellidos}"  type="text" size="35" />
        </p>
	    <p>
              <label for="fecha">Fecha de Revison:</label>
              <input type="date" size="25" id="fecha" name="fecha" value="{$revision->fecha}" /> 
              
            </p>
            
            <p>
            <td height="26" colspan="10" valign="middle"><p align="center"><strong>&nbsp;</strong> 
           <input type="hidden" id="tarea" name="tarea" value="grabar" />
        <input type="submit" value="registro" />
          <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear">

            </p>
                
    </p>
			
    </div>
</form>
<!-- ####################################################################################################### -->
  </div> 
 </div> 
</div>
{include file="footer.tpl"}