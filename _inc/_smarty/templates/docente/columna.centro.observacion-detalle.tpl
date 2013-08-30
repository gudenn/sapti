      <div id="content">
        <h1 class="title">DETALLE DE OBSERVACION</h1>
        <div id="respond">
          <p>
            <label for="revisor"><small>Nombre del Revisor: </small></label>
            <span><i>{$arrayobser[0]['nom']}</i><i>{$arrayobser[0]['ap']}</i></span>
          </p>
          <p>
            <label for="proyecto_id"><small>Nombres de Proyecto: </small></label>
            <span>{{$arrayobser[0]['nomp']}}</span>
          </p>
          <p>
            <label for="fecha_observacion"><small>Fecha de Observacion: </small></label>
            <span>{{$arrayobser[0]['fere']}}</span>            
          </p>
            <table class="tbl_lista">
            <thead>
              <tr>
                <th><a>Observaciones Realizadas:                </a></th>
              </tr>
            </thead>
            {section name=ic loop=$arrayobser}
            <tbody>
            <tr  class="{cycle values="light,dark"}">
            <td>{$arrayobser[ic]['obser']}</td>
              {assign var="ides" value=$objs[ic]['id']}
            </tr>
            </tbody>
            {/section}
            </table>

        </div>
        <p>{$ERROR}</p>
      </div>
        