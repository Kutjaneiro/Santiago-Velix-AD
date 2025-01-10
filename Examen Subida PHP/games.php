<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM games");
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
$conn->close();
?>
<html lang="es">
<a href="index.php">Volver al índice</a>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Gestionar Juegos</title>
</head>
<body>
    <h1>Gestionar Juegos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td>
                <a href="update_game.php?id=<?php echo $row['ID']; ?>">Modificar</a>
                <a href="delete_game.php?id=<?php echo $row['ID']; ?>">Borrar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="insert_game.php">Insertar nuevo juego</a>
</body>
</html>