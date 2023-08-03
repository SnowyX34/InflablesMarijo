<?php
if (isset($_REQUEST['e'])) {
?>
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Correcto</strong> El evento fue registrado correctamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php
}

if (isset($_REQUEST['ea'])) {
?>
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Actualizado!</strong> El evento fue actualizado correctamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php
}

if (isset($_REQUEST['error'])) {
?>
  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Error!</strong> La fecha de inicio no puede ser anterior a la fecha actual.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php
}
?>

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <strong>Borrado!</strong> El evento fue borrado correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

