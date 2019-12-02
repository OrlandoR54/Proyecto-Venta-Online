<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    
}
?>
<!DOCTYPE html>
<html>

<?php
include '../../config/conexionBD.php';
//$per_id = $_GET['per_id'];
//$rol_user=$_GET['rol_user'];
$codigo=$_GET["codigo"];
?>

<head>
    <meta charset="UTF-8">
    <title>Pagina principal administrador</title> 
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/structure.css">
</head>

<body>
    <header class="header">
        <nav>
    
            <ul>
                <li><a href="index.php?codigo=<?php echo $codigo ?>">Inicio</a></li>
                <li><a href="../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>">Mi cuenta</a></li>
                <li><a href="GestionProductos/gestion_productos.php?codigo=<?php echo $codigo ?>">Gestionar Productos</a></li>
                <li><a href="../../config/Cerrar_Sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
   
</body>

</html>