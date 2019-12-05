<!DOCTYPE html>
<html>

<?php
include '../../config/conexionBD.php';
$codigo = $_GET["codigo"];
?>

<head>
    <meta charset="UTF-8">
    <title>Ingresar Tarjeta de Credito</title>
    <link rel="stylesheet" rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <form id="formulario" class="box_registro" method="POST" onsubmit="" action="Agrega.php?codigo=<?php echo $codigo ?>"  >
        <h1>Registrate</h1>

        <input type="text" id="numeroTarjeta" name="numeroTarjeta" value="" placeholder="Ingrese el numero de su Tarjeta"
             maxlength="13" required
            class="registro" />
        <br>

        <input type="date" id="fecha" name="fecha" value="" placeholder="Ingrese la fecha de vencimiento de la tarjeta" minlength="3"
            required class="registro" />
        <br>

        <input type="text" id="codigo" name="codigo" value="" placeholder="Ingrese el codigo de seguridad de la tarjeta"
            minlength="3" required
            class="registro" />
        <br>

        <input type="text" id="nombreT" name="nombreT" value="" placeholder="Titular de la Tarjeta" required
            class="registro" />
        <br>

        <input type="submit" id="btn" onclik= "" value="Aceptar" class="boton">
    </form>
</body>

</html>