   <div id="content">
        
        <div id="respond">
          <form action="#" method="post" id="registro" name="registro" >
              <table width="433" border="1"  align="center" cellpadding="5" cellspacing="5" bordercolor="#999999" class="Estilo1">
                  <tr bgcolor="#F1F5F8">
                    <td bgcolor="#F7F7F7" style="text-align:center"><strong>FORMULARIO DE REGISTRO DE DOCENTE PERFIL</strong></td>
                  </tr>
    <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7">
<table width="100%">
          <tr>
               <td width="43%" class="label" style="text-align:right"><strong><label for="nombre"><small>Nombres (*)</small></label></strong></td>
               <td ><input type="text" name="nombre" id="nombre" value="{$usuario->nombre}" size="100"  data-validation-engine="validate[required]" ></td>
             
              
            
            </tr>
            <tr>
                <td width="43%" class="label" style="text-align:right"><strong><label for="apellidos"><small>Apellidos</small></label></strong></td>
            <td><input type="text" name="apellidos" id="apellidos" value="{$usuario->apellidos}" size="200"></td>
              
            
            
            </tr>
            
            <tr>
             <td width="43%" class="label" style="text-align:right"><strong><label for="ci"><small>CI (*)</small></label></strong></td>
              <td><input type="text" name="ci" id="ci" value="{$usuario->ci}" size="100"  data-validation-engine="validate[required]" ></td>
           
            
            </tr>
            <tr>
            <td width="43%" class="label" style="text-align:right"><strong><label for="fecha_cumple"><small>Fecha de Cumplea&ntilde;os</small></strong></label></td>
            <td><input type="text" name="fecha_cumple" id="fecha_cumple" value="{$usuario->fecha_cumple}" size="22"></td>
             
           
            </tr>
            <tr>
            <td width="43%" class="label" style="text-align:right"><strong><label for="email"><small>E-Mail</small></label></strong></td>
            <td><input type="text" name="email" id="email" value="{$usuario->email}" size="22" data-validation-engine="validate[],custom[email]"  ></td>
              
            
            </tr>
            <tr>
           <td width="43%" class="label" style="text-align:right"><strong><label for="login"><small>Nombre de usuario (*)</small></label></strong></td>
              <td><input type="text" name="login" id="login" value="{$usuario->login}"  data-validation-engine="validate[required]"  size="22"></td>
              
            
            </tr>
            <tr>
            <td width="43%" class="label" style="text-align:right"><strong><label for="password"><small>Clave de Ingreso (*)</small></label></strong></td>
            <td><input type="password" name="clave" id="clave" value="" data-validation-engine="validate[required]"  size="22"></td>
              
            
            </tr>
            
            <tr>
                 <td width="43%" class="label" style="text-align:right"><strong><label for="password"><small>Verifique Clave (*)</small></label></strong></td>
            <td><input type="password" name="clave2" id="clave2" value="" data-validation-engine="validate[equals[clave]]"   size="22"></td>
             
            </tr>
            
                <tr >
                <td  colspan="2"><strong><center>
              
              <input type="hidden" name="usuario_id"    value="{$usuario->id}">
              <input type="hidden" name="estudiante_id" value="{$Docente->id}">
              <input type="hidden" name="tarea" value="registrar">
              <input type="hidden" name="token" value="{$token}">

              <input id="signupsubmit" name="signup" type="submit" value="REGISTRAR DOCENTE"  class="boton">
              &nbsp;
              <input name="reset" type="reset" value="LIMPIAR"  class="boton"/></center></strong></td>
           </tr>
           
          </form>
        </div>
        <p>{$ERROR}</p>
      
        <script type="text/javascript">
        {literal} 
          $(function(){
            $('#fecha_cumple').datepicker({
              dateFormat:'dd/mm/yy',
              changeMonth: true,
              changeYear: true,
              yearRange: "1920:2013"
            });
          });
          jQuery(document).ready(function(){
            jQuery("#registro").validationEngine();
            var wo = 'bottomRight';
            jQuery('input').attr('data-prompt-position',wo);
            jQuery('input').data('promptPosition',wo);
            jQuery('textarea').attr('data-prompt-position',wo);
            jQuery('textarea').data('promptPosition',wo);
            jQuery('select').attr('data-prompt-position',wo);
            jQuery('select').data('promptPosition',wo);
          });
        {/literal} 
        </script>
        </table>
      </td>
    </tr>
    <tr bgcolor="#F1F5F8">
         
            <td bgcolor="#F7F7F7"><strong><center>Todos los campos con (*) son obligatorios.</center></strong></td> 

       </tr>
       <tr bgcolor="#F1F5F8">
      <td bgcolor="#F7F7F7"><center>
          <em><strong><a href="docente.gestion.php" class="botonlink">VER LISTA</a></strong></em>
      </center></td>
    </tr>
      </table>
      </div>
        