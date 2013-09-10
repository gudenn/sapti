      <div id="content"  style="width:685px;min-height: 450px;">
        <h1 class="title"><b>Estudiante:</b><br />{$usuario->nombre|upper}, {$usuario->apellidos|upper}</h1>
        {if ($proyecto)}
          <h2 class="title"><b>Proyecto Final:</b><br />{$proyecto->nombre|upper}.</h2>
        <div class="imgholder" style="float: left">
          <a href="{$URL}estudiante/proyecto-final/revision.gestion.php">
          <img src="{$URL_IMG}icons/estudiante/correccion.png"   width="64px" height="64" alt="Correciones"><br/>
          Revisiones
          </a>
        </div>
        <div class="imgholder" style="float: left">
          <a href="{$URL}estudiante/proyecto-final/archivo.gestion.php">
          <img src="{$URL_IMG}icons/estudiante/archivo.png"      width="64px" height="64" alt="Archivo"><br/>
          Archivo
          </a>
        </div>
        <div class="imgholder" style="float: left">
          <a href="{$URL}estudiante/proyecto-final/notificacion.gestion.php">
          <img src="{$URL_IMG}icons/estudiante/notificacion.png" width="64px" height="64" alt="Notificaciones"><br/>
          Notificaciones
          </a>
        </div>
        {/if}
        <div  style="clear: both;" ></div>
      </div>