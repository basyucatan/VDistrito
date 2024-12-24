<?php
include '../config/conexion.php'; // Incluye la conexión a la base de datos
// Obtener datos del formulario
$nombre = strtoupper($_POST['name']);
$grupo = strtoupper($_POST['grupo']);
$distrito = $_POST['distrito'];
$area = strtoupper($_POST['area']);
$servicio = strtoupper($_POST['servicio']);
$grupo2Input = strtoupper($_POST['grupo2']); // Obtener el valor del campo grupo2

// Verificar si el grupo es "No está en la lista..." y asignar el valor de grupo2Input
if ($grupo === "NUEVO" && !empty($grupo2Input)) {
    $grupo = $grupo2Input; // Asigna el valor de grupo2Input a $grupo
}

// Asignar valores predeterminados si 'distrito' o 'area' están vacíos
if (empty($distrito)) {
    $distrito = "5";
}
if (empty($area)) {
    $area = "Yucatan 1";
}

// Preparar la consulta SQL
$sql = "INSERT INTO registro (nombre, grupo, distrito, area, servicio) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $grupo, $distrito, $area, $servicio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "<script>
        alert('¡Gracias, $nombre! has sido registrado EXITOSAMENTE.');
        window.location.href='../index.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . $stmt->error . "');
        window.location.href='../index.php';
    </script>";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
