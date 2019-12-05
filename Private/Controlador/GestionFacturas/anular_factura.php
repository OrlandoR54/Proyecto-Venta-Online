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
        <link rel="stylesheet" href="../../../css/styles.css">
        <link rel="stylesheet" href="../../../css/structure.css">
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
    include '../../../config/conexionBD.php';
$rol_admin = $_GET['rol_admin'];
$codigo =$_GET['codigo'];
?>
    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="#home" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="../index.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Inicio</a>
                <a href="../gestion_user.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Gestionar Usuarios</a>
                <a href="GestionProductos/gestion_productos.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Gestionar Productos</a>
                <a href="../../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>


    <main class="main">
        </section>
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
        <div>
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
                    <th class="tg-lboi">Nombre</th>
                    <th class="tg-lboi">Apellido</th>
                    <th class="tg-lboi">Fecha Venta</th>
                    <th class="tg-lboi">Iva</th>
                    <th class="tg-lboi">Total</th>
                    </tr>
        </div>
            <?php

            $sql = "SELECT * FROM mh_persons,mh_fact_cabec_vent WHERE mh_persons.per_id=mh_fact_cabec_vent.mh_persons_per_id and fc_vent_id='$codigo'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["per_nombre"] . "</td>";
                        echo "<td>" . $row["per_apellido"] . "</td>";
                        echo "<td>" . $row["fc_fecha_vent"] . "</td>";
                        echo "<td>" . $row["fc_vent_iva"] . "</td>";
                        echo "<td>" . $row["fc_vent_total"] . "</td>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='10'>No existen usuarios</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
        <form  method="POST" action="factura_anulada.php?codigo=<?php echo $codigo ?>?rol_admin=<?php echo $rol_admin ?>" >
        <div class= "botones">
                    <input class="boton" type="submit" id="eliminar" name="eliminar" value="Anular"  >
                    <input class="boton" type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='gestion_factura.php?rol_admin=<?php echo $rol_admin ?>'" class="boton">
                </div>
                </form>
</body>

</html>