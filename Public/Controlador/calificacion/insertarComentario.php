<?php
include '../../../config/conexionBD.php';
$comentario = isset($_POST["comentario"]) ? trim($_POST["comentario"]) : null;
$calificacion = isset($_POST["calificacion"]) ? trim($_POST["calificacion"]) : null;
$codigoProducto = $_GET["codigoProdcuto"];
$CP = isset($_GET["codigoPersona"]) ? trim($_GET["codigoPersona"]) : null;
echo $codigoProducto;
echo $CP;
$sql = "INSERT INTO mh_comentarios (com_id,com_comentario,com_calificacion,mh_products_prod_id,mh_persons_per_id) VALUES('0', '$comentario', '$calificacion', '$codigoProducto', '$CP');";
if ($conn->query($sql) === TRUE) {
    echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
} else {
    if($conn->errno == 1062){
    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
    }else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
    }


    
    header("Location:../catalogoUser.php?codigo=" . $CP . "");
?>