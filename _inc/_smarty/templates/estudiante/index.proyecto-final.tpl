      <div id="content"  style="width:685px;min-height: 450px;">
        {if ($proyecto)}
        <h1 class="title"><b>Proyecto Final:</b><br />{$proyecto->nombre|upper}.</h1>
        <div class="dashboard">
          <h2>Avances</h2>
          <a href="{$URL}estudiante/proyecto-final/avance.registro.php">
            <img src="{$URL_IMG}icons/estudiante/correccion.png"   width="64px" height="64" alt="Correciones">
            <h3>Registro de Avances</h3>
            <p>Registrar Archivos y la descripcion del avance presentado</p>
          </a>
          <a href="{$URL}estudiante/proyecto-final/avance.gestion.php">
            <img src="{$URL_IMG}icons/estudiante/archivo.png"   width="64px" height="64" alt="Correciones">
            <h3>Archivo de Avances</h3>
            <p>Compendio de todos los avances presentados</p>
          </a>
        </div>
        <div class="dashboard">
          <h2>Correciones</h2>
          <a href="{$URL}estudiante/proyecto-final/avance.registro.php">
            <img src="{$URL_IMG}icons/estudiante/correccion.png"   width="64px" height="64" alt="Correciones">
            <h3>Correcciones Pendientes</h3>
            <p>Todas las correcciones presentadas por Tutor(es), Docente(s) y Tribunales para el Proyecto Final</p>
          </a>
          <a href="{$URL}estudiante/proyecto-final/revision.gestion.php">
            <img src="{$URL_IMG}icons/estudiante/archivo.png"   width="64px" height="64" alt="Correciones">
            <h3>Archivo de Correciones</h3>
            <p>Compendio de todas las correciones presentadas</p>
          </a>
        </div>
        <div class="dashboard">
          <h2>Notificaciones y Mensajes</h2>
          <a href="{$URL}estudiante/proyecto-final/avance.registro.php">
            <img src="{$URL_IMG}icons/estudiante/notificacion.png"   width="64px" height="64" alt="Correciones">
            <h3>Notificaiones</h3>
            <p>Notificaciones para el Proyecto Final</p>
          </a>
          <a href="{$URL}estudiante/proyecto-final/avance.registro.php">
            <img src="{$URL_IMG}icons/estudiante/notificacion.png"   width="64px" height="64" alt="Correciones">
            <h3>Mensajes</h3>
            <p>Mensajes para el Proyecto Final</p>
          </a>
        </div>
        {/if}
        <div  style="clear: both;" ></div>
      </div>