<?php

// Conexión a la base de datos
$con = mysqli_connect("localhost:3307", "root", "", "calculadora");

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

//obtencion de valores del formulario
$correo=$_POST['correo'];
$password=$_POST['password'];

$consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contra='$password'";

$result = $con->query($consulta);

if ($result->num_rows === 1) {
    // Las credenciales son válidas, obtener el nombre de usuario
    $row = $result->fetch_assoc();
    $correo = $row['correo'];
    $nombre = $row['nombre'];
    /* $img = $row['img']; */

    // Establecer variables de sesión
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['nombre'] = $nombre;

    // Redirigir al usuario a la página de bienvenida
    header("Location: index.php"); 
    exit();
} else {
  header("Location: login.php?error=1");
}

// Cerrar la conexión a la base de datos
$con->close();
?>