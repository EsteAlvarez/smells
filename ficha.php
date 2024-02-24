<?php include('header.php'); 
    // if(!$_SESSION['user_id']){
    //     $_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
    //     header("Location: index.php");
    // }
?>

<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
    $query = " SELECT * FROM productos WHERE id=$_GET[id]";
    $resource = $conn->query($query);
    $total = $resource->num_rows;
    $row = $resource->fetch_assoc();

    if ($total > 0 || $total < 0) { ?>

        <main>

            <!--Migas de pan-->
            <nav class="container mt-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none migas" href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold"><?php echo $row['nombre'];?></span></li>
                </ol>
            </nav>
            <!--Migas de pan-->

            <!--Sección ficha de producto-->
            <section class="container mt-5">
                <div class="row">
                    <h2 class="mb-3"><?php echo $row['nombre'] ?></h2>
                    <!--Imagenes del producto-->
                    <aside id="imagenes-lat" class="col-lg-1 col-md-2 col-12 d-flex flex-md-column flex-row">
                        <img id="lateral1" data-id="<?php echo $row['id'];?> "class="col-md-12 col-2 miniaturas-ficha m-2" src="assets/img/productos/frascos-secundarios/<?php echo $row['codigo_sec']; ?>.jpeg" alt="imagen de producto">
                        <img id="lateral2" data-id="<?php echo $row['id'];?> "class="col-md-12 col-2 miniaturas-ficha m-2" src="assets/img/productos/frascos-secundarios/<?php echo $row['codigo_ter']; ?>.jpeg" alt="imagen de producto">
                        <img id="lateral3" data-id="<?php echo $row['id'];?> "class="col-md-12 col-2 miniaturas-ficha m-2" src="assets/img/productos/frascos-secundarios/<?php echo $row['codigo_cuar']; ?>.jpeg" alt="imagen de producto">
                    </aside>
                    <img id="imagen-principal" class="col-12 col-lg-4 col-md-10 h-25 img-fluid"
                        src="assets/img/productos/frascos-principales/<?php echo $row['codigo'] ?>.jpeg"
                        alt="<?php echo $row['nombre'];?>">
                    <!--Imagenes del producto-->
              
                    <!--Datos del producto-->
                    <div class="col-lg-5 offset-lg-1 offset-0 col-md-12 fondo-ficha p-4 mt-lg-0 mt-3">
                        <h3>Detalles del producto</h3>
                        <!-- <p class="text-center"><?php echo $row['codigo'] ?></p> -->
                        <p><?php echo $row['descripcion'];?></p>

                        <form id="compra" name="compra" method="post" action="" class="mt-5">
                            <span class="fw-bold">$<?php echo number_format($row['precio'], 0, ',', '.')," CLP"; ?></span>
                            <br>
                            <label class="mt-3" for="cantidad">Cantidad: </label>
                            <input id="cantidad" type="number" name="cantidad" value="1" min="1" max="10" class="form-control mb-4">
                            <input name="precio" type="hidden" id="precio" value="<?php echo $row['precio']; ?>">
                            <input name="codigo" type="hidden" id="codigo" value="<?php echo $row['codigo']; ?>">
                            <input name="nombre" type="hidden" id="nombre" value="<?php echo $row['nombre']; ?>">
                            <input name="producto_id" type="hidden" id="producto_id" value="<?php echo $row['id']; ?>">
                            <input name="cliente" type="hidden" id="cliente" value="<?php echo $_SESSION['user_id']; ?>">
                            <?php if($_SESSION['user_id']){ ?>
                                <button type="submit" name="comprar" id="comprar" value="comprar"
                                    class="ver-mas pe-5 ps-5 pt-2 pb-2">Agregar a la Cesta</button>
                            <?php } else { ?>
                                <p>Por favor inicie sesión para añadir productos a la cesta.</p>
                            <?php }; ?>
                        </form>
                    </div>
                    <!--Datos del producto-->
                </div>
            </section>
            <!--Sección ficha de producto-->

            <!--Sección de productos recomendados-->
            <section class="container recomendados">
                <h2 class="mb-5 text-center text-md-start">Productos Recomendados</h2>
                <div id="relacionados-ficha" class="row"></div>
            </section>
            <!--Sección de productos recomendados-->
        </main>
    <?php } else { ?>
        <div class="text-center">
            <h1 class="">Error 500</h1>
            <p class="">El ID del producto no fue encontrado o el producto no existe.</p>
            <a class="btn btn-primary" href="index.php">Ve nuestros otros productos</a>
        </div>
    <?php }
} else { ?>

    <div class="text-center">
        <h1 class="">Error 500</h1>
        <p class="">El ID del producto no fue especificado</p>
        <a class="btn btn-primary" href="index.php">Ve nuestros otros productos</a>
    </div>
<?php } ?>
<?php include('footer.php'); ?>