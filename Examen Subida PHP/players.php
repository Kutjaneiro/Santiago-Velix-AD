<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM players");
$conn->close();
?>
<html lang="es">
<a href="index.php">Volver al índice</a>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Gestionar Jugadores</title>
</head>
<body>
    <h1>Gestionar Jugadores</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Alias</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo isset($row['ID']) ? $row['ID'] : 'N/A'; ?></td>
            <td><?php echo isset($row['Alias']) ? $row['Alias'] : 'N/A'; ?></td>
            <td><?php echo isset($row['Edad']) ? $row['Edad'] : 'N/A'; ?></td>
            <td>
                <a href="update_player.php?id=<?php echo $row['ID']; ?>">Modificar</a>
                <a href="delete_player.php?id=<?php echo $row['ID']; ?>">Borrar</a>
            </td>
        </tr>
        <?php endwhile; ?>
        <?php else: ?>
        <tr>
            <td colspan="4">No hay jugadores disponibles</td>
        </tr>
        <?php endif; ?>
    </table>
    <a href="insert_player.php">Insertar nuevo jugador</a>
</body>
</html>