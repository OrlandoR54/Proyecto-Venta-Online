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
        <title>Eliminar Productos del carrito</title>
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
$idProducto = $_GET["idProducto"];
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
        <div class="barra-lateral barra-block barra-card w3-animate-left" style="display:none" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
            <br>
            <a href="gestion_user.php?rol_admin=<?php echo $rol_admin ?>" class="w3-bar-item w3-button">Gestionar Usuarios</a>
            <a href="GestionProductos/gestion_productos.php?rol_admin=<?php echo $rol_admin ?>" class="w3-bar-item w3-button">Gestionar Productos</a>
            <a href="GestionProductos/gestion_comentarios.php?rol_admin=<?php echo $rol_admin ?>" class="w3-bar-item w3-button">Gestionar Comentarios</a>
            <a href="envios.php?rol_admin=<?php echo $rol_admin ?>" class="w3-bar-item w3-button">Gestion Pedidos</a>
            <a href="GestionFacturas/gestion_factura.php?rol_admin=<?php echo $rol_admin ?>" class="w3-bar-item w3-button">Gestionar Facturas</a>
        </div>

        <div id="main">
          
            <div class="w3-teal">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>Modificar Producto Agregado </h1>
                </div>
            </div>

            <!--Comienzo-->
            <div class="w3-container" id="aceite">
            <button type="button"  onclick = "location='validarTarjeta.php?codigo=<?php echo $codigo ?>&value=5'">Pagar</button>

              <!--  <div class="w3-container w3-text-grey" id="jeans">
                    <p> </p>
                </div> -->

                <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
                    <colgroup>
                       
                        <col style="width: 120px">
                        <col style="width: 120px">
                        
                    </colgroup>
                    <tr>
                        <th class="tg-lboi">Producto</th>
                        <th class="tg-lboi">Quitar Producto</th>
                       
                       
                    </tr>

            <?php
            /*SUM(columna) AND carrit_id = mh_carrito_cabc_carrit_id*/
                $sql = "SELECT
                `mh_carrito_detalle`.`mh_carrito_cabc_carrit_id`,
                `mh_carrito_cabc`.`carrit_id`,
                `mh_products`.`prod_nombre`,
                `mh_products_prod_id`,
                `carrit_det_id`
            FROM
                `mh_carrito_detalle`
            LEFT JOIN `mh_carrito_cabc` ON `mh_carrito_detalle`.`mh_carrito_cabc_carrit_id` = `mh_carrito_cabc`.`carrit_id`
            LEFT JOIN `mh_products` ON `mh_carrito_detalle`.`mh_products_prod_id` = `mh_products`.`prod_id`
            WHERE
                mh_persons_per_id = $codigo AND mh_products_prod_id = $idProducto";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["prod_nombre"] . "</td>";
                            echo "<td class='accion'><a href='modificarDetalleCarrito.php?idProducto=" . $row['mh_products_prod_id'] ."&carritD=" . $row['carrit_det_id'] . "&codigo=". $codigo. "'>Eliminar</a></td>";
                         

                        
                    }
                }
                $conn->close();
            ?>
        </table> 
    </div>
 
</body>

</html>