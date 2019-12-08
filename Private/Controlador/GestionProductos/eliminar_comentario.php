<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos del usuario</title>
    
</head>

<body>
    <?php
    //Incluir conexion a la BD
    include '../../../config/conexionBD.php';
    $rol_admin = $_GET["rol_admin"];
    $codigo = $_POST["codigo"];
    $sql = "UPDATE mh_comentarios SET com_eliminado = 'S' WHERE com_id = '$codigo'";
    if ($conn->query($sql) == TRUE) {
        echo "<p>Se ha eliminado los datos correctamente</p>";
    } else {
        echo "<p>Error" . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    //Es la nueva ubicacion cuando se cumple la sentencia de arriba
    header("Location:gestion_comentarios.php?rol_admin=<?php echo $rol_admin ?>");
    $conn->close();
    ?>
</body>

</html>