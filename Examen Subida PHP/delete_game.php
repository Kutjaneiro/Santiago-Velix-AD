<?php
$id = $_GET['id'];
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$conn->query("DELETE FROM games WHERE id=$id");
$conn->close();
header('Location: games.php');
?>