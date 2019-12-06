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
    <title>Modificar Producto</title>
    <link  rel="icon"   href="../../images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../css/modificaUser.css">
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
                <div class="inf">
                    <label class="modificar" for="nombre">Nombre Producto (*)</label>
                    <input class="txtUser" type="text" id="nombre" name="nombre" value="<?php echo $row["prod_nombre"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="descripcion">Descripcion (*)</label>
                    <input class="txtUser" type="text" id="descripcion" name="descripcion" value="<?php echo $row["prod_descripcion"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="PrecioCompra">Precio Compra (*)</label>
                    <input class="txtUser" type="text" id="PrecioCompra" name="PrecioCompra" value="<?php echo $row["prod_precio_compra"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="PrecioVenta">Precio venta (*)</label>
                    <input class="txtUser" type="text" id="PrecioVenta" name="PrecioVenta" value="<?php echo $row["pro_precio_venta"]; ?>">
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="StockProducto">Stock (*)</label>
                    <input class="txtUser" type="text" id="StockProducto" name="StockProducto" value="<?php echo $row["prod_stock"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar" for="fechaVencimiento">Fecha Vencimiento  (*)</label>
                    <input class="txtUser" type="date" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $row["prod_fecha_venc"]; ?>" >
                </div>
                <br>
                <div class="inf">
                    <label class="modificar">Proveedor</label>
                    <input class="txtUser" type="text" id="Proveedor" name="Proveedor" value="<?php echo $row["mh_provs_prov_id"]; ?>" >
                </div>    
                <div class= "botones">   
                    <button class="boton"  name="submit" >Modificar Producto</button>
                    <input  class="boton" type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../Private/Controlador/GestionProductos/gestion_productos.php?rol_admin=<?php echo $rol_admin ?>'" class="boton">
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