<?php
$estado = $_POST["list"];
$codigo = $_GET["codigo"];
include '../../config/conexionBD.php';


$sql = "UPDATE mh_fact_cabec_vent SET fc_vent_estado = '$estado' WHERE fc_vent_id = '$codigo';";
if ($conn->query($sql) === TRUE) {
echo "Se ha actualizado los datos personales correctamemte!!!<br>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
}
echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
header("Location:index.php?rol_admin=A");
$conn->close();
?>