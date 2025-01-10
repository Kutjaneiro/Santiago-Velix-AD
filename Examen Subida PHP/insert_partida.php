<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $player1_id = $_POST['player1_id'];
    $player2_id = $_POST['player2_id'];
    $game_id = $_POST['game_id'];
    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];

    $conn = new mysqli('localhost', 'root', '', 'examenphp');
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO partidas (ID_GAME, ID_PLAYER1, ID_PLAYER2, Nombre, Duracion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $game_id, $player1_id, $player2_id, $nombre, $duracion);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header('Location: partidas.php');
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Insertar Partida</title>
</head>
<body>
    <h1>Insertar Partida</h1>
    <form method="post">
        <label for="game_id">Game ID:</label>
        <input type="text" id="game_id" name="game_id" required>
        <label for="player1_id">Player 1 ID:</label>
        <input type="text" id="player1_id" name="player1_id" required>
        <label for="player2_id">Player 2 ID:</label>
        <input type="text" id="player2_id" name="player2_id" required>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="duracion">Duración:</label>
        <input type="text" id="duracion" name="duracion" required>
        <button type="submit">Insertar</button>
    </form>
</body>
</html>