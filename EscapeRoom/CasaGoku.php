<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Casa de Goku</title>
    <style>
        body {
            background-image: url('Img/CasaGoku.jpg');
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat; 
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .bola {
            position: fixed;
            bottom: 54%;
            right: 6%;
            width: 40px;
            height: auto;
            cursor: pointer;
        }

        h1 {
            color: white;
            margin-top: 20px;
            text-align: center;
            background-color: black;
        }

        .mensaje {
            position: fixed;
            bottom: 10%;
            right: 40%;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2em;
        }

        .goku-container {
            position: fixed;
            left: 0;
            bottom: 20%;
            display: flex;
            align-items: center;
            padding-left: 10px;
        }

        .goku {
            width: 400px;
            height: auto;
            margin-right: 10px;
            margin-bottom: -80px;
        }

        .textoGoku {
            color: white;
            font-size: 1em;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 5px;
            border-radius: 5px;
        }

        .kame-house-button {
            position: fixed;
            bottom: 30%;
            right: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #ffcc00;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>ENCUENTRA LA BOLA DE DRAGON DE GOKU</h1>

    <?php
    if (!isset($_POST['found'])) {
        echo '<audio autoplay loop>
                <source src="img/DBMisterio.mp3" type="audio/mpeg">
                Tu navegador no soporta la etiqueta de audio.
              </audio>';
    }

    if (isset($_POST['found'])) {
        echo '<div class="mensaje">¡Misión cumplida!</div>';
        echo '<div class="goku-container">
                <img src="Img/HolaSoyGoku.png" alt="Hola Soy Goku" class="goku">
                <div class="textoGoku">La has encontrado! Te dejaré mi nube Kinton para que vayas a por la siguiente, está en la casa del maestro Roshi, ve allí y encuentrala.</div>
              </div>';
        echo '<form action="KameHouse.php" method="get">
                <button type="submit" class="kame-house-button">Ir a Kame House</button>
              </form>';
    } else {
        echo '<form method="POST">
                <button type="submit" name="found" style="border: none; background: none;">
                    <img src="Img/4estrellas.png" alt="Bola de Dragón de 4 Estrellas" class="bola">
                </button>
              </form>';
    }
    ?>

</body>
</html>
