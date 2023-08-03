<?php
session_start();

require('conect.php');

// Verificar si los datos del formulario fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Consulta para verificar las credenciales en la base de datos
  $sql = "SELECT id_User, nombre_completo FROM usuarios WHERE correo_electronico = '$email' AND contrasena = '$password'";
  $result = $conexion->query($sql);

  if ($result->num_rows == 1) {
    // Datos válidos, iniciar sesión y redirigir al usuario a la página principal
    $row = $result->fetch_assoc();
    $_SESSION["nombreCompleto"] = $row["nombre_completo"]; // Guardar nombre completo en la sesión
    $_SESSION["usuario_id"] = $row["id_User"]; // Guardar id del usuario en la sesión
    header("Location: index.php"); // Redireccionar a la página principal
    exit();
  } else {
    // Datos inválidos, mostrar un mensaje de error
    echo "Correo electrónico o contraseña incorrectos";
  }
}
?>
