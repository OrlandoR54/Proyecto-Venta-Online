<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
if($_SESSION["per_rol"]!='A'){
    header("Location:../../Public/Controlador/login.php ");  
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link  rel="icon"   href="../../images/favicon.png" type="image/png">
    <title>Crear Nuevo Producto</title>
</head>

<body>
    <form class="box">
        <?php
  include '../../../config/conexionBD.php';
  if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));

            $nombre= isset($_POST['nombre'])? trim($_POST["nombre"]):null;
            $descripcion= isset($_POST['descripcion'])? trim($_POST["descripcion"]):null;
            $precioCompra= isset($_POST['PrecioCompra'])? trim($_POST["PrecioCompra"]):null;
            $precioVenta= isset($_POST['PrecioVenta'])? trim($_POST["PrecioVenta"]):null;
            $stockProducto= isset($_POST['StockProducto'])? trim($_POST["StockProducto"]):null;
            $fechaVenc= isset($_POST['FechaVencimiento'])? trim($_POST["FechaVencimiento"]):null;
            $proveedor= isset($_POST['Proveedor'])? trim($_POST["Proveedor"]):null;
            //$image=isset($_POST['image'])? trim($_POST["image"]):null;

     //Insertar imagen en la base de datos
     $sql = "INSERT into mh_products VALUES (0 ,'$nombre', '$descripcion','$imgContenido', '$precioCompra', 
     '$precioVenta', '$stockProducto', '$fechaVenc', '$proveedor')";
    
    if ($conn->query($sql) == TRUE) {
        echo "<p>Se han creado los datos personales correctamente!!!</p>";
    }else {
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
    
}
    
    }
        $conn->close();
        //echo "<a href='../index.php?rol_admin=<?php echo $rol_admin ?'>Regresar</a>";
        header("Location:gestion_productos.php?rol_admin=<?php echo $rol_admin ?>");
        ?>
    </form>
</body>

</html>