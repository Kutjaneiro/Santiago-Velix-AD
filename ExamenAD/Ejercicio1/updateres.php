<?php
$servidor = "localhost";
$usuario = "root"; 
$contrasena = "";
$base_datos = "JUEGOS_DE_MESA";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_juego = $_POST['nombre_juego'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $tematica = $_POST['tematica'];
    $duracion = $_POST['duracion'];
    $edad = $_POST['edad'];
    $jugadores = $_POST['jugadores'];
    $id_editorial = $_POST['id_editorial'];

    try {
        $consulta = $conexion->prepare("UPDATE JUEGOS SET nombre = ?, tematica = ?, duracion = ?, edad = ?, numeroJugadores = ?, id_editorial = ? WHERE nombre = ?");
        $consulta->bind_param("ssiiiss", $nuevo_nombre, $tematica, $duracion, $edad, $jugadores, $id_editorial, $nombre_juego);
        $consulta->execute();

        if ($consulta->affected_rows > 0) {
            $mensaje = "El juego ha sido actualizado correctamente";
            $tipo_mensaje = "success";
        } else {
            $mensaje = "No se ha encontrado el juego con ese nombre o no hubo cambios";
            $tipo_mensaje = "info";
        }
    } catch (Exception $e) {
        $mensaje = "Ha habido un problema al actualizar los datos";
        $tipo_mensaje = "error";
    }
    $consulta->close();
}
$conexion->close();
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Actualizar Juego</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php if (!empty($mensaje)): ?>
        <script>
            Swal.fire({
                icon: '<?php echo $tipo_mensaje; ?>',
                title: '<?php echo ($tipo_mensaje == "success") ? "¡Éxito!" : "Atención"; ?>',
                text: '<?php echo $mensaje; ?>'
            }).then(() => {
                window.location.href = 'updateres.php';
            });
        </script>
    <?php endif; ?>

    <h1>Actualizar Juego</h1>
    <form action="updateres.php" method="POST">
        <h2>Buscar Juego por Nombre</h2>
        <label>Nombre actual del juego:</label>
        <input type="text" name="nombre_juego" required><br>

        <h2>Actualizar Datos</h2>
        <label>Nuevo nombre:</label>
        <input type="text" name="nuevo_nombre" required><br>
        <label>Temática:</label>
        <input type="text" name="tematica" required><br>
        <label>Duración (minutos):</label>
        <input type="number" name="duracion" required><br>
        <label>Edad mínima:</label>
        <input type="number" name="edad" required><br>
        <label>Número de jugadores:</label>
        <input type="number" name="jugadores" required><br>
        <label>ID de la Editorial:</label>
        <input type="number" name="id_editorial" required><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
