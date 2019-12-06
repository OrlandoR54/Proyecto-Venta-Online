<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos del usuario</title>
    
</head>

<body>
    <?php
    //Incluir conexion a la BD
    include '../../config/conexionBD.php';
    $rol_admin = $_GET["rol_admin"];
    $codigo = $_POST["codigo"];
    $sql = "UPDATE mh_persons SET per_eliminado = 'S' WHERE per_id = '$codigo'";
    if ($conn->query($sql) == TRUE) {
       /* echo "<p>Se ha eliminado los datos correctamente</p>";*/
        echo "<script type= 'text/javascript'>
        alert('Se ha eliminado los datos correctamente');
         location='gestion_user.php?rol_admin=" . $rol_admin . "';
         </script>";
    } else {
        echo "<p>Error" . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<a href='gestion_user.php?rol_admin=" . $rol_admin . "'>Regresar</a>";
    $conn->close();
    ?>
</body>

</html>