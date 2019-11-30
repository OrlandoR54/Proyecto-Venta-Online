<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    
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
    <title>Pagina principal administrador</title>
    
</head>

<body>
<?php
include '../../config/conexionBD.php';
$rol_admin = $_GET['rol_admin'];
?>

    <header class="header">
        <nav>
            <ul>
                <li><a href="index.php?rol_admin=<?php echo $rol_admin ?>">Inicio</a></li>
                <li><a href="gestion_user.php?rol_admin=<?php echo $rol_admin ?>">Usuarios</a></li>
                <li><a href="../../config/Cerrar_Sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        </section>
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
                        echo "<td class='accion'><a href='eliminar.php?codigo=" . $row['per_id'] . "&rol_admin=" . $rol_admin . "'>Eliminar</a></td>";
                        echo "<td class='accion'><a href='modificar.php?codigo=" . $row['per_id'] . "&rol_admin=" . $rol_admin . "'>Modificar</a></td>";
                        echo "<td class='accion'><a href='cambiar_contrasena.php?codigo=" . $row['per_id'] . "&rol_admin=" . $rol_admin . "'>Cambiar contrasena</a></td>";
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
   
</body>

</html>