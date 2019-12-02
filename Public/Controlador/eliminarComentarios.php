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
    $sql = "SELECT * FROM mh_comentarios WHERE com_id=$codigo";

    include '../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form class="box" method="POST" action="../../Private/Controlador/GestionProductos/eliminar_comentario.php?rol_admin=<?php echo $rol_admin ?>">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                <label class="elimina" for="comentario">Comentario (*)</label>
                <input type="text" id="comentario" name="comentario" value="<?php echo $row["com_comentario"]; ?>" disabled>
                <br>
                <label class="elimina" for="calificacion">Calificacion (*)</label>
                <input type="text" id="calificacion" name="calificacion" value="<?php echo $row["com_calificacion"]; ?>" disabled>
                <br>
                <input class="boton" type="submit" id="eliminar" name="eliminar" value="Eliminar">
                <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../Private/Controlador/GestionProductos/gestion_comentarios.php?rol_admin=<?php echo $rol_admin ?>'" class="boton">
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