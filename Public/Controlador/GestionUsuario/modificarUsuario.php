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
    <title>Modificar</title>
    <link  rel="icon"   href="../../../images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../css/modificaUser.css">
</head>

<body>
    
    <?php
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM mh_persons WHERE per_id=$codigo";

    include '../../../config/conexionBD.php';
    $result = $conn->query($sql);
   // C:\xampp\htdocs\Proyecto-Venta-Online\Private\Controlador\GestionUsuario\modificar.php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <h1>Modificar usuario: <?php echo $row["per_nombre"]; ?></h1>
            <form class="box" method="POST" action="../../../Private/Controlador/GestionUsuario/modificar.php?codigo=<?php echo $codigo ?>">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                <div class="inf">
                    <label class="modificar" for="cedula">Cedula (*)</label>
                    <input class="txtUser" type="text" id="cedula" name="cedula" value="<?php echo $row["per_num_ced"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="nombre">Nombres (*)</label>
                    <input class="txtUser" type="text" id="nombre" name="nombre" value="<?php echo $row["per_nombre"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="apellido">Apellidos (*)</label>
                    <input class="txtUser" type="text" id="apellido" name="apellido" value="<?php echo $row["per_apellido"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="direccion">Direccion (*)</label>
                    <input class="txtUser" type="text" id="direccion" name="direccion" value="<?php echo $row["per_direccion"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="telefono">Telefono (*)</label>
                    <input class="txtUser" type="text" id="telefono" name="telefono" value="<?php echo $row["per_telefono"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="fechaNacimiento">Fecha Nacimiento (*)</label>
                    <input class="txtUser" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["per_fechaNacimiento"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="email">Correo Electronico (*)</label>
                    <input class="txtUser" type="email" id="email" name="email" value="<?php echo $row["per_correo"]; ?>" >
                </div>
                <br>
                <div class= "botones">
                    <input class="boton" type="submit" id="modificar" name="modificar" value="Modificar">
                    <input class="boton" type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>'" class="boton">
                </div>           
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