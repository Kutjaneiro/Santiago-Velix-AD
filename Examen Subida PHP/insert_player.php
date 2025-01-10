<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alias = $_POST['alias'];
    $edad = $_POST['edad'];
    $conn = new mysqli('localhost', 'root', '', 'examenphp');
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO players (Alias, Edad) VALUES (?, ?)");
    $stmt->bind_param("si", $alias, $edad);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: players.php');
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Insertar Jugador</title>
</head>
<body>
    <h1>Insertar Jugador</h1>
    <form method="post">
        <label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias" required>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <button type="submit">Insertar</button>
    </form>
</body>
</html>