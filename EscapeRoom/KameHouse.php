<?php
session_start();

if (!isset($_SESSION['audio_played'])) {
    $_SESSION['audio_played'] = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Casa de Kame</title>
    <style>
        body {
            background-image: url('Img/KameHouse.jpg');
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat; 
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .contenedor-roshi {
            position: fixed;
            left: 20%;
            top: 65%;
            display: flex;
            align-items: center;
            z-index: 2;
        }

        .imagen-roshi {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }

        .dialogo {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 1.2em;
            max-width: 250px;
        }

        .boton-buscar {
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 15px 30px;
            background-color: #ffcc00;
            color: black;
            font-size: 18px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            z-index: 1;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['audio_played']) && $_SESSION['audio_played'] === true) {
    echo '<audio id="music" autoplay loop>
            <source src="Img/KameHouseMusica.mp3" type="audio/mpeg">
            Tu navegador no soporta audio.
          </audio>';
}
?>

<div class="contenedor-roshi">
    <img src="Img/Roshi.png" alt="Roshi" class="imagen-roshi">
    <div class="dialogo">
        <p>Hola, te daré dos bolas de dragón, pero también tienes que encontrar tu bastón sagrado, llevo mucho tiempo buscándolo y no consigo recordar donde lo dejé.</p>
    </div>
</div>

<form method="POST" action="BuscarBaston.php">
    <button type="submit" class="boton-buscar">Buscar el bastón</button>
</form>

</body>
</html>
