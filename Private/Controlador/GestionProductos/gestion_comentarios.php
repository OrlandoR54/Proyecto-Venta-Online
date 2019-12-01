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
    <title>Gestion de Comentarios</title>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/structure.css">
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $rol_admin = $_GET["rol_admin"];
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


    
    <main class="mainTabla">
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
        <colgroup>
                    <col style="width: 105px">
                    <col style="width: 120px">
                    <col style="width: 130px">
                    <col style="width: 150px">
                    <col style="width: 121px">
                    <col style="width: 250px">
                    <col style="width: 106px">
                    <col style="width: 100px">
                    <col style="width: 100px">
                  
                   
        </colgroup>
                    <tr>
                        <th class="tg-lboi">Usuario</th>
                        <th class="tg-lboi">Producto</th>
                        <th class="tg-lboi">Comentario</th>
                        <th class="tg-lboi">Calificacion</th>
                        <th class="tg-lboi">Accion:</th>
                        
                        
                    </tr>

            <?php
            /*SELECT per_nombre, prod_nombre, com_comentario, com_calificacion FROM `mh_comentarios`,`mh_persons`,
            `mh_products` WHERE mh_products_prod_id=prod_id and mh_persons_per_id=per_id*/

           /* SELECT column_name(s)
                FROM table1
                JOIN table2
                ON table1.column_name=table2.column_name;*/
                
            $sql = "SELECT per_nombre, prod_nombre, com_comentario, com_calificacion, com_id FROM mh_comentarios, mh_persons JOIN mh_products
             WHERE mh_products_prod_id=prod_id and mh_persons_per_id=per_id and com_eliminado='N'"  ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["com_eliminado"] = 'N') {

                      echo "<tr>";
                      echo "<td>" .$row["per_nombre"] . "</td>";
                      echo "<td>" . $row["prod_nombre"] . "</td>";
                      echo "<td>" . $row["com_comentario"] . "</td>";
                      echo "<td>" . $row["com_calificacion"] . "</td>";
                      echo "<td class='accion'><a href='../../../Public/Controlador/eliminarComentarios.php?codigo=" . $row['com_id'] . "&rol_admin=" . $rol_admin . "'>Eliminar</a></td>";
                     
                    }
                }
            } else {
                echo "<tr>";
                echo "<td colspan='10'>No existen Comentarios</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
    </main>
</body>

</html>