<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos del usuario</title>
    
</head>

<body>
    <?php
    //Incluir conexion a la BD
    //comentario para hacer el push
    include '../../../config/conexionBD.php';
    $codigo =$_GET['codigo'];
    $sql = "UPDATE mh_fact_cabec_vent SET fc_estado = 'S' WHERE fc_vent_id = '$codigo'";
    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha eliminado los datos correctamente</p>";
    } else {
        echo "<p>Error" . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<Regresar</a>";
    $conn->close();
    ?>
</body>

</html>