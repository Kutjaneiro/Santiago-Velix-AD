<?php
$conn = new mysqli('localhost', 'root', '', 'examenphp');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$num_partidas = $conn->query("SELECT COUNT(*) AS count FROM partidas")->fetch_assoc()['count'];
$num_players = $conn->query("SELECT COUNT(DISTINCT ID_PLAYER1) + COUNT(DISTINCT ID_PLAYER2) AS count FROM partidas")->fetch_assoc()['count'];
$num_games = $conn->query("SELECT COUNT(DISTINCT ID_GAME) AS count FROM partidas")->fetch_assoc()['count'];

$num_players_2_partidas = $conn->query("SELECT COUNT(*) AS count FROM (SELECT ID_PLAYER1 AS player_id FROM partidas UNION ALL SELECT ID_PLAYER2 AS player_id FROM partidas GROUP BY player_id HAVING COUNT(*) = 2) AS subquery")->fetch_assoc()['count'];
$num_players_3_partidas = $conn->query("SELECT COUNT(*) AS count FROM (SELECT ID_PLAYER1 AS player_id FROM partidas UNION ALL SELECT ID_PLAYER2 AS player_id FROM partidas GROUP BY player_id HAVING COUNT(*) = 3) AS subquery")->fetch_assoc()['count'];
$num_players_more_3_partidas = $conn->query("SELECT COUNT(*) AS count FROM (SELECT ID_PLAYER1 AS player_id FROM partidas UNION ALL SELECT ID_PLAYER2 AS player_id FROM partidas GROUP BY player_id HAVING COUNT(*) > 3) AS subquery")->fetch_assoc()['count'];

$conn->close();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Índice</title>
</head>
<body>
    <h1>Índice</h1>
    <ul>
        <li><a href="players.php">Gestionar PLAYERS</a></li>
        <li><a href="games.php">Gestionar GAMES</a></li>
        <li><a href="partidas.php">Gestionar PARTIDAS</a></li>
    </ul>
    <h2>Resumen de Control</h2>
    <p>Número de partidas: <?php echo $num_partidas; ?></p>
    <p>Número de jugadores: <?php echo $num_players; ?></p>
    <p>Número de juegos: <?php echo $num_games; ?></p>
    <p>Número de jugadores jugando 2 partidas: <?php echo $num_players_2_partidas; ?></p>
    <p>Número de jugadores en 3 partidas: <?php echo $num_players_3_partidas; ?></p>
    <p>Número de jugadores en más de 3 partidas: <?php echo $num_players_more_3_partidas; ?></p>
</body>
</html>