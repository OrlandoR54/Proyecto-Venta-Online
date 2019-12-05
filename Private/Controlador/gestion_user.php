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
$rol_admin = $_GET['rol_admin'];
?>


    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="index.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
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
                    <h1>Bienvenido </h1>
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
                        <th class="tg-lboi">Cedula</th>
                        <th class="tg-lboi">Nombres</th>
                        <th class="tg-lboi">Apellidos</th>
                        <th class="tg-lboi">Direccion</th>
                        <th class="tg-lboi">Telefono</th>
                        <th class="tg-lboi">Correo</th>
                        <th class="tg-lboi">Fecha de Nacimiento</th>
                        <th class="tg-lboi">Accion:</th>
                        <th class="tg-lboi">Accion:</th>
                        <th class="tg-lboi">Accion:</th>
                    </tr>

            <?php

            $sql = "SELECT * FROM mh_persons WHERE per_rol='U'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["per_eliminado"] != 'S') {
                        echo "<tr>";
                        echo "<td>" . $row["per_num_ced"] . "</td>";
                        echo "<td>" . $row["per_nombre"] . "</td>";
                        echo "<td>" . $row["per_apellido"] . "</td>";
                        echo "<td>" . $row["per_direccion"] . "</td>";
                        echo "<td>" . $row["per_telefono"] . "</td>";
                        echo "<td>" . $row["per_correo"] . "</td>";
                        echo "<td>" . $row["per_fechaNacimiento"] . "</td>";
                        echo "<td class='accion'><a href='../../Public/Controlador/eliminarUser.php?codigo=" . $row['per_id'] . "&rol_admin=" . $rol_admin . "'>Eliminar</a></td>";
                        echo "<td class='accion'><a href='../../Public/Controlador/modificarUser.php?codigo=" . $row['per_id'] . "&rol_admin=" . $rol_admin . "'>Modificar</a></td>";
                        echo "<td class='accion'><a href=../../Public/Controlador/modificarContraseniaUser.php?codigo=" . $row['per_id'] . "&rol_admin=" . $rol_admin . "'>Cambiar contrasena</a></td>";
                    }
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