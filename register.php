<?php
require ('conect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los datos del formulario
  $correoElectronico = $_POST["email"];
  $contrasena = $_POST["password"];
  $nombreCompleto = $_POST["fullName"];
  $direccion = $_POST["address"];
  $numeroTelefono = $_POST["phoneNumber"];

  // Insertar los datos en la base de datos
  $sql = "INSERT INTO usuarios (correo_electronico, contrasena, nombre_completo, direccion, numero_telefono)
          VALUES ('$correoElectronico', '$contrasena', '$nombreCompleto', '$direccion', '$numeroTelefono')";

  if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso";
  } else {
    echo "Error al registrar el usuario: " . $conexion->$error;
  }

  header("Location: index.php");
  exit();
}
?>
