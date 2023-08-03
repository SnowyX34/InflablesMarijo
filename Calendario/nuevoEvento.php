<?php
date_default_timezone_set("America/Mexico_City");
setlocale(LC_ALL, "es_ES");

require("config.php");

session_start(); // Asegúrate de tener esto al principio del archivo para acceder a la sesión

// Verificar si el usuario está logeado
if (!isset($_SESSION["usuario_id"])) {

}

// Obtener el ID del usuario desde la sesión
$usuario_id = $_SESSION["usuario_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $evento = ucwords($_REQUEST['evento']);
  $f_inicio = $_REQUEST['fecha_inicio'];
  $fecha_inicio = date('Y-m-d', strtotime($f_inicio));
  $brincolin = $_REQUEST['brincolin']; // Nuevo campo agregado para el brincolin seleccionado

  $color_evento = $_REQUEST['color_evento']; // Color seleccionado

  // Obtener la fecha actual
  $fecha_actual = date('Y-m-d');

  // Verificar si la fecha de inicio es anterior a la fecha actual
  if ($fecha_inicio < $fecha_actual) {
    header("Location: index2.php?error=1");
    exit();
  }

  // Definir el nombre del brincolin según el color seleccionado
  if ($color_evento === "#FF5722") {
    $brincolin = "Brincolin 1";
  } elseif ($color_evento === "#FFC107") {
    $brincolin = "Brincolin 2";
  } elseif ($color_evento === "#8BC34A") {
    $brincolin = "Brincolin 3";
  } elseif ($color_evento === "#009688") {
    $brincolin = "Brincolin 4";
  } elseif ($color_evento === "#2196F3") {
    $brincolin = "Brincolin 5";
  }

  $InsertNuevoEvento = "INSERT INTO eventoscalendar (
    evento,
    fecha_inicio,
    fecha_fin,
    color_evento,
    brincolin,
    usuario_id
    )
  VALUES (
    '" . $evento . "',
    '" . $fecha_inicio . "',
    '" . $fecha_inicio . "',
    '" . $color_evento . "',
    '" . $brincolin . "',
    '" . $usuario_id . "'
    )";
  $resultadoNuevoEvento = mysqli_query($conexion, $InsertNuevoEvento);

  header("Location: index2.php?e=1");
}

// Verificar el valor de $usuario_id (puedes comentar o eliminar esta línea después de verificarlo)
echo "Valor de \$usuario_id: " . $usuario_id;
?>
