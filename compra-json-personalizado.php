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
        $query = "UPDATE solicitud_producto_personalizado SET cantidad = '$_POST[cantidad]' WHERE producto_id = '$_POST[producto_id]'";
        $conn->query($query);
        header("Location: carrito.php");
    }
        
    if(isset($_GET['b']) && $_GET['b']=='carrito-personalizado'){
        //consulta para las compras del usuario
        $q="SELECT * FROM solicitud_producto_personalizado WHERE cliente = '$_SESSION[user_id]' ";
        //mete la consula que esta en el objeto de conexión en la variable $r
        $r=$conn->query($q);
        $data=array();
        while ($row = $r->fetch_assoc()){
            $data[]=$row;
        }
        //echo "<pre>",print_r($data,1),"</pre>";
        echo json_encode($data);
    }
?>