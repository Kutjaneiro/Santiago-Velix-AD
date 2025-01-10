<?php
$id = $_GET['id'];
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$conn->query("DELETE FROM players WHERE id=$id");
$conn->close();
header('Location: players.php');
?>