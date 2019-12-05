<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
</head>
    <?php
    include '../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    ?>

<body>
    <form class="box">
        <?php
        //Incluir conexion a la base de datos
        include '../../config/conexionBD.php';
    

        $numeroTarjeta = isset($_POST["numeroTarjeta"]) ? trim($_POST["numeroTarjeta"]) : null;
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"], 'UTF-8') : null;
        $codigoA = isset($_POST["codigo"]) ? trim($_POST["codigo"], 'UTF-8') : null;
        $nombreT = isset($_POST["nombreT"]) ? trim($_POST["nombreT"], 'UTF-8') : null;
       /* INSERT INTO `mh_tarjet_credit` (`tarjet_cred_id`, `tarjet_cred_num`, `tarjet_cred_fech_venc`, `tarjet_cred_cod_seg`,`trajet_nomb_titular`,`tar_estado`,`mh_persons_per_id`) 
        VALUES (NULL, 1234567891234, 10/10/2020, 123, 'patito','A',2)*/
        $sql = "INSERT INTO `mh_tarjet_credit` (`tarjet_cred_id`, `tarjet_cred_num`,
         `tarjet_cred_fech_venc`, `tarjet_cred_cod_seg`,`trajet_nomb_titular`,`tar_estado`,`mh_persons_per_id`) 
        VALUES (NULL, '$numeroTarjeta', '$fecha', '$codigoA', '$nombreT','A','$codigo')";
        if ($conn->query($sql) == TRUE) {
           echo "<script type= 'text/javascript'>
           alert('Tarjeta agregada');
            location='carrito.php?codigo=$codigo';
            </script>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
       
        $conn->close();
        /*echo "<a href='../Vista/registrarse.html'>Regresar</a>";*/
        ?>
    </form>
</body>

</html>