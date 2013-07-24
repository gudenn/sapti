{include file="header.tpl"}

<!-- ####################################################################################################### -->
<div class="wrapper row3">
 <div class="rnd">
  <div id="container" class="clear">
     
<!-- ####################################################################################################### -->   
 <form action="" method="post">
     <center> <h2>REGISTRO DE REVISION DE PERFIL</h2></center>
<p>Estudiante:
  <input name="usuario_id" value="{$user->nombre} {$user->apellidos}" type="text" size="35" />
</p>
<p>Titulo Perfil :
  <input name="registroperfil_id" value="{$perfilregistro->titulo}" type="text"  size="160" />
</p>


<p>
  <object data="proyecto.doc" type="application/pdf" width="900" height="300">
    <p> Al parecer usted no tiene un plugin PDF para este navegador.
      No hay problema ... puedes <a href="proyecto.pdf"> clic aquí para descargar el archivo PDF. </ a> </ p>
  </object>
</p>

<div id="div_1">
            <label  accesskey="">Observacion:
            </label>   
            <input  type="text"  name="materiales[]" id="materiales[]" style="width:900px;" /> 
            <input class="bt_plus" id="1" type="button" value="Añadir Observacion" />
            <div class="error_form"></div>
            </div>
        <p>Docente Revisor:
            <input name="usuario_id" value="{$user->nombre} {$user->apellidos}  "  type="text" size="35" />
        </p>
	    <p>
              <label for="fecha_cumple"><small>Fecha de Revison:</small></label>
              <input type="date" size="25" id="fecha" name="fecharegistro" value="{$perfil->fecharegistro}" /> 
              
            </p>
            
            <p>
              <input type="hidden" name="id" value="{$revision->id}">
              <input type="hidden" name="id" value="{$observacion->id}">
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

            </p>
            <p>
	     <center>
                 <input name="submit" type="submit" id="submit" value="Grabar">
              &nbsp;
              <input name="reset" type="reset" id="reset" tabindex="5" value="Resetear"></center>
	   </p>
			
</div>
</form>
<!-- ####################################################################################################### -->
  </div> 
 </div> 
</div>
{include file="footer.tpl"}