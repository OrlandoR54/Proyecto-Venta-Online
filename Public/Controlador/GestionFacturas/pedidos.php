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
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/structure.css">
    <link rel="stylesheet" href="../../../css/catalogo.css">
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
   
    $codigo = $_GET["codigo"];

   
    ?>

    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="../indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="../indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Home</a>
                <a href="../../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Mi Cuenta</a>
                <a href="../../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------------------->


    <header class="header">
        <h1>Mis Facturas</h1>
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
     
 
          
                $sql = "SELECT * FROM mh_fact_cabec_vent WHERE mh_persons_per_id ='$codigo' and fc_vent_estado='A'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    
                        echo "<tr>";
                        echo "<td>" . $row["fc_vent_id"] . "</td>";
                        echo "<td>" . $row["fc_fecha_vent"] . "</td>";
                        echo "<td>" . $row["fc_vent_total"] . "</td>";
                        echo "<td class='accion'><a href='verFactura.php?codigo=" . $row['mh_persons_per_id'] . "'>Modificar</a></td>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='4'>No existen facturas</td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </table>
</body>

</html>