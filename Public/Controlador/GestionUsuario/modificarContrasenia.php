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
            <link rel="stylesheet" href="../../../css/modificaUser.css">
        </head>
        <body>
            <?php
                $codigo = $_GET["codigo"];
            ?>
            
            <form class="box" method="POST" action="../../../Private/Controlador/GestionUsuario/modificar_contrasenia.php?codigo=<?php echo $codigo ?>">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">
                <div class="inf">
                    <label class="modificar" for="contrasenaNueva">Contrasena Nueva (*)</label>
                    <input class="txtUser" type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contrasena nueva...">
                </div>
                <br>
                <div class= "botones">
                    <input class="boton" type="submit" id="modificar" name="modificar" value="Modificar">
                    <input class="boton" type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='../../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>'" class="boton">
                </div>
            </form>
        </body>
    </html>
