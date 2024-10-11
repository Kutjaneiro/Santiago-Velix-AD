<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php

if (!isset($_SESSION['numero_oculto'])) {
    $_SESSION['numero_oculto'] = rand(1, 100);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_jugador = intval($_POST['numero']);

    if ($numero_jugador < 1 || $numero_jugador > 100) {
        $mensaje = "Por favor, introduce un número entre 1 y 100.";
    } else {
        if ($numero_jugador < $_SESSION['numero_oculto']) {
            $mensaje = "El número oculto es más alto.";
        } elseif ($numero_jugador > $_SESSION['numero_oculto']) {
            $mensaje = "El número oculto es más bajo.";
        } else {
            $mensaje = "Enhorabuena de la buena! Has acertado el número.";
            $_SESSION['numero_oculto'] = rand(1, 100);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el número</title>
</head>
<body>
    <h1>Adivina el número entre 1 y 100</h1>
    <form method="POST" action="">
    <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" min="1" max="100" required>
        <button type="submit">Adivinar</button>
    </form>

    <?php
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>
</body>
</html>
