<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $conn = new mysqli('localhost', 'root', '', 'examenphp');
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $conn->query("INSERT INTO games (nombre) VALUES ('$nombre')");
    $conn->close();
    header('Location: games.php');
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Insertar Juego</title>
</head>
<body>
    <h1>Insertar Juego</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Insertar</button>
    </form>
</body>
</html>