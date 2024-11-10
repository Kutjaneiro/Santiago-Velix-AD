<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Atalaya de Kami</title>
    <style>
        body {
            background-image: url('Img/AtalayaDeKami.png'); 
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

        .contenedor-mensaje {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            width: 60%;
            text-align: center;
            z-index: 10;
        }

        .contenedor-dende {
            position: absolute;
            left: 5%;
            top: 40%;
            z-index: 5;
        }

        .contenedor-dende img {
            width: 300px;
            height: auto;
            border-radius: 10px;
        }

        .contenedor-dialogo {
            position: absolute;
            left: 35%;
            top: 45%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 10px;
            color: white;
            width: 25%;
            text-align: center;
            z-index: 5;
        }

        .boton-bola {
            margin-top: 15px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ffcc00;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .boton-invocar {
            margin-top: 30px;
            padding: 20px 40px;
            font-size: 20px;
            background-color: #ff6600;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            width: 100%;
            font-weight: bold;
        }
        
    </style>
</head>
<body>

<div class="contenedor-dende">
    <img src="Img/Dende.png" alt="Dende">
</div>

<div class="contenedor-dialogo">
    <p>Con que quieres invocar al dragón, eh... en ese caso te daré la última bola que buscas, pero solo si adivinas cuál es. Si te equivocas, debes empezar la búsqueda desde el principio.</p>
    <button class="boton-bola" onclick="checkAnswer('2')">Bola de 2 estrellas</button>
    <button class="boton-bola" onclick="checkAnswer('6')">Bola de 6 estrellas</button>
    <button class="boton-bola" onclick="checkAnswer('4')">Bola de 4 estrellas</button>
</div>

<div id="mensaje-correcto" style="display: none; position: absolute; top: 60%; left: 50%; transform: translateX(-50%); background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px; color: white; text-align: center; z-index: 5;">
    <p>¡Es correcto! Ya tienes todas las bolas de dragón.</p>
    <form method="POST" action="invocar.php">
        <button type="submit" class="boton-invocar">Invocar al dragón sagrado</button>
    </form>
</div>

<script>
    function checkAnswer(answer) {
        if (answer === '6') {
            // Mostrar mensaje de éxito
            document.getElementById('mensaje-correcto').style.display = 'block';
            // Ocultar los botones
            document.querySelectorAll('.boton-bola').forEach(function(button) {
                button.style.display = 'none';
            });
        } else {
            window.location.href = 'inicio.php';
        }
    }
</script>

</body>
</html>
