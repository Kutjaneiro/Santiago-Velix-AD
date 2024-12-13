<?php
$conexion = new mysqli("localhost", "root", "", "JUEGOS_DE_MESA");

$resultado = $conexion->query("
    SELECT EDITORIALES.nombre AS NOMBRE_EDITORIAL, JUEGOS.nombre AS NOMBRE_JUEGO, JUEGOS.tematica AS TEMATICA_JUEGO
    FROM EDITORIALES
    JOIN JUEGOS ON EDITORIALES.id = JUEGOS.id_editorial
");

echo "<table border='1'>
        <tr>
            <th>Nombre Editorial</th>
            <th>Nombre Juego</th>
            <th>Temática</th>
        </tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['NOMBRE_EDITORIAL']}</td>
            <td>{$fila['NOMBRE_JUEGO']}</td>
            <td>{$fila['TEMATICA_JUEGO']}</td>
        </tr>";
}

echo "</table>";

$conexion->close();
?>
