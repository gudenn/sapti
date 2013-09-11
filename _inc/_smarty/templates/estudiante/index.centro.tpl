      <div id="content"  style="width:685px;min-height: 450px;">
        <h1 class="title"><b>Estudiante:</b><br />{$usuario->nombre|upper}, {$usuario->apellidos|upper}</h1>
        {if ($proyecto)}
          <h2 class="title"><b>Proyecto Final:</b><br />{$proyecto->nombre|upper}.</h2>
        <div class="imgholder" style="float: left">
          <a href="{$URL}estudiante/proyecto-final/">
          <img src="{$URL_IMG}icons/estudiante/correccion.png"   width="64px" height="64" alt="Proyecto"><br/>
          Proyecto Final
          </a>
        </div>
        {/if}
        <div  style="clear: both;" ></div>
      </div>