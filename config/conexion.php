<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";  // Usuario de la base de datos
$password = "";  // Contraseña de la base de datos
$dbname = "vdistrito";  // Nombre de la base de datos

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
