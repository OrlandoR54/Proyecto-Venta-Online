<?php
$db_servername = "localhost";
$db_username = "root";
$db_userpassword = "";
$db_name = "hipermedialproyecto";

$conn = new mysqli($db_servername,$db_username,$db_userpassword,$db_name);
$conn->set_charset("utf8");

if($conn->connect_error){

    die("connnection falied ".$conn->connect_error);

}else{
   echo "<p> Conexion exitosa!</p>";
}
