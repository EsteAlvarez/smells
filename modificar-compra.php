<?php
    require('conexion.php');
    if(!isset($_SESSION))session_start();
    if(!$_SESSION['user_id']){
        $_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        header("Location: index.php");
    }
    
    // Verifica si la solicitud es un POST
    if(isset($_POST['modificar']) && $_POST['modificar']=="modificar"){
        // Actualiza la cantidad en la tabla de compras
        $query = "UPDATE compras SET cantidad = '$_POST[cantidad]' WHERE id = '$_POST[compraId]'";
        $conn->query($query);
        header("Location: carrito.php");
    }
      
?>