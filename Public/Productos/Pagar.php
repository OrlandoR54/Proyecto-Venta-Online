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
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
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
             } else {
                echo "<p class='error'>Error1: " . mysqli_error($conn) . "</p>";
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
            }  else {
                echo "<p class='error'>Error2: " . mysqli_error($conn) . "</p>";
            }

               /* Recuperar productos*/
               $sql5 = "SELECT *
           FROM
               `mh_carrito_cabc`
           LEFT JOIN `mh_carrito_detalle` ON `mh_carrito_detalle`.`mh_carrito_cabc_carrit_id` = `mh_carrito_cabc`.`carrit_id`
           LEFT JOIN `mh_products` ON `mh_carrito_detalle`.`mh_products_prod_id` = `mh_products`.`prod_id`
           WHERE
               `mh_persons_per_id` = $codigo";
              /* AND mh_products_prod_id=mh_products_prod_id ";*/
               $result = $conn->query($sql5);
               $lista=array();
               $lista1=array();
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                     array_push($lista,$row["mh_products_prod_id"]) ;
                     array_push($lista1,$row["carri_subt"]) ;
                   /* $IDdelProductoA=$row["mh_products_prod_id"] ;
                       $SubtotalCadaProductoA=$row["carri_subt"] ;
                         $cant=$row["carrit_prod_vent"];*/
                   }
               }
               /*Ingresar Detalles Factura */
               for($i=0; $i<count($lista); $i++){
                $sql6="INSERT INTO `mh_detal_vent`
                VALUES(
                    NULL,
                    1,
                    '$lista1[$i]',
                    '$idcabecera',
                    '$lista[$i]',
                    '$lista1[$i]'

                );";
                  // $result1 = $conn->query($sql6);
                   if ($conn->query($sql6) == TRUE){
                   echo "Detalle ingresado";
                   } else {
                    echo "<p class='error'>Error3: " . mysqli_error($conn) . "</p>";
                }
               }

               $sql7="UPDATE `mh_fact_cabec_vent`  
               SET `fc_vent_total`='$total'
               WHERE '$idcabecera'=`fc_vent_id`";
                if ($conn->query($sql7) == TRUE){
                    /*echo "Total Modificado";*/
                 } else {
                    echo "<p class='error'>Error4: " . mysqli_error($conn) . "</p>";
                }

                /**Recuperar id de la factura cabecera */
                $sql8="SELECT `carrit_id`, `mh_persons_per_id` FROM `mh_carrito_cabc`,`mh_persons` WHERE mh_persons_per_id=$codigo";
                $result3 = $conn->query($sql8);
                if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                 $idcarrito=$row["carrit_id"];
                }
                }else {
                    echo "<p class='error'>Error5: " . mysqli_error($conn) . "</p>";
                }


	            $sql9="DELETE FROM `mh_carrito_detalle` WHERE 	mh_carrito_cabc_carrit_id=$idcarrito";
                if ($conn->query($sql9) == TRUE){
                    echo "Eliminado carrito detalles";
                   /* echo "<script type= 'text/javascript'>
                    alert('El pago se efectuo con exito');
                     location='../Controlador/catalogoUser.php?codigo=$codigo';
                     </script>";*/
                 } else {
                    echo "<p class='error'>Error6: " . mysqli_error($conn) . "</p>";
                }


                /*header("Location:../Controlador/catalogoUser.php?codigo=" . $codigo . "");*/
              
               /* http://localhost/Proyecto-Venta-Online/Public/Controlador/catalogoUser.php?codigo=7*/
          
             
            $conn->close();
            ?>
