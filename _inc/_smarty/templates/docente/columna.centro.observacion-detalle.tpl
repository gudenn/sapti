      <div id="content">
        <h1 class="title">Observacion de la Fehca: "<i>{$revision->fecha_observacion} {$revision->proyecto_id}</i>"</h1>
        <div id="respond">
          <p>
            <label for="revisor"><small>Nombre del Revisor: </small></label>
            <span>{$revision->revisor}</span>
          </p>
          <p>
            <label for="fecha_observacion"><small>Fecha de Observacion: </small></label>
            <span>{$revision->fecha_observacion}</span>            
          </p>
          <p>
            <label for="proyecto_id"><small>Nombres de Proyecto: </small></label>
            <span>{$revision->proyecto_id}</span>
          </p>
          <p>
            <label for="observaciones"><small>Observaciones Realizadas: </small></label>
          <p></p>
          {foreach item=sql from=$sql1}
            <label for="observacion"><small> - </small></label>
            <span>{$sql}</span>
             <p></p>
          {/foreach}                
          </p>

        </div>
        <p>{$ERROR}</p>
      </div>
        