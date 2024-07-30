<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// validar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// consultar por mas de dos reservas por hotel
$sql = "SELECT h.nombre, h.ubicacion, COUNT(r.id_reserva) AS numero_reservas 
        FROM HOTEL h
        JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel
        HAVING numero_reservas > 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Hoteles con más de 2 reservas</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Nombre: " . $row["nombre"]. " - Ubicación: " . $row["ubicacion"]. " - Número de Reservas: " . $row["numero_reservas"]. "<br>";
    }
} else {
    echo "No hay hoteles con más de 2 reservas";
}

$conn->close();
?>
