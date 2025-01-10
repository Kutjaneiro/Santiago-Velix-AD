<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ID'];
    $id_game = $_POST['ID_GAME'];
    $id_player1 = $_POST['ID_PLAYER1'];
    $id_player2 = $_POST['ID_PLAYER2'];
    $nombre = $_POST['Nombre'];
    $duracion = $_POST['Duracion'];
    $conn->query("UPDATE partidas SET ID_GAME='$id_game', ID_PLAYER1='$id_player1', ID_PLAYER2='$id_player2', Nombre='$nombre', Duracion='$duracion' WHERE ID=$id");
    $conn->close();
    header('Location: partidas.php');
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM partidas WHERE ID=$id");
    $partida = $result->fetch_assoc() ?: ['ID_GAME' => '', 'ID_PLAYER1' => '', 'ID_PLAYER2' => '', 'Nombre' => '', 'ID' => '', 'Duracion' => ''];
    $conn->close();
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Partida</title>
</head>
<body>
    <h1>Modificar Partida</h1>
    <form method="post">
        <input type="hidden" name="ID" value="<?php echo $partida['ID']; ?>">
        <label for="ID_GAME">ID Game:</label>
        <input type="text" id="ID_GAME" name="ID_GAME" value="<?php echo $partida['ID_GAME']; ?>" required>
        <label for="ID_PLAYER1">ID Player 1:</label>
        <input type="text" id="ID_PLAYER1" name="ID_PLAYER1" value="<?php echo $partida['ID_PLAYER1']; ?>" required>
        <label for="ID_PLAYER2">ID Player 2:</label>
        <input type="text" id="ID_PLAYER2" name="ID_PLAYER2" value="<?php echo $partida['ID_PLAYER2']; ?>" required>
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo $partida['Nombre']; ?>" required>
        <label for="Duracion">Duración:</label>
        <input type="text" id="Duracion" name="Duracion" value="<?php echo $partida['Duracion']; ?>" required>
        <button type="submit">Modificar</button>
    </form>
</body>
</html>