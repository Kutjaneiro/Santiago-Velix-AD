<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM partidas");
$conn->close();
?>
<html lang="es">
<a href="index.php">Volver al índice</a>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Gestionar Partidas</title>
</head>
<body>
    <h1>Gestionar Partidas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Juego</th>
            <th>ID Jugador 1</th>
            <th>ID Jugador 2</th>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['ID_GAME']; ?></td>
            <td><?php echo $row['ID_PLAYER1']; ?></td>
            <td><?php echo $row['ID_PLAYER2']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Duracion']; ?></td>
            <td>
                <a href="update_partida.php?id=<?php echo $row['ID']; ?>">Modificar</a>
                <a href="delete_partida.php?id=<?php echo $row['ID']; ?>">Borrar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="insert_partida.php">Insertar nueva partida</a>
</body>
</html>