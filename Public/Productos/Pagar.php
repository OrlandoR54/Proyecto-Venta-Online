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
            /*SUM(columna)*/
            $sql = "SELECT prod_nombre,SUM(carri_subt), count(mh_products_prod_id),	carrit_fecha_compr 
            FROM mh_carrito_cabc, mh_carrito_detalle,mh_products 
            WHERE mh_persons_per_id=$codigo
            AND carrit_id=mh_carrito_cabc_carrit_id
            AND mh_products_prod_id=prod_id
            AND mh_products_prod_id=mh_products_prod_id 
            GROUP BY prod_nombre";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        echo  $row["prod_nombre"];
                        echo  $row["count(mh_products_prod_id)"] ;
                        echo  $row["SUM(carri_subt)"] ;
                }
            }
              $sql1 = "SELECT prod_nombre,SUM(carri_subt)
               FROM mh_carrito_cabc, mh_carrito_detalle,mh_products 
               WHERE mh_persons_per_id=$codigo
               AND carrit_id=mh_carrito_cabc_carrit_id
               AND mh_products_prod_id=prod_id
               AND mh_products_prod_id=mh_products_prod_id";
                         $result = $conn->query($sql1);
                         if($result->num_rows >0){
                             while($row=$result->fetch_assoc()){
                                echo $row["SUM(carri_subt)"] ;
                             }
                         }else {
                           
                            echo "No hay valores a pagar";
                         
                         }
                $sql2="INSERT INTO `mh_fact_cabec_vent`(`fc_vent_id`, `fc_fecha_vent`, `fc_vent_iva`, `fc_vent_total`, `mh_persons_per_id`, `fc_vent_estado`, `fc_estado`) 
                VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])";         
            $conn->close();
            ?>