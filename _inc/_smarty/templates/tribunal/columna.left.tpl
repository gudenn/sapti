      <div id="left_column">
          <div class="subnav">
            <h2>MENU CONSEJO</h2>
            <ul>
              <li><a href="{$URL}tribunal/">INICIO</a></li>
              <li><a href="registro.php">ASIGNACION</a></li>
               <li><a href="editar.cuenta.php">Modificar Cuenta</a></li>
              {if ($proyecto)}
              <li><a href="{$URL}estudiante/">Proyecto Final</a>
                <ul>
                  <li><a href="{$URL}estudiante/proyecto-final/correcion.gestion.php">Registro Correci&oacute;n</a></li>
                  <li><a href="{$URL}estudiante/proyecto-final/archivo.gestion.php">Archivo</a></li>
                  <li><a href="{$URL}estudiante/proyecto-final/notificacion.gestion.php">Notificaciones</a></li>
                </ul>
              </li>
              {/if}
              <li><a href="{$URL}?salirestudiante=1">Salir</a></li>
            </ul>
          </div>
        <div class="holder">
        </div>
      </div>