<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Carrito de compras</title>
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="../../css/structure.css">
        <link rel="stylesheet" href="../../css/catalogo.css">
    </head>
    
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle}
.tg .tg-6p27{color:#fe0000;border-color:inherit;text-align:left;vertical-align:middle}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>


<body>
<?php
include '../../config/conexionBD.php';
$codigo = $_GET["codigo"];
?>


    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="../Controlador/indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="../Controlador/indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Home</a>
                <a href="../Controlador/catalogoUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Productos</a>
                <a href="../Controlador/aboutUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">About</a>
                <a href="../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Mi Cuenta</a>
                <a href="../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>

      

    <div class="seccion">
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
            <colgroup>
                <col style="width: 105px">
                <col style="width: 120px">
                <col style="width: 120px">
                <col style="width: 120px">       
            </colgroup>
            <tr>
                <th class="tg-lboi">Producto</th>
                <th class="tg-lboi">Cantidad</th>
                <th class="tg-lboi">Subtotal</th>
                <th class="tg-lboi">Total a pagar</th>           
            </tr>

            <?php
            /*SUM(columna)*/
                $sql = "SELECT prod_nombre,SUM(carri_subt), count(mh_products_prod_id) FROM mh_carrito_cabc, mh_carrito_detalle,mh_products WHERE mh_persons_per_id=$codigo
                and carrit_id=mh_carrito_cabc_carrit_id and mh_products_prod_id=prod_id and mh_products_prod_id=mh_products_prod_id GROUP BY prod_nombre";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["prod_nombre"] . "</td>";
                            echo "<td>" . $row["count(mh_products_prod_id)"] . "</td>";
                            echo "<td>" . $row["SUM(carri_subt)"] . "</td>";

                        
                    }
                }
                $sql1 = "SELECT prod_nombre,SUM(carri_subt) FROM mh_carrito_cabc, mh_carrito_detalle,mh_products 
                        WHERE mh_persons_per_id=$codigo
                        and carrit_id=mh_carrito_cabc_carrit_id  and mh_products_prod_id=prod_id and mh_products_prod_id=mh_products_prod_id";
                         $result = $conn->query($sql1);
                         if($result->num_rows >0){
                             while($row=$result->fetch_assoc()){
                                echo "<td>" . $row["SUM(carri_subt)"] . "</td>";
                             }
                         }else {
                            echo "<tr>";
                            echo "<td colspan='10'>No existen usuarios</td>";
                            echo "</tr>";
                         }
                $conn->close();
            ?>
        </table> 
    </div>
 
</body>

</html>