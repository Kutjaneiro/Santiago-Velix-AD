<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ID'];
    $nombre = $_POST['Nombre'];
    $stmt = $conn->prepare("UPDATE players SET Alias=? WHERE ID=?");
    $stmt->bind_param("si", $nombre, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: players.php');
} else {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM players WHERE ID=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $player = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Modificar Jugador</title>
</head>
<body>
    <h1>Modificar Jugador</h1>
    <form method="post">
        <input type="hidden" name="ID" value="<?php echo isset($player['ID']) ? $player['ID'] : ''; ?>">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo isset($player['Nombre']) ? $player['Nombre'] : ''; ?>" required>
        <button type="submit">Modificar</button>
    </form>
</body> 
</html>