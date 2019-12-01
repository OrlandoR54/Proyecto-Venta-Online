<?php
    session_start();
    
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $contrasena = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $sql = "SELECT * FROM mh_persons WHERE per_correo = '$usuario' and per_password = MD5('$contrasena')";
    $result = $conn->query($sql);
    //Una vez verificado el correo y contrasena se inica una sesion y dependiendo del rol del usuario se envia a su index.html correspondiente
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ){
        $_SESSION['isLogged']=TRUE;
        while($row = $result->fetch_assoc()){
            $rol = $row["per_rol"];
            if ($row["per_rol"]=='A'){
               header("Location: ../../Private/Controlador/index.php?rol_admin=".$row["per_rol"]);
                echo "<p>INGRESO ADMIN!!!</p>";
            }else{
                header("Location: ../../Public/Controlador/indexUser.php?rol_user=".$row["per_rol"]);
                echo "<p>Ingreso user!!!</p>";
            }
        }
    }else{
        header("Location: ../Vista/login.html");
    }
    $conn->close();
       
 ?>