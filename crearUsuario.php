<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost:3307", "root", "", "calculadora");

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

//obtencion de valores del formulario
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=$_POST['password'];

// Insertar el contenido en la tabla
$query = "INSERT INTO usuarios (nombre,correo,contra) VALUES('$nombre','$correo','$password')";
if (mysqli_query($conexion, $query)) {
  // Establecer variables de sesión
  session_start();
  $_SESSION['correo'] = $correo;
  $_SESSION['nombre'] = $nombre;
  header("location: index.php");/* echo "Contenido guardado correctamente."; */
} else {
  echo "Error al guardar el contenido: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
