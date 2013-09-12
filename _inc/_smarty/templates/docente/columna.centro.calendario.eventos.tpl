      <div id="content" style="width:685px;min-height: 450px;">
          <form action="#" method="post" id="registro" name="registro" >
<<<<<<< HEAD
        <h1 class="title">CALENDARIO DE EVENTOS PROGRAMADOS</h1>

              <h2 class="title">EVENTOS REGISTRADOS DE LA MATERIA</h2>
        <div id="calendariosalidas"></div>
         </form>
        <p>{$ERROR}</p>
=======
        <h1 class="title">INSCRIPCION DE ESTUDIANTES USANDO CVS</h1>

              <h2 class="title">SELECCIONE MATERIA PARA CARGAR EL FORMULARIO DE INSCRIPCION</h2>
        <div id="calendariosalidas"></div>
         </form>
        <p>{$ERROR}</p>
        <p>Todos los campos con (*) son obligatorios.</p>
>>>>>>> origin/master
        
        <script type="text/javascript">
        {literal}
          $(document).ready(function() {
            $("#calendariosalidas").eventCalendar({
              eventsjson: 'json/eventos.json.php',
              jsonDateFormat: "human",
              eventsScrollable: true,
              monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
              dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles',
                'Jueves', 'Viernes', 'Sabado'],
              dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
              txt_noEvents: "No hay Eventos para esta fecha",
              txt_SpecificEvents_prev: "",
              txt_SpecificEvents_after: "Eventos:",
              txt_next: "siguiente",
              txt_prev: "anterior",
              txt_NextEvents: "Próximos Eventos:",

              showDescription: true,

              txt_GoToEventUrl: "Crear Pedido de Embarque",
              showDescription: false,

              openEventInNewWindow: false,
              eventsLimit: 10,
              cacheJson: false
            });
          });
        {/literal}
      </script>
      </div>
        