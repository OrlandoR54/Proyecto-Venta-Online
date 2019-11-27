<?php
    session_start();
    
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM mh_persons WHERE per_correo = '$usuario' and per_password = MD5('$contrasena')";
    $result = $conn->query($sql);
    //Una vez verificado el correo y contrasena se inica una sesion y dependiendo del rol del usuario se envia a su index.html correspondiente
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) 
    {
         $_SESSION['isLogged'] = TRUE; 
         header("Location: ../Vista/about.html");
     
     } else 
         { 
              header("Location: ../Vista/about.html"); 
         } 
         
  $conn->close(); 
         
 ?>