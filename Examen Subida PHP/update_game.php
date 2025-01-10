<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ID'];
    $nombre = $_POST['Nombre'];
    $conn->query("UPDATE games SET nombre='$nombre' WHERE id=$id");
    $conn->close();
    header('Location: games.php');
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM games WHERE id=$id");
    $game = $result->fetch_assoc();
    $conn->close();
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Modificar Juego</title>
</head>
<body>
    <h1>Modificar Juego</h1>
    <form method="post">
        <input type="hidden" name="ID" value="<?php echo $game['ID']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo $game['Nombre']; ?>" required>
        <button type="submit">Modificar</button>
    </form>
</body>
</html>