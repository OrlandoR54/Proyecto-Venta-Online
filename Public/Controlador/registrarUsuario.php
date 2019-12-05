<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
</head>

<body>
    <form class="box">
        <?php
        //Incluir conexion a la base de datos
        include '../../config/conexionBD.php';

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
        $apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
        $correo = isset($_POST["email"]) ? trim($_POST["email"]) : null;
        $fechaNacimiento = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
        $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

        $sql = "INSERT INTO mh_persons VALUES (0, '$cedula', '$nombre', '$apellido', '$fechaNacimiento', '$direccion', '$telefono', 'U', 'N','$correo', MD5('$password'))";
       
            
      
        if ($conn->query($sql) == TRUE) {
            echo "<p>Se han creado los datos personales correctamente!!!</p>";
            $sql1 = "SELECT per_id FROM mh_persons WHERE per_num_ced=$cedula" ;
            if ($conn->query($sql1) == TRUE) {
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
                    $clave=$row['per_id'];
                    echo "<p>$clave</p>";
                }
            }
        }
            $sql2 = "INSERT INTO `mh_carrito_cabc` (`carrit_id`, `carrit_fecha_compr`, `mh_persons_per_id`, `carr_tot`)
            VALUES (NULL, '2019-11-13', $clave, '0');";
                if ($conn->query($sql2) == TRUE) {
                 echo "<p>Se han creado los datos de la cabecera carrito!!!</p>";
                }  
          
        } 
        else {
            if ($conn->errno == 1062) {
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema</p>";
            } else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
        header("Location:../Vista/login.html");
        $conn->close();
        echo "<a href='../Vista/registrarse.html'>Regresar</a>";
        ?>
    </form>
</body>

</html>