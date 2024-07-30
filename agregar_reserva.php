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

$id_cliente = $_POST['id_cliente'];
$id_vuelo = $_POST['id_vuelo'];
$id_hotel = $_POST['id_hotel'];
$fecha_reserva = date("Y-m-d");

// Validación básica
if (empty($id_cliente) || empty($id_vuelo) || empty($id_hotel)) {
    echo "Todos los campos son obligatorios.";
    exit();
}

// Insertar datos
$sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES ('$id_cliente', '$fecha_reserva', '$id_vuelo', '$id_hotel')";

if ($conn->query($sql) === TRUE) {
    echo "Nueva reserva agregada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
