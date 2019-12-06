<?php
    session_start();
    $_SESSION['isLogged'] = FALSE;
    session_destroy();
    header("Location: Proyecto-Venta-Online/Public/Vista/login.html");
?>