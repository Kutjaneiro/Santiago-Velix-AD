<?php
$servidor = "localhost";
$usuario = "root"; 
$contrasena = "";
$base_datos = "JUEGOS_DE_MESA";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_editorial = $_POST['nombre_editorial'];
    $nacionalidad = $_POST['nacionalidad'];
    $juego1 = $_POST['juego1'];
    $tematica1 = $_POST['tematica1'];
    $duracion1 = $_POST['duracion1'];
    $edad1 = $_POST['edad1'];
    $jugadores1 = $_POST['jugadores1'];
    $juego2 = $_POST['juego2'];
    $tematica2 = $_POST['tematica2'];
    $duracion2 = $_POST['duracion2'];
    $edad2 = $_POST['edad2'];
    $jugadores2 = $_POST['jugadores2'];

    $conexion->begin_transaction();

    try {
        $consulta = $conexion->prepare("INSERT INTO EDITORIALES (nombre, nacionalidad) VALUES (?, ?)");
        $consulta->bind_param("ss", $nombre_editorial, $nacionalidad);
        $consulta->execute();
        $id_editorial = $conexion->insert_id;

        $consulta = $conexion->prepare("INSERT INTO JUEGOS (nombre, tematica, duracion, edad, numeroJugadores, id_editorial) VALUES (?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("ssiiii", $juego1, $tematica1, $duracion1, $edad1, $jugadores1, $id_editorial);
        $consulta->execute();

        $consulta = $conexion->prepare("INSERT INTO JUEGOS (nombre, tematica, duracion, edad, numeroJugadores, id_editorial) VALUES (?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("ssiiii", $juego2, $tematica2, $duracion2, $edad2, $jugadores2, $id_editorial);
        $consulta->execute();

        $conexion->commit();
        $mensaje = "Los datos se haninsertado correctamente";
        $tipo_mensaje = "success";
    } catch (Exception $e) {
        $conexion->rollback();
        $mensaje = "Ha habido un problema al insertar los datos";
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
    <title>Insertar Juegos y Editorial</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php if (!empty($mensaje)): ?>
        <script>
            Swal.fire({
                icon: '<?php echo $tipo_mensaje; ?>',
                title: '<?php echo ($tipo_mensaje == "success") ? "Genial" : "Error"; ?>',
                text: '<?php echo $mensaje; ?>'
            }).then(() => {
                window.location.href = 'insertares.php';
            });
        </script>
    <?php endif; ?>

    <h1>Insertar Juegos de Mesa y Editorial</h1>
    <form action="insertares.php" method="POST">
        <h2>Datos de la Editorial</h2>
        <label>Nombre de la Editorial:</label>
        <input type="text" name="nombre_editorial" required><br>
        <label>Nacionalidad:</label>
        <input type="text" name="nacionalidad" required><br>

        <h2>Datos del Primer Juego</h2>
        <label>Nombre del Juego:</label>
        <input type="text" name="juego1" required><br>
        <label>Temática:</label>
        <input type="text" name="tematica1" required><br>
        <label>Duración (minutos):</label>
        <input type="number" name="duracion1" required><br>
        <label>Edad Mínima:</label>
        <input type="number" name="edad1" required><br>
        <label>Número de Jugadores:</label>
        <input type="number" name="jugadores1" required><br>

        <h2>Datos del Segundo Juego</h2>
        <label>Nombre del Juego:</label>
        <input type="text" name="juego2" required><br>
        <label>Temática:</label>
        <input type="text" name="tematica2" required><br>
        <label>Duración (minutos):</label>
        <input type="number" name="duracion2" required><br>
        <label>Edad Mínima:</label>
        <input type="number" name="edad2" required><br>
        <label>Número de Jugadores:</label>
        <input type="number" name="jugadores2" required><br>

        <button type="submit">Insertar</button>
    </form>
</body>
</html>
