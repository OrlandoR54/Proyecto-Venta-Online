<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
}
if($_SESSION["per_rol"]!='A'){
    header("Location:../../Public/Controlador/login.php ");  
}
?>
<!DOCTYPE html>
<html>
<?php
include '../../config/conexionBD.php';
$rol_admin = $_GET['rol_admin'];
?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
.tg .tg-6p27{color:#fe0000;border-color:inherit;text-align:left;vertical-align:middle}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>


<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    <link  rel="icon"   href="../../../images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/structure.css">
    <link rel="stylesheet" href="../../../css/catalogo.css">
</head>

<body>
<?php
include '../../config/conexionBD.php';
$rol_admin = $_GET['rol_admin'];
?>


    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="index.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="index.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Inicio</a>
                <a href="gestion_user.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Usuarios</a>
                <a href="../../config/Cerrar_Sesion.php" class="barraItem boton">Cerrar Sesion</a>
            </div>
        </div>
    </div>


    <div class="seccion">

        <div id="main">
        
            <div class="w3-teal">
                
                <div class="w3-container">
                    <h1>Gestion De Pedidos</h1>
                </div>
            </div>

            <!--Comienzo-->
            <div class="w3-container" id="aceite">
                <!--  <div class="w3-container w3-text-grey" id="jeans">
                    <p> </p>
                </div> -->

                <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
                    <colgroup>
                        <col style="width: 105px">
                        <col style="width: 120px">
                        <col style="width: 130px">
                        <col style="width: 150px">
                        <col style="width: 121px">
                        <col style="width: 200px">
                        <col style="width: 95px">
                        <col style="width: 95px">
                        <col style="width: 85px">
                        <col style="width: 120px">
                    </colgroup>
                    <tr>
                        <th class="tg-lboi">ID Factura</th>
                        <th class="tg-lboi">Fecha de vencimiento de la tarjeta</th>
                        <th class="tg-lboi">Nombre del cliente</th>
                        <th class="tg-lboi">Nombre del producto</th>
                        <th class="tg-lboi">Cantidad</th>
                        <th class="tg-lboi">Precio unitario</th>
                        <th class="tg-lboi">Total</th>
                        <th class="tg-lboi">Estado del pedido</th>
                        <th class="tg-lboi">Estado de la factura</th>
                        <th class="tg-lboi">Direccion</th>
                    </tr>

                    <?php
            
                        $sql = "SELECT mh_persons.per_id, mh_tarjet_credit.tarjet_cred_fech_venc, mh_persons.per_nombre, mh_products.prod_nombre, mh_detal_vent.fd_vent_cantidad, mh_detal_vent.fd_vent_precio, mh_detal_vent.fd_vent_total, mh_fact_cabec_vent.fc_vent_estado, mh_fact_cabec_vent.fc_estado, mh_persons.per_direccion, fc_vent_id
                        from mh_detal_vent, mh_fact_cabec_vent, mh_products, mh_persons, mh_tarjet_credit
                        WHERE mh_detal_vent.mh_fact_cabec_vent_fc_vent_id = mh_fact_cabec_vent.fc_vent_id
                        AND mh_detal_vent.mh_products_prod_id = mh_products.prod_id
                        AND mh_fact_cabec_vent.mh_persons_per_id = mh_persons.per_id
                        AND mh_tarjet_credit.mh_persons_per_id = mh_persons.per_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            
                                echo "<tr>";
                                echo " <td>" . $row['fc_vent_id'] . "</td>";
                                echo " <td>" . $row['tarjet_cred_fech_venc'] ."</td>";
                                echo " <td>" . $row['per_nombre'] . "</td>";
                                echo " <td>" . $row['prod_nombre'] . "</td>";
                                
                                echo " <td>" . $row['fd_vent_cantidad'] . "</td>";
                                echo " <td>" . $row['fd_vent_precio'] . "</td>";
                                echo " <td>" . $row['fd_vent_total'] . "</td>";
                            
                                $estado = ' ';
                                
                                echo "<td>
                                        <form name = 'form1' method='POST' action = 'MP.php?codigo=".$row['fc_vent_id']."'>
                                        <select name = 'list'>
                                        <option>".$row['fc_vent_estado']."</option>
                                        <option value='C'>C</option>
                                        <option value='A'>A</option>
                                        <option value='F'>F</option>
                                        <option value='R'>R</option>
                                        </select>
                                        <input name = 's1' type = 'submit' value = 'modificar'>
                                        </form>
                                        </td>";
                                echo " <td>" . $row['fc_estado'] . "</td>";
                                echo " <td>
                                        ". $row['per_direccion'] ."
                                        <form name = 'form2' action='../Vista/ruta_de_envio.php?direccion=".$row['per_direccion']."' method='POST'>


                                        <input name = 's1' type = 'submit' value = 'generar ruta '>
                                        </form> 
                                
                                </td>";
                                echo "</tr>";
                                
                                
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='10'>No existen pedidos pendientes</td>";
                            echo "</tr>";
                        }
                        $conn->close();
                    ?>   
                </table>

            </div>
            <!----Final--->
        </div>
    </div>
   
</body>

</html>





