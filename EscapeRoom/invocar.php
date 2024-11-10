<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Invocar al Dragón</title>
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

        .message-container {
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

        .action-button {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ffcc00;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<video id="invocation-video" autoplay>
    <source src="Img/invocacion.mp4" type="video/mp4">
    Tu navegador no soporta el formato de video.
</video>

<div class="message-container" id="message-container">
    <p>Dime tu deseo</p>
    <form method="POST" action="adiosShenron.php">
        <button type="submit" class="action-button">Deseo escapar de este escape room</button>
    </form>
</div>

<script>
    var video = document.getElementById('invocation-video');
    var messageContainer = document.getElementById('message-container');

    video.onended = function() {
        messageContainer.style.display = 'block'; 
    };
</script>

</body>
</html>
