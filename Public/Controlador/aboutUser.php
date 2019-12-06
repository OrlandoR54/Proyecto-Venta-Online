<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acerca de nosotros</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/structure.css">
    <link rel="stylesheet" href="../../css/acerca.css">
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
                <!-- <marquee behavior="slide" direction="right" scrollamount=”3″ loop=1 scrolldelay="2" > -->
                <a href="indexUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Home</a>
                <a href="catalogoUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Productos</a>
                <a href="aboutUser.php?codigo=<?php echo $codigo ?>" class="barraItem boton">About</a>
                <a href="../../Private/Controlador/GestionUsuario/mi_cuenta.php?codigo=<?php echo $codigo ?>" class="barraItem boton">Mi Cuenta</a>
                <a href="../../config/Cerrar_Sesion.php" class="barraItem boton">&#128682;Cerrar Sesion</a>
                <a href="../Productos/carrito.php?codigo=<?php echo $codigo ?>"><i class="carro-compras carro-derecha"></i></a>
                </marquee>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="w3-twothird">
        <div class="contenedor relleno-32 cont-inf card w3-margin-bottom">
            <h3 class="borde-inferior color-borde relleno-16">MISION:</h3>
            <p>Brindarles a la comunidad productos con los mejores estándares mundiales en calidad y economía. Somos una
                empresa agro industrial con un talento humano competente, calificado, dedicado al cultivo de cannabis
                para fines medicinales, nos dedicamos a la extracción y comercialización del aceite de cannabis con alto
                contenidos en CBD el cual les ofrecerá a las personas para el tratamiento con enfermedades paliativas.
            </p>
            <div>
                <center><img src="../../images/mision.png" alt="mision"> </center>
            </div>
        </div>
    </div>
    <div class="w3-twothird">
        <div class="contenedor relleno-32 cont-inf card w3-margin-bottom">
            <h3 class="borde-inferior color-borde relleno-16">VISION:</h3>
            <p>Ser una empresa líder y con gran reconocimiento a nivel nacional e internacional por la calidad de sus
                productos en el sector medicinal. Que además contribuya socialmente y de forma innovadora con la salud
                pública.

                Crear un ambiente en el que nuestro personal de trabajo será la base fundamental, en el que buscamos
                tener un equipo humano con gran sentido de pertenencia, motivados a entregar su máximo potencial al
                trabajo investigativo en función a mejorar la calidad de vida de otras personas. Ser una empresa con la
                capacidad de alcanzar los retos que el mercado y las circunstancias nos ofrezcan con una estructura
                dinámica que promueva la innovación en pro al mejoramiento siempre de la calidad de vida de las personas
                a quienes van dirigidos nuestro trabajo.
            </p>
            <div>
                <center><img src="../../images/vision.png" alt="mision"> </center>
            </div>
        </div>
    </div>


    <div class="w3-row-padding" id="contacto">
        <div class="w3-col s4 margen">
            <h4>Contactanos</h4>
            <p>Preguntas? Adelnate.</p>
            <form action="" target="_blank">
                <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
                <p><input class="w3-input w3-border" type="email" placeholder="Email" name="Email" required></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
                <button type="submit" class="w3-button w3-block w3-black">Enviar</button>
            </form>
        </div>

        <div class="w3-col s4 w3-justify">
            <h4>Tienda</h4>
            <p><i class="fa fa-fw fa-map-marker">&#9967;</i> Cannabidiol</p>
            <p><i class="fa fa-fw fa-phone">&#9990;</i><a href="tel:+593987576201" id="telf"> (+593) 98 757 6201</a>
            </p>
            <p><i class="fa fa-fw fa-envelope">&#9993; </i> <a href="mailto:medicjuana@facebook.com" id="email">
                    medicjuana@facebook.com</a></p>
            <p><i class="fa fa-fw fa-map-marker">&#128506;</i> Cuenca, Ecuador</p>
            <h4>Aceptamos</h4>
            <p><i class="fa fa-fw fa-credit-card">&#128179;</i> Tarjeta de Credito</p>
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
</body>

</html>