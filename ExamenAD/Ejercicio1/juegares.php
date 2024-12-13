<?php
$conexion = new mysqli("localhost", "root", "", "JUEGOS_DE_MESA");

$resultado = $conexion->query("SELECT * FROM JUEGOS WHERE numeroJugadores > 3");

echo "<table border='1'>
        <tr>
            <th>Nombre</th>
            <th>Temática</th>
            <th>Duración</th>
            <th>Edad</th>
            <th>Número de Jugadores</th>
        </tr>";

while ($datos = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$datos['nombre']}</td>
            <td>{$datos['tematica']}</td>
            <td>{$datos['duracion']}</td>
            <td>{$datos['edad']}</td>
            <td>{$datos['numeroJugadores']}</td>
        </tr>";
}

echo "</table>";

$conexion->close();
?>
