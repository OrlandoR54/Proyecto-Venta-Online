<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-*">
    <title>Eliminar Usuario</title>
</head>

<body>
    <?php
    $rol_admin = $_GET["rol_admin"];
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM mh_persons WHERE per_id=$codigo";

    include '../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form class="box" method="POST" action="../../Private/Controlador/eliminar_user.php?rol_admin=<?php echo $rol_admin ?>">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                <label class="elimina" for="cedula">Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["per_num_ced"]; ?>" disabled>
                <br>
                <label class="elimina" for="nombre">Nombres (*)</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row["per_nombre"]; ?>" disabled>
                <br>
                <label class="elimina" for="apellido">Apellidos (*)</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $row["per_apellido"]; ?>" disabled>
                <br>
                <label class="elimina" for="direccion">Direccion (*)</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["per_direccion"]; ?>" disabled>
                <br>
                <label class="elimina" for="telefono">Telefono (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["per_telefono"]; ?>" disabled>
                <br>
                <label class="elimina" for="fechaNacimiento">Fecha Nacimiento (*)</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["per_fechaNacimiento"]; ?>" disabled>
                <br>
                <label class="elimina" for="email">Correo Electronico (*)</label>
                <input type="email" id="email" name="email" value="<?php echo $row["per_correo"]; ?>" disabled>
                <br>
                <input class="boton" type="submit" id="eliminar" name="eliminar" value="Eliminar">
                <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../Private/Controlador/gestion_user.php?rol_admin=<?php echo $rol_admin ?>'" class="boton">
            </form>
    <?php
        }
    } else {
        echo "<p>Ha ocurrido un error inesperado!!!</p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>
</body>

</html>