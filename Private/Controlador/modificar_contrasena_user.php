<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cambiar Contrasena</title>
</head>

<body>
    <?php
    //Incluir conexion a la BD
    include "../../config/conexionBD.php";
    $rol_admin = $_GET["rol_admin"];
    $codigo = $_POST["codigo"];
    $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;

    $sqlContrasena1 = "SELECT * FROM mh_persons WHERE per_id=$codigo";
    $result = $conn->query($sqlContrasena1);

    if ($result->num_rows > 0) {
        $sqlContrasena2 = "UPDATE mh_persons SET per_password=MD5($contrasena2) WHERE per_id=$codigo";

        if ($conn->query($sqlContrasena2) === TRUE) {
            echo "Se ha actualizado la contrasena correctamente";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>La contrasena actual no coincide con nuestros registros!!!</p>";
    }
    //echo "<a href='gestion_user.php?rol_admin=" . $rol_admin . "'>Regresar</a>";
    header("Location:gestion_user.php?codigo=<?php echo $codigo ?>?rol_admin=<?php echo $rol_admin ?>");
    $conn->close();
    ?>
</body>

</html>