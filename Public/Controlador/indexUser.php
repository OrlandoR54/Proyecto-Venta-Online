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
$rol_user = $_GET['rol_user'];
?>

<head>
    <meta charset="UTF-8">
    <title>Pagina principal administrador</title>
    
</head>

<body>
    <header class="header">
        <nav>
            <ul>
                <li><a href="index.php?rol_user=<?php echo $rol_user ?>">Inicio</a></li>
                <li><a href="gestion_user.php?rol_user=<?php echo $rol_user ?>">Gestionar Usuarios</a></li>
                <li><a href="GestionProductos/gestion_productos.php?rol_user=<?php echo $rol_user ?>">Gestionar Productos</a></li>
                <li><a href="../../config/Cerrar_Sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
   
</body>

</html>