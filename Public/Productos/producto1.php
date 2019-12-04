<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aceite de CBD 10%</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/structure.css">
    <link rel="stylesheet" href="../../css/productos.css">
    <link rel="stylesheet" href="../../css/calificacion.css">
</head>

<body>

<?php
        include '../../config/conexionBD.php';
   
        $codigo = $_GET["codigo"];


    ?>    
    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="index.html" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <!-- <marquee behavior="slide" direction="right" scrollamount=”3″ loop=1 scrolldelay="2" > -->
                <a href="index.html" class="barraItem boton">Home</a>
                <a href="catalogo.html" class="barraItem boton">Productos</a>
                <a href="about.html" class="barraItem boton">About</a>
                <a href="login.html" class="barraItem boton">Log In/Sing up</a>
                <a href="carrito.html"><i class="carro-compras carro-derecha"></i></a>
                </marquee>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="producto">
        <img class="image" src="../../images/aceite-de-cbd-10-full-spectrum.jpg" alt="Aceite de cbd-10" />
    </div>

    <div class="descripcion">
        <h1>Aceite de CBD 10% (FULL SPECTRUM)</h1>
        <div>
            <span>$30</span>
            <p>&#10004; En stock</p>
            <div class="cola">
                <p class="cant"><label for="cantidad">Cantidad</label></p>
                <input class="numero" type="number" name="cantidad" min="1">
                <button type="submit" class="w3-button w3-black">Agregar <i class="fa carro-compras"></i></button>
            </div>
            <div class="Comentario">
                <br>
                    Comentario: 
                    <br>
                    <textarea name="comentarios" rows="8" cols="40" placeholder="Escribe aqui tu Comentario:" ></textarea>
            </div>
            <div class="Calificacion">
                <br>
                <label for="Calificacion" id="calificacion " name="calificacion">Calificacion: </label>
                <input type="text" id="comentario" name="comanetario">
                <input type="button" id="aceptar" name="aceptar" value="Aceptar." disabled="True">
            </div>
        </div>
    </div>

</body>

</html>