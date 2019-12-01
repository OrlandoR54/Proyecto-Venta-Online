<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
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
    <title>Gestion de Productos</title>
 
   
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $rol_admin = $_GET["rol_admin"];
    ?>
    <header class="header">
        <nav>
            <ul>
                <li><a href="../index.php?rol_admin=<?php echo $rol_admin ?>">Inicio</a></li>
                <li><a href="../../Vista/ingreso_producto.html?rol_admin=<?php echo $rol_admin ?>">Ingresar Productos</a></li>
                <li><a href="../../../config/Cerrar_Sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
        <colgroup>
                    <col style="width: 105px">
                    <col style="width: 120px">
                    <col style="width: 130px">
                    <col style="width: 150px">
                    <col style="width: 121px">
                    <col style="width: 1000px">
                    <col style="width: 106px">
                   
                 </colgroup>
                    <tr>
                    <th class="tg-lboi">Nombre</th>
                    <th class="tg-lboi">Descripcion</th>
                    <th class="tg-lboi">Precio de Compra</th>
                    <th class="tg-lboi">Precion de Venta</th>
                    <th class="tg-lboi">Stock disponible</th>
                    <th class="tg-lboi">Foto del producto</th>
                    <th class="tg-lboi">Proveedor</th>
                    </tr>

            <?php
            //SELECT * FROM `mh_products`, `mh_provs` WHERE prov_id=mh_provs_prov_id
            $sql = "SELECT * FROM mh_products, mh_provs WHERE prov_id=mh_provs_prov_id ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["prod_stock"] != '0') {
                        $mostrarImg= "<img src='data:imge/jpg; base64," . base64_encode($row["prod_img"]) ."'>";
                    /*  echo  $row["prod_nombre"];
                      echo  $row["prod_descripcion"];
                      echo  $row["prod_precio_compra"];
                      echo  $row["pro_precio_venta"];
                      echo  $row["prod_stock"];
                      echo  $row["prov_nombre_empr"];
                      */

                      echo "<tr>";
                      echo "<td>" .$row["prod_nombre"] . "</td>";
                      echo "<td>" . $row["prod_descripcion"] . "</td>";
                      echo "<td>" . $row["prod_precio_compra"] . "</td>";
                      echo "<td>" . $row["pro_precio_venta"] . "</td>";
                      echo "<td>" . $row["prod_stock"] . "</td>";
                      echo "<td>" . $mostrarImg . "</td>";
                      echo "<td>" . $row["prov_nombre_empr"] . "</td>";
                        
                    }
                }
            } else {
                echo "<tr>";
                echo "<td colspan='10'>No existen productos</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
</body>

</html>