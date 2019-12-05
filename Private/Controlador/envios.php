<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    
}
?>
<!DOCTYPE html>
<html>

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
    
</head>

<body>
<?php
include '../../config/conexionBD.php';
$rol_admin = $_GET['rol_admin'];
?>

    <header class="header">
        <nav>
            <ul>
                <li><a href="index.php?rol_admin=<?php echo $rol_admin ?>">Inicio</a></li>
                <li><a href="gestion_user.php?rol_admin=<?php echo $rol_admin ?>">Usuarios</a></li>
                <li><a href="../../config/Cerrar_Sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        </section>
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
        <colgroup>
                    <col style="width: 105px">
                    <col style="width: 120px">
                    <col style="width: 130px">
                    <col style="width: 150px">
                    <col style="width: 121px">
                    <col style="width: 200px">
                    <col style="width: 106px">
                    <col style="width: 95px">
                    <col style="width: 95px">
                    <col style="width: 95px">
                 </colgroup>
                    <tr>
                    <th class="tg-lboi">ID cliente</th>
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
            
            $sql = "SELECT mh_persons.per_id, mh_tarjet_credit.tarjet_cred_fech_venc, mh_persons.per_nombre, mh_products.prod_nombre, mh_detal_vent.fd_vent_cantidad, mh_detal_vent.fd_vent_precio, mh_detal_vent.fd_vent_total, mh_fact_cabec_vent.fc_vent_estado, mh_fact_cabec_vent.fc_estado, mh_persons.per_direccion
            from mh_detal_vent, mh_fact_cabec_vent, mh_products, mh_persons, mh_tarjet_credit
            WHERE mh_detal_vent.mh_fact_cabec_vent_fc_vent_id = mh_fact_cabec_vent.fc_vent_id
            AND mh_detal_vent.mh_products_prod_id = mh_products.prod_id
            AND mh_fact_cabec_vent.mh_persons_per_id = mh_persons.per_id
            AND mh_tarjet_credit.mh_persons_per_id = mh_persons.per_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   
                    echo "<tr>";
                    echo " <td>" . $row['per_id'] . "</td>";
                    echo " <td>" . $row['tarjet_cred_fech_venc'] ."</td>";
                    echo " <td>" . $row['per_nombre'] . "</td>";
                    echo " <td>" . $row['prod_nombre'] . "</td>";
                    
                    echo " <td>" . $row['fd_vent_cantidad'] . "</td>";
                    echo " <td>" . $row['fd_vent_precio'] . "</td>";
                    echo " <td>" . $row['fd_vent_total'] . "</td>";
                  
                    $estado = ' ';
                    
                    echo "<td>
                            <form name = 'form1' method='POST' action = 'MP.php?codigo=".$row['per_id']."'>
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
                            <form name = 'form2' action='../vista/ruta_de_envio.php?direccion=".$row['per_direccion']."' method='POST'>


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
            <div></div>
   
</body>

</html>





