<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
if($_SESSION["per_rol"]!='U'){
    header("Location:login.php ");  
}
?>
<!DOCTYPE html>
<html>
<?php
include '../../config/conexionBD.php';
//$per_id = $_GET['per_id'];
//$rol_user=$_GET['rol_user'];
$codigo=$_GET["codigo"];
$idFactura=$_GET["idFactura"];

?>
<style type="text/css" id=style>
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
.tg .tg-6p27{color:#fe0000;border-color:inherit;text-align:left;vertical-align:middle}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>

<head>
    <meta charset="UTF-8">
    <title>Ver Detalle Pedido</title>
    <link  rel="icon"   href="../../../images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/structure.css">
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $idFactura = $_GET["idFactura"];
    
    ?>


    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="../indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="../indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Inicio</a>
                <a href="../../../config/cerrar_sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>


    <div class="seccion">

        <div id="main">
        
            <div class="w3-teal">
                <div class="w3-container">
                    <h1>Detalle Pedido</h1>
                    
                </div>
            </div>

            <!--Comienzo-->
            <div class="w3-container" id="aceite">
                <!--  <div class="w3-container w3-text-grey" id="jeans">
                    <p> </p>
                </div> -->
                <div id="buzon">
                    <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px"> 
                            <colgroup>
                                    <col style="width: 100px">
                                    <col style="width: 100px">
                                    <col style="width: 120px">
                                    <col style="width: 80px">
                            </colgroup>

                            <tr>
                                    <th class="tg-lboi">Producto</th>
                                    <th class="tg-lboi">Precio</th>
                                    <th class="tg-lboi">Cantidad</th>
                                    <th class="tg-lboi">Total</th>    
                            </tr>

                        <?php
                    /* SELECT fc_vent_id, fc_fecha_vent,fc_vent_total, per_nombre, prod_nombre FROM `mh_fact_cabec_vent`, `mh_detal_vent`, 
                        `mh_persons`,`mh_products`
                        WHERE fc_vent_id=mh_fact_cabec_vent_fc_vent_id and per_id=mh_persons_per_id and prod_id=mh_products_prod_id*/

                        $sql = "SELECT *
                        FROM mh_fact_cabec_vent, mh_persons,mh_detal_vent, mh_products 
                        WHERE fc_vent_id=mh_fact_cabec_vent_fc_vent_id 
                        and $idFactura=	mh_fact_cabec_vent_fc_vent_id
                        and mh_persons_per_id=$codigo 
                        and per_id=$codigo 
                        and prod_id=mh_products_prod_id 
                        ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            
                                echo "<tr>";
                                echo "<td>" .$row["prod_nombre"] . "</td>";
                                echo "<td>" .$row["fd_vent_precio"] . "</td>";
                                echo "<td>" .$row["fd_vent_cantidad"] . "</td>";
                                echo "<td>" .$row["fd_vent_total"] . "</td>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='4'>No existen productos</td>";
                            echo "</tr>";
                        }
                        $conn->close();
                        ?>
                    </table>
                <!-- </div> -->
                
                <!--</div>-->
                   

            </div>
            <!----Final--->
        </div>
    </div>

    <main class="mainTabla">
    

    </main>
    
</body>

</html>