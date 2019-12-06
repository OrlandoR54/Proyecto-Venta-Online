<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: \Proyecto-Venta-Online\Public\Vista\login.html");
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalogo</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/structure.css">
    <link rel="stylesheet" href="../../css/catalogo.css">
</head>

<body>
   
    <?php
        include '../../config/conexionBD.php';
   
        $codigo = $_GET["codigo"];
      


    ?>

    <!-- Barra navegador (acentada arriba) -->
    <div class="cabecera">
        <div class="barra cabColor espAmplio margRelleno sombra">
            <a href="indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton"><b>CBD</b> Cannabidiol</a>
            <!-- enlaces flotantes a la derecha. Econdiendoles en una pantallas pequeñas -->
            <div class="derecha">
                <a href="indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Home</a>
                <a href="catalogoUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Productos</a>
                <a href="aboutUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">About</a>
                <a href="../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Mi Cuenta</a>
                <a href="../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
                <a href="../Productos/carrito.php?codigo=<?php echo $codigo ?>"><i class="carro-compras carro-derecha"></i></a>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------------------------------------------------->


    <!--------------------------------------------------------------------------------------------------->
    <div class="seccion" >
        <div class="barra-lateral barra-block barra-card w3-animate-left" style="display:none" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
            <a href="#aceite" class="w3-bar-item w3-button">Aceite de CBD</a>
            <a href="#pomadas" class="w3-bar-item w3-button">Cremas</a>
            <a href="#" class="w3-bar-item w3-button">Mantequilla</a>
        </div>

        <div id="main">

            <div class="w3-teal">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>Productos Cannabidiol</h1>
                </div>
            </div>

            <!----- Imagen Cabecera ----->
            <div class="w3-display-container w3-container">
                <img src="../../images/slider - Bottles.jpg" alt="Botellas CBD" style="width:100%">
                <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
                    <h1 class="w3-jumbo w3-hide-small color"> <br> New arrivals</h1>
                    <h1 class="w3-hide-small color">PRODUCTOS 2019</h1>
                    <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">COMPRAR AHORA</a></p>
                </div>
            </div>

            <div class="w3-container" id="aceite">
                <div class="w3-container w3-text-grey" id="jeans">
                    <p>Aceite de CBD</p>
                </div>

                <!-- 1er Cuadricula de Productos -->
                <div class="w3-row w3-grayscale">
                    <div class="w3-col l3 s6">
                        <div class="w3-container  tam">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=2&codigoPersona=<?php echo $codigo ?>"><img class="produc"
                                        src="../../images/aceite-de-cbd-10-full-spectrum.jpg" style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=2'" class="w3-button w3-black" value=''>Agregar <i
                                            class="fa carro-compras"></i></button>         
                                </div>
                            </div>
                            <p>Aceite de CBD 10% (FULL SPECTRUM)<br><b>$30</b></p>
                        </div>
                        <div class="w3-container">
                            <div class="w3-display-container">
                                
                                <a href="calificacion/calificacion.php?codigo=5&codigoPersona=<?php echo $codigo ?>"><img class="produc"
                                        src="../../images/aceite-de-cbd-5-full-spectrum.jpg" style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=5'" class="w3-button w3-black" value=''>Agregar <i
                                            class="fa carro-compras"></i></button> 
                                </div>
                            </div>
                            <p>Aceite de CBD 5% (FULL SPECTRUM)<br><b>$15</b></p>
                        </div>
                    </div>

                    <div class="w3-col l3 s6 tam">
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=1&codigoPersona=<?php echo $codigo ?>"><img class="produc" src="../../images/aceitecbd-5.jpg"
                                        style="width:100%"></a>
                                <span class="w3-tag w3-display-topleft">New</span>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=1'" class="w3-button w3-black">Agregar<i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 5%<br><b>$30.99</b></p>
                        </div>
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=12&codigoPersona=<?php echo $codigo ?>"><img class="produc"
                                        src="../../images/Aceite_de_CBD_15_por_ciento_Sativida.jpg"
                                        style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit"  onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=12'" class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 15%<br><b>$35.50</b></p>
                        </div>
                    </div>

                    <div class="w3-col l3 s6 tam">
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=3&codigoPersona=<?php echo $codigo ?>"><img class="produc" src="../../images/aceite-cbd-xl.png"
                                        style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit"  onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=3'" class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 10ml<br><b>$20.50</b></p>
                        </div>
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=6&codigoPersona=<?php echo $codigo ?>"><img class="produc" src="../../images/Aceite-CBD-5.jpg"
                                        style="width:100%"></a>
                                <span class="w3-tag w3-display-topleft">Sale</span>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit"  onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=6'" class="w3-button w3-black">Agregar<i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 5% (Props)<br><b class="w3-text-red">$14.99</b></p>
                        </div>
                    </div>

                    <div class="w3-col l3 s6 tam">
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=4&codigoPersona=<?php echo $codigo ?>"><img class="produc" src="../../images/Aceite-CBD-5-500mg.jpg"
                                        style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=4'" class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 5% (Cannactiva)<br><b>$20</b></p>
                        </div>
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=7&codigoPersona=<?php echo $codigo ?>"><img class="produc" src="../../images/Aceite-CBD-2.5.jpg"
                                        style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=7'" class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 2.5% (Cannactiva)<br><b>$13.99</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!----Final de primera caudricula--->

            <div class="w3-container" id="pomadas">
                <div class="w3-container w3-text-grey" id="jeans">
                    <p>Pomadas de CBD</p>
                </div>

                <!-- 2da Cuadricula de Productos -->
                <div class="w3-row w3-grayscale">
                    <div class="w3-col l3 s6">
                        <div class="w3-container  tam">
                            <div class="w3-display-container">
                                <span class="w3-tag w3-display-topleft">New</span>
                                <a href="calificacion/calificacion.php?codigo=8&codigoPersona=<?php echo $codigo ?>"> <img class="produc" src="../../images/crema-cbd-forte.jpg"
                                        style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=8'" class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Crema Hidratante rica en CBD Volumen 100 ml<br><b>$30</b></p>
                            <!----ESTRELLAS---->
                            <form id="form">
                                <p class="clasificacion">
                                    <input class="star" id="radio1" type="radio" name="estrellas" value="5">
                                    <label for="radio1">★</label>
                                    <input class="star" id="radio2" type="radio" name="estrellas" value="4">
                                    <label for="radio2">★</label>
                                    <input class="star" id="radio3" type="radio" name="estrellas" value="3">
                                    <label for="radio3">★</label>
                                    <input class="star" id="radio4" type="radio" name="estrellas" value="2">
                                    <label for="radio4">★</label>
                                    <input class="star" id="radio5" type="radio" name="estrellas" value="1">
                                    <label for="radio5">★</label>
                                </p>
                            </form>
                            <!----Fin EStrellas---->
                        </div>

                        <!-- <div class="w3-container">
                            <div class="w3-display-container">
                                <img class="produc" src="../../images/Crema  CBD-Healing-Balm.jpg" style="width:100%">
                                <div class="w3-display-middle w3-display-hover">
                                    <button class="w3-button w3-black">Agregar <i class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Bálsamo Curativo de CBD (300mg. CBD)<br><b>$23.65</b></p>
                        </div> -->
                    </div>

                    <div class="w3-col l3 s6 tam">
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=9&codigoPersona=<?php echo $codigo ?>"><img class="produc"
                                        src="../../images/Crema  CBD-Healing-Balm.jpg" style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=9'" class="w3-button w3-black">Agregar<i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Bálsamo Curativo de CBD (300mg. CBD)<br><b>$23.65</b></p>
                        </div>
                        <!--  <div class="w3-container">
                            <div class="w3-display-container">
                                <img class="produc" src="../../images/quality-cbd-healing-balm.jpg" style="width:100%">
                                <div class="w3-display-middle w3-display-hover">
                                    <button class="w3-button w3-black">Agregar <i class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>CBD Pharma 10% Healing Balm - 30g<br><b>$30.20</b></p>
                        </div> -->
                    </div>

                    <div class="w3-col l3 s6 tam">
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=10&codigoPersona=<?php echo $codigo ?>"><img class="produc"
                                        src="../../images/quality-cbd-healing-balm.jpg" style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=10'" class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>CBD Pharma 10% Healing Balm - 30g<br><b>$30.20</b></p>
                        </div>
                        <!-- <div class="w3-container">
                            <div class="w3-display-container">
                                <img class="produc" src="../../images/Aceite-CBD-5.jpg" style="width:100%">
                                <span class="w3-tag w3-display-topleft">Sale</span>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" class="w3-button w3-black">Agregar<i class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 5%<br><b class="w3-text-red">$14.99</b></p>
                        </div> -->
                    </div>

                    <div class="w3-col l3 s6 tam">
                        <div class="w3-container">
                            <div class="w3-display-container">
                                <a href="calificacion/calificacion.php?codigo=11&codigoPerson=<?php echo $codigo ?>"><img class="produc"
                                        src="../../images/cream-500mg-cbd-hemp-pain.png" style="width:100%"></a>
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" onclick = "location='../Productos/addProductoCar.php?codigo=<?php echo $codigo ?>&value=11'"  class="w3-button w3-black">Agregar <i
                                            class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Crema para el alivio del dolor con extracto de CBD - 500MG<br><b>$10.65</b></p>
                        </div>
                        <!--    <div class="w3-container">
                            <div class="w3-display-container">
                                <img class="produc" src="../../images/Aceite-CBD-2.5.jpg" style="width:100%">
                                <div class="w3-display-middle w3-display-hover">
                                    <button type="submit" class="w3-button w3-black">Agregar <i class="fa carro-compras"></i></button>
                                </div>
                            </div>
                            <p>Aceite de CBD 2.5%<br><b>$13.99</b></p>
                        </div> -->
                    </div>
                </div>
            </div>
            <!----Final de segunda caudricula--->

        </div>
    </div>

    <!-- Pie de pagina -->
    <footer class="centro colLogo relleno-16">
        <div>
            &#8226; Cannabidiol &#8226;
        </div>
        <p><em>Copyright &copy; </em> <em> 2019 Todos los derechos reservados</em></p>
        <div class="iconos-sociales">
            <a href="https://www.facebook.com/hugo.zhindon.1" target="_blank"><img class="icono"
                    alt="Sígueme en Facebook" height="35" width="35"
                    src="https://2.bp.blogspot.com/-28mh2hZK3HE/XCrIxxSCW0I/AAAAAAAAH_M/XniFGT5c2lsaVNgf7UTbPufVmIkBPnWQQCLcBGAs/s1600/facebook.png"
                    title="Sígueme en Facebook" /></a>
            <a href="https://www.instagram.com/dailyart_viral/" target="_blank"><img class="icono"
                    alt="Sígueme en Facebook" height="35" width="35"
                    src="https://4.bp.blogspot.com/-Ilxti1UuUuI/XCrIy6hBAcI/AAAAAAAAH_k/QV5KbuB9p3QB064J08W2v-YRiuslTZnLgCLcBGAs/s1600/instagram.png"
                    title="Sígueme en Instagram" /></a>
            <a href="https://www.youtube.com/watch?v=apXnm90fpwo" target="_blank"><img class="icono"
                    alt="Sígueme en Facebook" height="35" width="35"
                    src="https://1.bp.blogspot.com/-CUKx1kAd-ls/XCrI4UAvNqI/AAAAAAAAIBI/-i1neUt8kZwP6YOsFOXX5p0Bnqa29m-JgCLcBGAs/s1600/youtube2.png"
                    title="Sígueme en YouTube" /></a>
        </div>
    </footer>

   


    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "25%";
            document.getElementById("mySidebar").style.width = "25%";
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