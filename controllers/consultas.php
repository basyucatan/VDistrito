<?php
include('config/conexion.php');

$sql = "SELECT id, grupo FROM grupos";
$result = $conn->query($sql);

$grupos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $grupos[] = $row;
    }
}
$sqlGrafica = "SELECT grupo, COUNT(*) AS numMiembros FROM registro 
    GROUP BY grupo ORDER BY numMiembros DESC";
$sqlGrafica = "SELECT 
COALESCE(g.grupo, 'OTROS DISTRITOS') AS grupo,
COUNT(r.id) AS numMiembros
FROM 
registro r 
LEFT JOIN 
grupos g ON r.grupo = g.grupo 
GROUP BY 
g.grupo
ORDER BY 
numMiembros DESC
";



$resultGrafica = $conn->query($sqlGrafica);
$dataGrafica = [];
if ($resultGrafica->num_rows > 0) {
    while($row = $resultGrafica->fetch_assoc()) {
        $dataGrafica[] = $row;
    }
}
$dataGraficaJSON = json_encode($dataGrafica);

$conn->close();
?>
