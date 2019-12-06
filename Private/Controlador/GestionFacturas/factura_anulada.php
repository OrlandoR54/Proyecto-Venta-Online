<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos del usuario</title>
    
</head>

<body>
    <?php
    //Incluir conexion a la BD
    //comentario para hacer el push Funcioanado
    include '../../../config/conexionBD.php';
    $codigo =$_GET['codigo'];
    $rol_admin = $_GET['rol_admin'];
    $sql = "UPDATE mh_fact_cabec_vent SET fc_estado = 'S' WHERE fc_vent_id = '$codigo'";
    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha eliminado los datos correctamente</p>";
    } else {
        echo "<p>Error" . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    header("Location:gestion_factura.php?codigo=<?php echo $codigo ?>?rol_admin=<?php echo $rol_admin ?>");
    $conn->close();
    ?>
</body>

</html>