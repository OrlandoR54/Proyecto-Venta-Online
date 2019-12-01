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
    <title>Eliminar Producto</title>
</head>

<body>
    <?php
    $rol_admin = $_GET["rol_admin"];
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM mh_products WHERE prod_id=$codigo";

    include '../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            ?>
            <form class="box" method="POST" action="../../Private/Controlador/GestionProductos/eliminar_prod.php?rol_admin=<?php echo $rol_admin ?>">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                <label class="elimina" for="nombre">Nombre Producto (*)</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row["prod_nombre"]; ?>" disabled>
                <br>
                <label class="elimina" for="descripcion">Descripcion (*)</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $row["prod_descripcion"]; ?>" disabled>
                <br>
                <label class="elimina" for="PrecioCompra">Precio Compra (*)</label>
                <input type="text" id="PrecioCompra" name="PrecioCompra" value="<?php echo $row["prod_precio_compra"]; ?>" disabled>
                <br>
                <label class="elimina" for="PrecioVenta">Precio venta (*)</label>
                <input type="text" id="PrecioVenta" name="PrecioVenta" value="<?php echo $row["pro_precio_venta"]; ?>" disabled>
                <br>
                <label class="elimina" for="StockProducto">Stock (*)</label>
                <input type="text" id="StockProducto" name="StockProducto" value="<?php echo $row["prod_stock"]; ?>" disabled>
                <br>
                <label class="elimina" for="fechaVencimiento">Fecha Vencimiento  (*)</label>
                <input type="date" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $row["prod_fecha_venc"]; ?>" disabled>
                <br>
                
                <input class="boton" type="submit" id="eliminar" name="eliminar" value="Eliminar">
                <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../Private/Controlador/GestionProductos/gestion_productos.php?rol_admin=<?php echo $rol_admin ?>'" class="boton">
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