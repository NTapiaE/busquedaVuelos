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

// Insertar 10 reservas
for ($i = 1; $i <= 10; $i++) {
    $id_cliente = rand(1, 10); // Suponiendo que hay clientes con IDs del 1 al 10
    $fecha_reserva = date("Y-m-d");
    $id_vuelo = rand(1, 3); // Suponiendo que hay 3 vuelos registrados
    $id_hotel = rand(1, 3); // Suponiendo que hay 3 hoteles registrados

    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES ('$id_cliente', '$fecha_reserva', '$id_vuelo', '$id_hotel')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Reserva $i agregada exitosamente<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mostrar contenido de la tabla RESERVA
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
