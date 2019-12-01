<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Cambiar Contrasena</title>
            <link rel="stylesheet" href="../../css/modificaUser.css">
        </head>
        <body>
            <?php
                $rol_admin = $_GET["rol_admin"];
                $codigo = $_GET["codigo"];
            ?>
            
            <form class="box" method="POST" action="../../Private/Controlador/modificar_contrasena_user.php?rol_admin=<?php echo $rol_admin ?>">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">
                <div class="inf">
                    <label class="contrasena" for="contrasenaNueva">Contrasena Nueva (*)</label>
                    <input class="txtUser" type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contrasena nueva...">
                </div>
                <br>
                <div class= "botones">
                    <input class="boton" type="submit" id="modificar" name="modificar" value="Modificar">
                    <input class="boton" type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../Private/Controlador/gestion_user.php?rol_admin=<?php echo $rol_admin ?>'" class="boton">
                </div>
            </form>
        </body>
    </html>
