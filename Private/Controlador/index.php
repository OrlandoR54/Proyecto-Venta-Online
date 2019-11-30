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
$rol_admin = $_GET['rol_admin'];
?>

<head>
    <meta charset="UTF-8">
    <title>Pagina principal administrador</title>
    
</head>

<body>
    <header class="header">
        <nav>
            <ul>
                <li><a href="index.php?rol_admin=<?php echo $rol_admin ?>">Inicio</a></li>
                <li><a href="usuarios.php?codigo_admin=<?php echo $codigo_admin ?>">Usuarios</a></li>
                <li><a href="../../config/Cerrar_Sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
   
</body>

</html>