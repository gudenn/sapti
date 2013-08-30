    <div id="content" style="width:685px;min-height: 450px;">
        <div id="conteni">
            <h1 class="title">ESTUDIANTES INSCRITOS</h1>
            <table class="tbl_lista_inscrito">
              <thead>
                <tr>
                  <th><a>CODIGO SIS      </a></th>
                  <th><a>NOMBRE          </a></th>
                  <th><a>APELLIDOS       </a></th>
                </tr>
              </thead>
              {section name=ic loop=$inscritos}
              <tbody>
                <tr  class="{cycle values="light,dark"}">
                  <td>{$inscritos[ic]['1']}</td>
                  <td>{$inscritos[ic]['2']}</td>
                  <td>{$inscritos[ic]['3']}</td>
                </tr>
              </tbody>
              {/section}
            </table>
            <h2 class="title">ESTUDIANTES YA REGISTRADOS</h2>
            <table class="tbl_lista_yainscrito">
              <thead>
                <tr>
                  <th><a>CODIGO SIS      </a></th>
                  <th><a>NOMBRE          </a></th>
                  <th><a>APELLIDOS       </a></th>
                </tr>
              </thead>
              {section name=ic loop=$yainscritos}
              <tbody>
                <tr  class="{cycle values="light,dark"}">
                  <td>{$yainscritos[ic]['1']}</td>
                  <td>{$yainscritos[ic]['2']}</td>
                  <td>{$yainscritos[ic]['3']}</td>
                </tr>
              </tbody>
              {/section}
            </table>
            <h3 class="title">ESTUDIANTES NO ENCONTRADOS</h3>
            <table class="tbl_lista_noestu">
              <thead>
                <tr>
                  <th><a>CODIGO SIS      </a></th>
                  <th><a>NOMBRE          </a></th>
                  <th><a>APELLIDOS       </a></th>
                </tr>
              </thead>
              {section name=ic loop=$noestudiante}
              <tbody>
                <tr  class="{cycle values="light,dark"}">
                  <td>{$noestudiante[ic]['1']}</td>
                  <td>{$noestudiante[ic]['2']}</td>
                  <td>{$noestudiante[ic]['3']}</td>
                </tr>
              </tbody>
              {/section}
            </table>
        </div>
        <p>{$ERROR}</p>
      </div>
