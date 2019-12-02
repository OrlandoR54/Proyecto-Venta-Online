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
                <a href="indexUser.php?rol_user=<?php echo $rol_user ?>" class="barraItem boton">Inicio</a>
                <a href="gestion_user.php?rol_user=<?php echo $rol_user ?>" class="barraItem boton">Gestionar Pedidos</a>
                <a href="GestionProductos/gestion_productos.php?rol_user=<?php echo $rol_user ?>" class="barraItem boton">Gestionar Facturas</a>
                <a href="Public/Controlador/modificarUser.php?rol_user=<?php echo $rol_user ?>" class="barraItem boton">Gestionar Cuenta</a>
                <a href="../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
            </div>
        </div>
    </div>

    <center>
        <div>

            <h1>Bienvenido</h1>
            <h2>Usuario Registrado</h2>
        </div>
    </center>

   
</body>

</html>