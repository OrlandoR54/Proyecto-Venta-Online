<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aceite de CBD 10%</title>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/structure.css">
    <link rel="stylesheet" href="../../../css/productos.css">
    <link rel="stylesheet" href="../../../css/calificacion.css">
</head>

<body>
    <!-- Barra navegador (acentada arriba) -->
    <?php
    $codigoPersona = $_GET["codigoPersona"];
    ?>
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="../indexUser.php?codigo=<?php echo $codigoPersona ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="../indexUser.php?codigo=<?php echo $codigoPersona ?>" class="barraItem boton">Home</a>
                <a href="../catalogoUser.php?codigo=<?php echo $codigoPersona ?>" class="barraItem boton">Productos</a>
                <a href="../aboutUser.php?codigo=<?php echo $codigoPersona ?>" class="barraItem boton">About</a>
                <a href="../../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigoPersona ?>" class="barraItem boton">Mi Cuenta</a>
                <a href="../../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
                <a href="../../Productos/carrito.php?codigo=<?php echo $codigoPersona ?>"><i class="carro-compras carro-derecha"></i></a>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="producto">
        <?php
        $codigo = $_GET["codigo"];
        echo "<img class='image' src='images/$codigo.jpg' alt='Aceite de cbd-10' />"
        ?>
    </div>

    <div class="descripcion">
        <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT prod_nombre,prod_descripcion FROM mh_products WHERE prod_id = $codigo";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo "<h2>". $row['prod_nombre'] ."</h2>";
        echo "<p>". $row['prod_descripcion'] ."</p>";
        ?>

        <div class="descripcion">
        <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT per_nombre, com_comentario, com_calificacion
        FROM  mh_comentarios, mh_persons
        where  mh_comentarios.mh_products_prod_id = $codigo
        AND mh_persons.per_id = mh_comentarios.mh_persons_per_id";
        $result = $conn->query($sql);
        echo "<h1>Comentarios: </h1>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h3>". $row['per_nombre'] ."</h3>";
                echo "<b>". $row['com_calificacion'] ."</b>";
                echo "<p>". $row['com_comentario'] ."</p>";
            }
        }
        


        ?>


        </div>
        
        <div>
            <span>$30</span>
            <p>&#10004; En stock</p>
            <div class="cola">
                
                
                
            </div>
            <div class="Comentario">
                <br>
                    Comentario: 
                    <br>
                    <?php
                    $codigoPro = $_GET["codigo"];
                    $codigoPer = $_GET["codigoPersona"];
                    echo "<form method='POST' action='insertarComentario.php?codigoProdcuto=$codigoPro&codigoPersona=$codigoPer'>
                    <textarea name='comentario' rows='8' cols='40' placeholder='Escribe aqui tu Comentario:' ></textarea>
                    <br>
                    <label for='Calificacion' id='calificacion' name='calificacion'>Calificacion:</label>
                    <select name='calificacion' id='calificacion'>
                    <option value='excelente'>excelente</option>
                    <option value='bueno'>bueno</option>
                    <option value='malo'>malo</option>
                    <option value='pesismo'>pesimo</option>
                    </select>
                    <input type='submit' id = 'comentar' name = 'comentar' value='calificar'>
                    </form>";
                    ?> 
            </div>
            <div class="Calificacion">
                <br>
               
                
            </div>
        </div>
    </div>

</body>

</html>