<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");  
}
if($_SESSION["per_rol"]!='A'){
    header("Location:../../Public/Controlador/login.php ");  
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
    <link rel="stylesheet" href="../../css/catalogo.css">
</head>

<body>

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
                    <h1>Bienvenido</h1>
                    <h2>Usuario Administrador</h2>
                </div>
            </div>

            <!--Comienzo-->
            <div class="w3-container" id="aceite">
                <!--  <div class="w3-container w3-text-grey" id="jeans">
                    <p> </p>
                </div> -->

                   


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