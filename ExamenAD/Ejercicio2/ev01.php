<?php
session_start();

if (!isset($_SESSION['campo'])) {
    $_SESSION['campo'] = "*******O********";
    $_SESSION['estado'] = "mayuscula"; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $campo = $_SESSION['campo'];
    $estado = $_SESSION['estado'];

    if (isset($_POST['iniciar'])) {
        $_SESSION['campo'] = "*******O********";
        $_SESSION['estado'] = "mayuscula";
    } elseif (isset($_POST['izquierda']) && $estado === "mayuscula") {
        $posicionO = strpos($campo, "O");
        if ($posicionO > 0) {
            $campo[$posicionO] = " ";
            $campo[$posicionO - 1] = "O";
            $_SESSION['campo'] = $campo;
        }
    } elseif (isset($_POST['derecha']) && $estado === "mayuscula") {
        $posicionO = strpos($campo, "O");
        if ($posicionO < strlen($campo) - 1) {
            $campo[$posicionO] = " ";
            $campo[$posicionO + 1] = "O";
            $_SESSION['campo'] = $campo;
        }
    } elseif (isset($_POST['centro'])) {
        if ($estado === "mayuscula") {
            $_SESSION['estado'] = "minuscula";
            $_SESSION['campo'] = str_replace("O", "o", $campo);
        } else {
            $_SESSION['estado'] = "mayuscula";
            $_SESSION['campo'] = str_replace("o", "O", $campo);
        }
    }

    if (strpos($_SESSION['campo'], "*") === false) {
        $_SESSION['campo'] = "FIN!!";
    }
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Micro Comecocos</title>
</head>
<body>
    <h1>MICRO COMECOCOS</h1>
    <form method="post">
        <input type="text" name="campo" value="<?php echo $_SESSION['campo']; ?>" readonly size="17">
        <button type="submit" name="iniciar">iniciar</button>
        <h2>Controles</h2>
        <button type="submit" name="izquierda"><</button>
        <button type="submit" name="centro">^</button>
        <button type="submit" name="derecha">></button>
    </form>
</body>
</html>