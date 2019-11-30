<?php
if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        include '../../../Config/conexionBD.php';
        
        
        //Insertar imagen en la base de datos
        $sql = "INSERT into mh_products (prod_id ,prod_nombre, prod_descripcion ,prod_img, prod_precio_compra, 
        pro_precio_venta, prod_stock, prod_fecha_venc, mh_provs_prov_id) 
        VALUES (0, 'prueba', 'prueba', '$imgContenido', '3.15', '3.15', '10', '12/12/1998', '1' )";
        // COndicional para verificar la subida del fichero
        if($conn->query($sql) == TRUE){
            echo "Archivo Subido Correctamente.";
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}
?>