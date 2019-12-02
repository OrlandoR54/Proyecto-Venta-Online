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
    <title>Mis Facturas</title>
    
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
   
    $codigo = $_GET["codigo"];

   
    ?>
    <header class="header">
        <nav>
            <ul> <li><a href="index.php?codigo=<?php echo $per_id ?>">Inicio</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
            
        <colgroup>
                    <col style="width: 100px">
                    <col style="width: 100px">
                    <col style="width: 100px">
                    <col style="width: 100px">
                 </colgroup>
                    <tr>
                    <th class="tg-lboi">Numero de factura:</th>
                    <th class="tg-lboi">Fecha de venta:</th>
                    <th class="tg-lboi">Total de la factura:</th>
                    <th class="tg-lboi">Accion:</th>
                    </tr>

                    
                    <?php
     
            include '../../../config/conexionBD.php';
          
            $sql = "SELECT * FROM mh_fact_cabec_vent WHERE mh_persons_per_id ='$codigo'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["fc_vent_estado"] = 'F') {
                        echo "<tr>";
                        echo "<td>" . $row["fc_vent_id"] . "</td>";
                        echo "<td>" . $row["fc_fecha_vent"] . "</td>";
                        echo "<td>" . $row["fc_vent_total"] . "</td>";
                        echo "<td class='accion'><a href='verFactura.php?codigo=" . $row['mh_persons_per_id'] . "'>Modificar</a></td>";
                       
                    }
                }
            } else {
                echo "<tr>";
                echo "<td colspan='9'>No existen usuarios registrados en el sistema</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
</body>

</html>