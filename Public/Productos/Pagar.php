<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    
}
?>
<?php
include '../../config/conexionBD.php';
$codigo = $_GET["codigo"];
?>


<?php
            
            /*Recuperar total Factura*/ 
              $sql1 = "SELECT prod_nombre,SUM(carri_subt)
               FROM mh_carrito_cabc, mh_carrito_detalle,mh_products 
               WHERE mh_persons_per_id=$codigo
               AND carrit_id=mh_carrito_cabc_carrit_id
               AND mh_products_prod_id=prod_id
               AND mh_products_prod_id=mh_products_prod_id";
                         $result = $conn->query($sql1);
                         if($result->num_rows >0){
                             while($row=$result->fetch_assoc()){
                               $total=$row["SUM(carri_subt)"] ;
                                $fechaActual = date('Y-m-d');
                             }
                         }else {  
                            /*echo "No hay valores a pagar";  */
                         }           
            /* Recuperar productos*/
            $sql2 = "SELECT prod_nombre,SUM(carri_subt), count(mh_products_prod_id),	carrit_fecha_compr 
            FROM mh_carrito_cabc, mh_carrito_detalle,mh_products 
            WHERE mh_persons_per_id=$codigo
            AND carrit_id=mh_carrito_cabc_carrit_id
            AND mh_products_prod_id=prod_id
            AND mh_products_prod_id=mh_products_prod_id 
            GROUP BY prod_nombre";
            $result = $conn->query($sql2);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        $nombreProducto=$row["prod_nombre"];
                        $IDdelProducto=$row["count(mh_products_prod_id)"] ;
                        $SubtotalCadaProducto=$row["SUM(carri_subt)"] ;
                        $cantidad=$row["count(mh_products_prod_id)"];
                }
            }  
            
           /* Ingresar Factura cabecera*/ 
          $sql3="INSERT INTO `mh_fact_cabec_vent`(`fc_vent_id`, `fc_fecha_vent`, `fc_vent_iva`, `fc_vent_total`, `mh_persons_per_id`, `fc_vent_estado`, `fc_estado`) 
            VALUES (NULL,'$fechaActual',0.12,'$total','$codigo','A','N') ";
            $result = $conn->query($sql3);   
            if ($conn->query($sql2) == TRUE){
              /*  echo "Cabecera Ingresada";*/
             } else{
                  /*  echo "No se ingreso la cabecera";*/
             } 

             /**Recuperar id de la factura cabecera */
           $sql4="SELECT `fc_vent_id` FROM `mh_detal_vent`, `mh_fact_cabec_vent` 
           WHERE mh_persons_per_id=$codigo 
           ORDER BY mh_persons_per_id DESC";
             $result = $conn->query($sql4);
             if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   echo "ID DE LA FACTURA CABECERA", $idcabecera=$row["fc_vent_id"];
                }
            }  else{
                /*echo "No recupero id de la cabecera";*/
            }   

               /* Recuperar productos*/
               $sql5 = "SELECT carri_subt, mh_products_prod_id,	carrit_fecha_compr,carrit_prod_vent 
               FROM mh_carrito_cabc, mh_carrito_detalle,mh_products 
               WHERE mh_persons_per_id=$codigo
               AND carrit_id=mh_carrito_cabc_carrit_id
               AND mh_products_prod_id=prod_id";
              /* AND mh_products_prod_id=mh_products_prod_id ";*/
               $result = $conn->query($sql5);
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       $IDdelProductoA=$row["mh_products_prod_id"] ;
                       $SubtotalCadaProductoA=$row["carri_subt"] ;
                         $cant=$row["carrit_prod_vent"];
                        /*Ingresar Detalles Factura */
                       $sql6="INSERT INTO `mh_detal_vent`(`fd_vent_id`, `fd_vent_cantidad`, `fd_vent_precio`,
                        `mh_fact_cabec_vent_fc_vent_id`, `fc_vent_subtotal`, `mh_products_prod_id`, `fd_vent_total`)
                        VALUES (NULL,'$cant','$SubtotalCadaProductoA','$idcabecera', '$SubtotalCadaProductoA', '$IDdelProductoA', '$SubtotalCadaProductoA')";
                        $result1 = $conn->query($sql6);
                        if ($conn->query($sql6) == TRUE){
                       /* echo "Detalle ingresado";*/
                        } else{
                           /* echo "No se ingreso el detalle";*/
                        }  
                       
                   }
               }  
              

             $sql7="UPDATE `mh_fact_cabec_vent`  
               SET `fc_vent_total`='$total'
               WHERE $idcabecera=fc_vent_id";
                $result2 = $conn->query($sql7);
                if ($conn->query($sql7) == TRUE){
                    /*echo "Total Modificado";
                 } else{
                        echo "No se modifica el total";*/
                 } 

                   /**Recuperar id de la factura cabecera */
                $sql8="SELECT `carrit_id`, `mh_persons_per_id` FROM `mh_carrito_cabc`,`mh_persons` WHERE mh_persons_per_id=$codigo";
                $result3 = $conn->query($sql8);
                if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                 $idcarrito=$row["carrit_id"];
                }
                }else{
                     echo "No recupero id de la cabecera";
                 }   

                 $sql9="DELETE FROM `mh_carrito_detalle` WHERE 	mh_carrito_cabc_carrit_id=$idcarrito";
                 $result4 = $conn->query($sql9);
                if ($conn->query($sql9) == TRUE){
                    echo "Eliminado";
                    echo "<script type= 'text/javascript'>
                    alert('El pago se efectuo con exito');
                     location='../Controlador/catalogoUser.php?codigo=$codigo';
                     </script>";
                 } else{
                        echo "No eliminado";
                 } 

             
            $conn->close();
            ?>
