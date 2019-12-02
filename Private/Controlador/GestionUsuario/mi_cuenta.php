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
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="../../../css/structure.css">
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
   
    $codigo = $_GET["codigo"];

    ?>

  <!-- Barra navegador (acentada arriba) -->
  <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="../../Public/Vista/index.html" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="../index.php?codigo=<?php echo $per_id ?>" class="barraItem boton">Inicio</a>
                <a href="../../../config/cerrar_sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>

    <main class="main">
        <table id="buzon" class="tg" style="undefined;table-layout: fixed; width: 1062px">
            
        <colgroup>
                    <col style="width: 204px">
                    <col style="width: 164px">
                    <col style="width: 130px">
                    <col style="width: 150px">
                    <col style="width: 121px">
                    <col style="width: 82px">
                    <col style="width: 106px">
                    <col style="width: 105px">
                    <col style="width: 105px">
                 </colgroup>
                    <tr>
                    <th class="tg-lboi">Cedula</th>
                    <th class="tg-lboi">Nombres</th>
                    <th class="tg-lboi">Apellidos</th>
                    <th class="tg-lboi">Direccion</th>
                    <th class="tg-lboi">Telefono</th>
                    <th class="tg-lboi">Correo</th>
                    <th class="tg-lboi">Fecha Nacimiento</th>
                    <th class="tg-lboi">Modificar</th>
                    <th class="tg-lboi">Cambiar contrasena</th>
                    </tr>

                    
                    <?php
     
            include '../../../config/conexionBD.php';
          
            $sql = "SELECT * FROM mh_persons WHERE per_id='$codigo'";
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
                        echo "<td class='accion'><a href='../../../Public/Controlador/GestionUsuario/modificarUsuario.php?codigo=" . $row['per_id'] . "'>Modificar</a></td>";
                        echo "<td class='accion'><a href='../../../Public/Controlador/GestionUsuario/modificarContrasenia.php?codigo=" . $row['per_id'] . "'>Cambiar contraseña</a></td>";
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