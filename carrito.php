<?php
    include('header.php');
    if(!$_SESSION['user_id']){
        $_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        header("Location: index.php");
    }
        
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Realiza la inserción en la base de datos
        $query="INSERT INTO compras (id,cliente,codigo,producto_id,nombre, precio,cantidad,fecha) VALUES (NULL,'$_POST[cliente]','$_POST[codigo]','$_POST[producto_id]','$_POST[nombre]','$_POST[precio]', '$_POST[cantidad]',NOW())";
        $conn->query($query); 
        $ID=$conn->insert_id;
    
        // Devuelve la respuesta en formato JSON
         json_encode($response);
    }
    if(isset($_GET['idElm']) && $_GET['idElm']<>""){
        $query="DELETE FROM compras WHERE id='$_GET[idElm]'";
        $conn->query($query);
        
        // Devuelve la respuesta en formato JSON
         json_encode($response);
    }
    
?>
    <main>
        <!--Migas de pan-->
        <nav class="container mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none migas" href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">Cesta</span></li>
            </ol>
        </nav>
        <!--Migas de pan-->

        <section class="container mt-5 mb-5">
            <div id="carritoJson" class="row fondo-carrito"></div>
            <div class="row mt-5">
                <p id="totalPrecio" class="fw-bold"></p>
                <div class="col-md-12">
                    <a href="checkout.php" class="ver-mas pe-5 ps-5 pt-2 pb-2">Finalizar compra</a>
                </div>
            </div>
        </section>
    </main>
<?php include('footer.php'); ?>