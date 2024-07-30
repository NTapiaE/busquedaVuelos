<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// validación conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Mostrar reservas
echo "<h2>Tabla RESERVA</h2>";
$sql = "SELECT * FROM RESERVA";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id_reserva: " . $row["id_reserva"]. " - id_cliente: " . $row["id_cliente"]. " - Fecha Reserva: " . $row["fecha_reserva"]. " - id_vuelo: " . $row["id_vuelo"]. " - id_hotel: " . $row["id_hotel"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
