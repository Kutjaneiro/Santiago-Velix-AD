<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Habitación de Inicio</title>
    <style>
        .goku {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -60%);
            width: 500px;
        }
        
        .bocadillo {
            position: absolute;
            top: 53%;
            left: 46%;
            transform: translateX(-50%);
            width: 500px;
        }

        .botones {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .botones button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <img src="Img/HolaSoyGoku.png" alt="Goku" class="goku">

    <img src="Img/bocadillo.png" alt="Bocadillo" class="bocadillo">

    <div class="botones">
        <?php
            echo '<form action="CasaGoku.php" method="get">';
            echo '<button type="submit">Ir a casa de Goku</button>';
            echo '</form>';

        ?>
    </div>

</body>
</html>