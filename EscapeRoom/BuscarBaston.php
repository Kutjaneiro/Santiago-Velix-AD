<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Bastón</title>
    <style>
        body {
            background-image: url('Img/BastonFondo.jpg'); 
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

        .zona-clicable {
            position: absolute;
            top: 20%; 
            left: 15%; 
            width: 60%; 
            height: 10%; 
            cursor: pointer; 
        }

        .contenedor-mensaje {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            z-index: 999;
            width: 70%;
            height: auto;
        }

        .contenedor-mensaje .mensaje {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .boton-accion {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #ffcc00;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .imagen-roshi {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<h1>Estás buscando el bastón sagrado...</h1>
<p>Haz clic en la zona indicada para encontrar el bastón.</p>

<div class="zona-clicable" onclick="mostrarMensaje()"></div>

<div class="contenedor-mensaje" id="contenedor-mensaje">
    <img src="Img/Roshi.png" alt="Roshi" class="imagen-roshi"> 
    <img src="Img/7estrellas.png" alt="7estrellas" class="imagen-roshi"> 
    <img src="Img/1estrella.png" alt="1estrella" class="imagen-roshi"> 

    <div class="mensaje">
        ¡Lo has encontrado! Llévatelo y llévate también estas dos bolas de dragón contigo.
    </div>
    <form method="POST" action="TorreDeKarin.php">
        <button type="submit" class="boton-accion">Ir a la torre de Karin</button>
    </form>
</div>

<script>
    function mostrarMensaje() {
        document.getElementById('contenedor-mensaje').style.display = 'block';
    }
</script>

</body>
</html>
