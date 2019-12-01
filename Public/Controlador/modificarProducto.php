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
            <form class="box" method="POST"  enctype="multipart/form-data" action="../../Private/Controlador/GestionProductos/modificar_prod.php?rol_admin=<?php echo $rol_admin ?>">
            <div class="form-group">
            <label class="col-sm-2 control-label">Seleccione la imagen</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" name="image" multiple>
            </div>
            </div>
                
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                <label class="modificar" for="nombre">Nombre Producto (*)</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row["prod_nombre"]; ?>" >
                <br>
                <label class="modificar" for="descripcion">Descripcion (*)</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $row["prod_descripcion"]; ?>" >
                <br>
                <label class="modificar" for="PrecioCompra">Precio Compra (*)</label>
                <input type="text" id="PrecioCompra" name="PrecioCompra" value="<?php echo $row["prod_precio_compra"]; ?>" >
                <br>
                <label class="modificar" for="PrecioVenta">Precio venta (*)</label>
                <input type="text" id="PrecioVenta" name="PrecioVenta" value="<?php echo $row["pro_precio_venta"]; ?>">
                <br>
                <label class="modificar" for="StockProducto">Stock (*)</label>
                <input type="text" id="StockProducto" name="StockProducto" value="<?php echo $row["prod_stock"]; ?>" >
                <br>
                <label class="modificar" for="fechaVencimiento">Fecha Vencimiento  (*)</label>
                <input type="date" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $row["prod_fecha_venc"]; ?>" >
                <br>
                <label class="modificar">Proveedor</label>
                <input type="text" id="Proveedor" name="Proveedor" value="<?php echo $row["mh_provs_prov_id"]; ?>" >
                        
                <button name="submit" class="btn btn-primary">Modificar Producto</button>
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