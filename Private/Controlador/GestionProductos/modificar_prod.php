<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
</head>

<body>
    <form class="box">
        <?php
  include '../../../config/conexionBD.php';
  $rol_admin = $_GET["rol_admin"];
  
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));

            $codigo = $_POST["codigo"];
            $nombre= isset($_POST["nombre"])? trim($_POST["nombre"]):null;
            $descripcion= isset($_POST["descripcion"])? trim($_POST["descripcion"]):null;
            $precioCompra= isset($_POST["PrecioCompra"])? trim($_POST["PrecioCompra"]):null;
            $precioVenta= isset($_POST["PrecioVenta"])? trim($_POST["PrecioVenta"]):null;
            $stockProducto= isset($_POST["StockProducto"])? trim($_POST["StockProducto"]):null;
            $fechaVenc= isset($_POST["fechaVencimiento"])? trim($_POST["fechaVencimiento"]):null;
            $proveedor= isset($_POST["Proveedor"])? trim($_POST["Proveedor"]):null;
          

     //Insertar imagen en la base de datos
     $sql = "UPDATE mh_products SET prod_nombre='$nombre', prod_descripcion='$descripcion',prod_img='$imgContenido', prod_precio_compra='$precioCompra', 
     pro_precio_venta='$precioVenta', prod_stock='$stockProducto', prod_fecha_venc='$fechaVenc', mh_provs_prov_id='$proveedor' WHERE prod_id='$codigo'";
    

    

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se han modificado los datos del prducto correctamente!!!</p>";
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    
    }
            
        $conn->close();
        //echo "<a href='gestion_productos.php?rol_admin=" . $rol_admin . "'>Regresar</a>";
        header("Location:gestion_productos.php?rol_admin=<?php echo $rol_admin ?>");
        ?>
    </form>
</body>

</html>