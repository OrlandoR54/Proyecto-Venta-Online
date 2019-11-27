<?php
    session_start();
    
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["usuario"]) ? trim($_POST["password"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM mh_persons WHERE per_correo = '$usuario' and per_password = MD5('$contrasena')";
    $result = $conn->query($sql);
    //Una vez verificado el correo y contrasena se inica una sesion y dependiendo del rol del usuario se envia a su index.html correspondiente
    if ($result->num_rows > 0 ){
        $_SESSION['isLogged']=TRUE;
        while($row = $result->fetch_assoc()){
            $codigo = $row["per_rol"];
            if ($row["rol_usu_codigo"]=='A'){
                header("Location: ../../Vista/admin/index.php?codigo_admin=".$row['per_rol']);
            }else{
                header("Location: ../../Vista/admin/index.php?codigo_admin=".$row['per_rol']);
            }
        }
    }else{
        header("Location: ../Vista/login.html");
    }
    $conn->close();
