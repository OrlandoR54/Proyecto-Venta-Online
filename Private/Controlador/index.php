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
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/structure.css">
</head>

<body>

    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="../../Public/Vista/index.html" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="index.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Inicio</a>
                <a href="gestion_user.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Gestionar Usuarios</a>
                <a href="GestionProductos/gestion_productos.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Gestionar Productos</a>
                <a href="envios.php?rol_admin=<?php echo $rol_admin ?>"class="barraItem boton" >Gestion Pedidos</a>

                <a href="GestionProductos/gestion_comentarios.php?rol_admin=<?php echo $rol_admin ?>" class="barraItem boton">Gestionar Comentarios</a>
                <a href="../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>

    <center>
        <div>
            <h1>Bienvenido</h1>
            <h2>Usuario Administrador</h2>
        </div>
    </center>

   
</body>

</html>