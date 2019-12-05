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
        <title>Confirmar Pago</title>
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
                <button type="button"  onclick = "location='AgregarTarjeta.php?codigo=<?php echo $codigo ?>&value=5'">AgregarTarjeta</button>
                <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
                    <colgroup>
                        <col style="width: 105px">
                        <col style="width: 120px">
                        <col style="width: 120px">
                        <col style="width: 120px">
                   
                    </colgroup>
                    <tr>
                        <th class="tg-lboi">Titular</th>
                        <th class="tg-lboi">Estado de la tarjeta</th>
                        <th class="tg-lboi">Accion</th>
                       
                       
                    </tr>

            <?php
            /*SUM(columna)*/
            $sql = "SELECT trajet_nomb_titular, tar_estado
             FROM mh_tarjet_credit ,mh_persons 
             WHERE mh_persons_per_id=$codigo 
             GROUP BY trajet_nomb_titular";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["trajet_nomb_titular"] . "</td>";
                        echo "<td>" . $row["tar_estado"] . "</td>";
                        echo "<td class='accion'><a href='Pagar.php?codigo=" . $codigo . "'>Pagar</a></td>";
                }
            }
            else{
                echo"Usted no tiene ninguna tarjeta registrada";
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