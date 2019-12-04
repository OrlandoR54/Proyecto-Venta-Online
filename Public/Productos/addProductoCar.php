 
   
   <?php
        include '../../config/conexionBD.php';
        $value = $_GET["value"];
        $codigo = $_GET["codigo"];
    ?>
<?php  
     $sql = "SELECT prod_id,pro_precio_venta, carrit_id FROM mh_products, mh_carrito_cabc WHERE prod_id=$value AND mh_persons_per_id=$codigo ";
    
    if ($conn->query($sql) == TRUE) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row=$result->fetch_assoc()){
                $clave=$row['prod_id'];
                $precio=$row['pro_precio_venta'];
                $car=$row["carrit_id"];
                echo $clave;
            }
        }
        $sql2 = "INSERT INTO mh_carrito_detalle (carrit_det_id, carrit_prod_vent, 
        carrt_prod_iva, carrit_prod_desc, carrt_total, mh_carrito_cabc_carrit_id, carri_subt, mh_products_prod_id)
         VALUES (0,1,0.12,0,0,$car,$precio,$clave)";
          if ($conn->query($sql2) == TRUE) {
           echo "agrego";
            }else {
                echo "error";
            }
    }
        
       /* echo "<a href='../Controlador/catalogoUser.php?codigo=" . $codigo . "'>Regresar</a>";*/
      header("Location:../Controlador/catalogoUser.php?codigo=" . $codigo . "");
      $conn->close();
        ?>
   