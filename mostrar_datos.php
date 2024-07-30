<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Mostrar contenido de la tabla VUELO
echo "<h2>Tabla VUELO</h2>";
$sql = "SELECT * FROM VUELO";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id_vuelo: " . $row["id_vuelo"]. " - Origen: " . $row["origen"]. " - Destino: " . $row["destino"]. " - Fecha: " . $row["fecha"]. " - Plazas Disponibles: " . $row["plazas_disponibles"]. " - Precio: " . $row["precio"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Mostrar contenido de la tabla HOTEL
echo "<h2>Tabla HOTEL</h2>";
$sql = "SELECT * FROM HOTEL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id_hotel: " . $row["id_hotel"]. " - Nombre: " . $row["nombre"]. " - Ubicación: " . $row["ubicacion"]. " - Habitaciones Disponibles: " . $row["habitaciones_disponibles"]. " - Tarifa por Noche: " . $row["tarifa_noche"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
