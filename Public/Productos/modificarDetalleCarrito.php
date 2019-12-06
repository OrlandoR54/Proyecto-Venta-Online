<?php
include '../../config/conexionBD.php';
$idProducto = $_GET["idProducto"];
$codigo=$_GET["codigo"];
$carritD=$_GET["carritD"];


$sql9="DELETE FROM `mh_carrito_detalle`
 WHERE mh_products_prod_id=$idProducto
 AND carrit_det_id=$carritD";
                if ($conn->query($sql9) == TRUE){
                    echo "Eliminado carrito detalles";
                   echo "<script type= 'text/javascript'>
                    alert('Se quito correctamente el producto');
                     location='carrito.php?codigo=$codigo';
                     </script>";
                 } else {
                    echo "<p class='error'>Error6: " . mysqli_error($conn) . "</p>";
                }
?>  