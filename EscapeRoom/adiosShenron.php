<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adiós Shenron</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .contenedor-mensaje {
            display: none; 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            font-size: 2em;
            z-index: 999;
        }

    </style>
</head>
<body>


<video id="adios-video" autoplay>
    <source src="Img/adiosShenron.mp4" type="video/mp4">
    Tu navegador no soporta el formato de video.
</video>

<div class="contenedor-mensaje" id="contenedor-mensaje">
    <p>¡Has ganado! Has conseguido escapar!</p>
</div>

<script>
    var video = document.getElementById('adios-video');
    var messageContainer = document.getElementById('contenedor-mensaje');

 
    video.onended = function() {
        messageContainer.style.display = 'block'; 
    };
</script>

</body>
</html>
