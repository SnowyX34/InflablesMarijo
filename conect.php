<?php
$server = "localhost";
$usuario = "root";
$contrasena = "12TYrs()"; // Reemplaza "tu_contrasena_mysql" con la contraseña de tu servidor MySQL
$basedatos = "inflablesmarijo";
$conexion = mysqli_connect($server, $usuario, $contrasena) or die("Problemas al conectar"); // Asegúrate de que la conexión se realice correctamente
$db = mysqli_select_db($conexion, $basedatos) or die("Upps! Error en conectar a la Base de Datos");
?>