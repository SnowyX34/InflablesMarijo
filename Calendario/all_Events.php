<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lista de Todos los Eventos</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/all_events.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="row mt-4">
      <div class="col">
        <a href="../index.php" class="btn btn-primary mb-3">Regresar a Inflables Marijo</a>
        <a href="index2.php" class="btn btn-secondary mb-3">Regresar a Calendario</a>
        <h3 class="text-center">Lista de Todos los Eventos</h3>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nombre Completo</th>
              <th>Correo Electrónico</th>
              <th>Dirección</th>
              <th>Número de Teléfono</th>
              <th>Brincolin</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Incluir la conexión a la base de datos
            include('config.php');

            // Realizar una consulta para obtener todos los eventos con detalles de usuario
            $sqlTodosEventos = "SELECT e.*, u.nombre_completo, u.correo_electronico, u.direccion, u.numero_telefono 
                                FROM eventoscalendar AS e
                                INNER JOIN usuarios AS u ON e.usuario_id = u.id_User";
            
            $resultTodosEventos = mysqli_query($conexion, $sqlTodosEventos);

            while ($dataEvento = mysqli_fetch_array($resultTodosEventos)) { ?>
              <tr>
                <td><?php echo $dataEvento['nombre_completo']; ?></td>
                <td><?php echo $dataEvento['correo_electronico']; ?></td>
                <td><?php echo $dataEvento['direccion']; ?></td>
                <td><?php echo $dataEvento['numero_telefono']; ?></td>
                <td><?php echo $dataEvento['brincolin']; ?></td>
                <td><?php echo $dataEvento['fecha_inicio']; ?></td>
                <td><?php echo $dataEvento['fecha_fin']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
