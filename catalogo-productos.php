<?php include("header.php");?>
<?php
if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $query = "SELECT * FROM productos WHERE categoria='$categoria'";
    $resource = $conn->query($query);
    $total = $resource->num_rows;
    $row = $resource->fetch_assoc();
    $categoria = $row['categoria'];
}
?>
<main>
    <?php if ($total > 0) { ?>
        <!--Migas de pan-->
        <nav class="container mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none migas" href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold"><?php echo $categoria;?></span></li>
            </ol>
        </nav>
        <!--Migas de pan-->

        <!--Sección descripción de imagen de la categoría-->
        <section class="container-fluid mt-5 mb-5 fondo-categoria p-4">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!--Título y descripción de la categoría-->
                        <h2 class="fw-bold mb-3 text-uppercase mt-5"><?php echo $categoria;?></h2>
                        <?php if ($_GET['categoria'] == 'herbales') {
                            echo '<p>Estos aromas provienen de hierbas como la menta, el romero, el
                        tomillo y el eucalipto. Suelen ser refrescantes, revitalizantes y pueden ayudar a mejorar la
                        concentración y la claridad mental.</p>';
                        } elseif ($_GET['categoria'] == 'terrosos') {
                            echo '<p>Provenientes de aceites esenciales como la vetiver y la salvia, estos
                            aromas suelen ser ricos y profundos. Se asocian con la estabilidad y la conexión a la
                            naturaleza.</p>';
                        } elseif ($_GET['categoria'] == 'citricos') {
                            echo '<p>Estos aromas provienen de cítricos como el limón, la naranja, la lima y
                            el pomelo. Suelen ser refrescantes, estimulantes y revitalizantes. Se utilizan para mejorar
                            el estado de ánimo y la concentración.</p>';
                        } else {
                            echo '<p>Incluyen fragancias como la lavanda, las rosas, el jazmín, el ylang-
                                ylang y el geranio. Los aromas florales suelen ser relajantes, calmantes y se utilizan para
                                reducir el estrés y promover la relajación.</p>';
                        } ?>
                    </div>
                    <!--Título y descripción de la categoría-->

                    <!--Título y descripción de la categoría-->
                    <div class="col-md-6 d-lg-flex d-none">
                        <img class="col-md-6 offset-md-6 img-fluid"
                            src="assets/img/productos/categorias/<?php echo $row['codigo']; ?>.png"
                            alt="Imagen de la categoría">
                    </div>
                    <!--Título y descripción de la categoría-->
                </div>
            </div>
        </section>
        <!--Sección descripción de imagen de la categoría-->

        <!--Sección descripción de imagen de la categoría-->
        <section class="container mt-5 mb-5">
            <div class="row d-flex justify-content-md-around flex-md-row flex-column">
                <?php while ($row = $resource->fetch_assoc()) { ?>
                    <!--Cards-->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card mx-auto" style="width: 18rem;">
                            <a href="ficha.php?id=<?php echo $row['id']; ?>">
                                <img class="card-img-top"
                                    src="assets/img/productos/frascos-principales/<?php echo $row['codigo'];?>.jpeg"
                                    alt="<?php echo $row['nombre'] ?>"
                                    data-hover-src="assets/img/productos/imagenes-contextuales/<?php echo $row['codigo'];?>.jpeg"
                                    data-original-src="assets/img/productos/frascos-principales/<?php echo $row['codigo'];?>.jpeg">
                                <div class="card-body d-flex flex-column">
                                    <p class="card-text texto-card"><?php echo $row['nombre'] ?></p>
                                    <p class="card-text texto-card">Precio: <span class="fw-bold">$<?php echo number_format($row['precio']);?></span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--Cards-->
                <?php } ?>
            <?php } else { ?>
                <div class="w-100 m-5">
                    <p class="text-center fw-bold text-uppercase">No se encontraron productos en esta categoría.</p>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--Sección descripción de imagen de la categoría-->
</main>
<?php include("footer.php"); ?>