!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>
   
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $rol_admin = $_GET["rol_admin"];

    $codigo = $_POST["codigo"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;

    $sql = "UPDATE mh_persons SET per_num_ced = '$cedula', per_nombre = '$nombre', per_apellido = '$apellido', per_direccion = '$direccion', per_telefono = '$telefono', per_correo = '$correo', per_fechaNacimiento = '$fechaNacimiento' WHERE per_id = $codigo";

    if ($conn->query($sql) == TRUE) {
        echo "Se ha actualizado los datos personales correctamente!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='gestion_user.php?rol_admin=" . $rol_admin . "'>Regresar</a>";

    $conn->close();
    ?>
</body>

</html>