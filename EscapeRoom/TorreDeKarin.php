<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Torre de Karin</title>
    <style>
        body {
            background-image: url('Img/TorreKarin.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            height: 100vh;
            color: white;
            text-align: center;
            position: relative;
        }

        .imagen-karin {
            position: absolute;
            left: 5%;
            top: 20%;
            width: 500px; 
            height: auto;
            z-index: 10;
        }

        .dialogo {
            position: absolute;
            left: 25%;
            top: 25%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 50%;
            z-index: 20;
        }

        .boton-respuesta {
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ffcc00;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .boton-continuar {
            position: absolute;
            bottom: 10%; 
            left: 50%;
            transform: translateX(-50%); 
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ffcc00;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            display: none; 
        }

        .mensaje-correcto {
            display: none;
            position: absolute;
            left: 40%;
            top: 60%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .bolas-dragon {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .bola-dragon {
            width: 50px; 
            height: 50px;
            margin: 0 10px;
        }

    </style>
</head>
<body>

<img src="Img/karin.png" alt="Karin" class="imagen-karin">

<div class="dialogo">
    <p>Hola, veo que estás buscando las bolas de dragón. Te daré 3 de ellas si me dices cómo se llama la nube voladora de Goku (lo dijo Goku después de conseguir la primera bola de dragón).</p>
    <button class="boton-respuesta" onclick="checkAnswer('Kinton')">Kinton</button>
    <button class="boton-respuesta" onclick="checkAnswer('Cinton')">Cinton</button>
    <button class="boton-respuesta" onclick="checkAnswer('Kintou')">Kintou</button>
</div>

<div class="mensaje-correcto" id="mensaje-correcto">
    <p>¡Correcto! Has conseguido tres bolas de dragón.</p>
    
    <div class="bolas-dragon">
        <img src="Img/2estrellas.png" alt="Bola de dragón 1" class="bola-dragon">
        <img src="Img/3estrellas.png" alt="Bola de dragón 2" class="bola-dragon">
        <img src="Img/5estrellas.png" alt="Bola de dragón 3" class="bola-dragon">
    </div>
</div>

<form method="POST" action="AtalayaDeKami.php" id="formulario-continuar">
    <button type="submit" class="boton-continuar">Ir a la atalaya de Kami</button>
</form>

<script>
    function checkAnswer(answer) {
        if (answer === 'Kinton') {
            document.getElementById('mensaje-correcto').style.display = 'block'; 
            document.querySelector('.boton-continuar').style.display = 'block'; 
        } else {
            alert('Respuesta incorrecta, inténtalo nuevamente.');
        }
    }
</script>

</body>
</html>
