<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agenda citas</title>
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php
  include('config.php');

  session_start(); // Asegúrate de tener esto al principio del archivo para acceder a la sesión
  
  if (!isset($_SESSION["usuario_id"])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de login
    header("Location: ../login.php"); // Ajusta la ruta para que apunte a "Integradora/login.php"
    exit();
  }

  $usuario_id = $_SESSION["usuario_id"];

  // Si el usuario es el admin (id 1), mostrar todos los eventos
  if ($usuario_id == 1) {
    $SqlEventos = "SELECT * FROM eventoscalendar";
  } else {
    $SqlEventos = "SELECT * FROM eventoscalendar WHERE usuario_id = $usuario_id";
  }

  $resulEventos = mysqli_query($conexion, $SqlEventos);
  ?>

  <div class="mt-5"></div>

  <div class="container">
    <div class="row">
      <div class="col msjs">
        <?php
        include('msjs.php');
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mb-3">
        <h3 class="text-center" id="title">Selecciona el día que solicitas el brincolin</h3>
      </div>
    </div>
  </div>



  <div id="calendar"></div>

  <div class="container">
    <div class="row mt-4">
      <div class="col text-center">
        <a href="../index.php" class="btn btn-primary">Regresar a la página principal</a>
        <?php if ($usuario_id == 1) { ?>
        <a href="all_events.php" class="btn btn-primary">Mostrar Todos los Eventos</a>
      <?php } ?>
      </div>
    </div>
  </div>
  <?php
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
  ?>



  <script src="js/jquery-3.0.0.min.js"> </script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script src='locales/es.js'></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#calendar").fullCalendar({
        header: {
          left: "prev,next today",
          center: "title",
          right: "month"
        },

        locale: 'es',

        defaultView: "month",
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: false,

        //Nuevo Evento
        select: function (start, end) {
          $("#exampleModal").modal();
          $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

          var valorFechaFin = end.format("DD-MM-YYYY");
          var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
          $('input[name=fecha_fin').val(F_final);

        },

        events: [
          <?php
          while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?>
                {
            _id: '<?php echo $dataEvento['id']; ?>',
            title: '<?php echo $dataEvento['evento']; ?>',
            start: '<?php echo $dataEvento['fecha_inicio']; ?>',
            end: '<?php echo $dataEvento['fecha_fin']; ?>',
            color: '<?php echo $dataEvento['color_evento']; ?>'
          },
          <?php } ?>
        ],


        //Eliminar Evento
        eventRender: function (event, element) {
          element
            .find(".fc-content")
            .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

          //Eliminar evento
          element.find(".closeon").on("click", function () {

            var pregunta = confirm("Deseas Borrar este Evento?");
            if (pregunta) {

              $("#calendar").fullCalendar("removeEvents", event._id);

              $.ajax({
                type: "POST",
                url: 'deleteEvento.php',
                data: { id: event._id },
                success: function (datos) {
                  $(".alert-danger").show();

                  setTimeout(function () {
                    $(".alert-danger").slideUp(500);
                  }, 3000);

                }
              });
            }
          });
        },


        //Moviendo Evento Drag - Drop
        eventDrop: function (event, delta) {
          var idEvento = event._id;
          var start = (event.start.format('DD-MM-YYYY'));
          var end = (event.end.format("DD-MM-YYYY"));

          $.ajax({
            url: 'drag_drop_evento.php',
            data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
            type: "POST",
            success: function (response) {
              // $("#respuesta").html(response);
            }
          });
        },

        //Modificar Evento del Calendario 
        eventClick: function (event) {
          var idEvento = event._id;
          $('input[name=idEvento').val(idEvento);
          $('input[name=evento').val(event.title);
          $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
          $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

          $("#modalUpdateEvento").modal();
        },


      });


      //Oculta mensajes de Notificacion
      setTimeout(function () {
        $(".alert").slideUp(300);
      }, 3000);


    });

  </script>

</body>

</html>
