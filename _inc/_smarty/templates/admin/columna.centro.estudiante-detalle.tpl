      <div id="content">
        <h1 class="title">Edici&oacute;n del Estudiante "<i>{$usuario->nombre} {$usuario->apellidos}</i>"</h1>
        <div id="respond">
          <p>
            <span>{$estudiante->codigo_sis}</span>
            <label for="codigo_sis"><small>C&oacute;digo SIS</small></label>
          </p>
          <p>
            <span>{$usuario->ci}</span>
            <label for="ci"><small>CI (*)</small></label>
          </p>
          <p>
            <span>{$usuario->nombre}</span>
            <label for="nombre"><small>Nombres</small></label>
          </p>
          <p>
            <span>{$usuario->apellidos}</span>
            <label for="apellidos"><small>Apellidos</small></label>
          </p>
          <p>
            <span>{$usuario->fecha_cumple}</span>
            <label for="fecha_cumple"><small>Fecha de Cumplea&ntilde;os</small></label>
          </p>
          <p>
            <span>{$usuario->email}</span>
            <label for="email"><small>E-Mail</small></label>
          </p>
          <p>
            <span>{$usuario->login}</span>
            <label for="login"><small>Nombre de usuario (*)</small></label>
          </p>
        </div>
        <p>{$ERROR}</p>
      </div>
        