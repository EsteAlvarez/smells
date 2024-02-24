<?php include('header.php'); 
    if(!$_SESSION['user_id']){
        $_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        header("Location: index.php");
    }
?>

<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
    $query = " SELECT * FROM productos WHERE id=$_GET[id]";
    $resource = $conn->query($query);
    $total = $resource->num_rows;
    $row = $resource->fetch_assoc();

    if ($total > 0 || $total < 0) {
        ?>
        <section class="container mt-3 mb-5">
            <nav class="container mt-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">
                            <?php echo $row['nombre']; ?>
                        </span></li>
                </ol>
            </nav>
            <div class="row" style="background-color: #F0EEE8;">
                <aside id="imagenes-lat"
                    class="col-md-1 col-12 d-flex flex-md-column flex-md-wrap flex-row justify-content-around justify-content-md-around">
                    <img id="lateral1" data-id="<?php echo $row['id'];?> "class="col-md-12 col-2 miniaturas-ficha" src="assets/img/productos/frascos-secundarios/<?php echo $row['codigo_sec']; ?>.jpeg" alt="hola" style="cursor: pointer;">
                    <img id="lateral2" data-id="<?php echo $row['id'];?> "class="col-md-12 col-2 miniaturas-ficha" src="assets/img/productos/frascos-secundarios/<?php echo $row['codigo_ter']; ?>.jpeg" alt="hola" style="cursor: pointer;">
                    <img id="lateral3" data-id="<?php echo $row['id'];?> "class="col-md-12 col-2 miniaturas-ficha" src="assets/img/productos/frascos-secundarios/<?php echo $row['codigo_cuar']; ?>.jpeg" alt="hola" style="cursor: pointer;">
                </aside>
                
                <img id="imagen-principal" class="col-12 col-md-4 pb-5 pt-5 h-25"
                    src="assets/img/productos/frascos-principales/<?php echo $row['codigo'] ?>.jpeg"
                    alt="<?php echo $row['nombre']; ?>">
                <div class=" col-md-6 ps-5 pt-5">
                    <h2 class="text-center p-2">
                        <?php echo $row['nombre'] ?>
                    </h2>
                    <p class="text-center"><small>
                            <?php echo $row['codigo'] ?>
                        </small></p>
                    <p style="font-size: 28px;">
                        <?php echo $row['descripcion'] ?>
                    </p>

                    <form id="compra" name="compra" method="post" action="">
                        <p class="fw-bold" style="font-size: 18px;">$
                                <?php echo number_format($row['precio'], 0, ',', '.')," CLP"; ?><br/></p>
                        <label for="cantidad">Cantidad: </label><input id="cantidad" type="number" name="cantidad" value="1"
                            maxlength="3" min="1" max="10" class="text-black ms-2 mb-4">
                        <input name="precio" type="hidden" id="precio" value="<?php echo $row['precio']; ?>">
                        <input name="codigo" type="hidden" id="codigo" value="<?php echo $row['codigo']; ?>">
                        <input name="nombre" type="hidden" id="nombre" value="<?php echo $row['nombre']; ?>">
                        <input name="producto_id" type="hidden" id="producto_id" value="<?php echo $row['id']; ?>">
                        <input name="cliente" type="hidden" id="cliente" value="<?php echo $_SESSION['user_id']; ?>">
                        <p><button type="submit" name="comprar" id="comprar" value="comprar"
                                class="p-2 pe-4 ps-4 boton-hover text-center hover-overlay">Agregar a la Cesta</button></p>
                    </form>
                </div>
            </div>
        </section>

        <section class="container-fluid mt-5">
            <h2 class="mb-5 text-center text-md-start">Productos Recomendados</h2>
            <div class="row">

                <div id="relacionados-ficha"
                    class="d-flex flex-md-row flex-md-wrap flex-wrap  justify-content-md-between">
                </div>
            </div>
        </section>
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