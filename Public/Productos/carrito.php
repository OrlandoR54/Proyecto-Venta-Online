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
        <title>Pagina principal administrador</title>
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
            <a href="#home" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="index.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Inicio</a>
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
                    <h1>Carrito de compras </h1>
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
                   
                    </colgroup>
                    <tr>
                        <th class="tg-lboi">Producto</th>
                        <th class="tg-lboi">Subtotal</th>
                       
                    </tr>

            <?php
            /*SUM(columna)*/
            $sql = "SELECT prod_nombre,SUM(carri_subt) FROM mh_carrito_cabc, mh_carrito_detalle,mh_products WHERE mh_persons_per_id=$codigo
             and carrit_id=mh_carrito_cabc_carrit_id and mh_products_prod_id=prod_id and mh_products_prod_id=mh_products_prod_id GROUP BY prod_nombre";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["prod_nombre"] . "</td>";
                        echo "<td>" . $row["SUM(carri_subt)"] . "</td>";
  
                }
            } else {
                echo "<tr>";
                echo "<td colspan='10'>No existen usuarios</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>   

            </div>
            <!----Final--->
        </div>
    </div>


    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "20%";
            document.getElementById("mySidebar").style.width = "20%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }
        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }
    </script>
        
   
</body>

</html>