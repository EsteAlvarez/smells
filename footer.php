<footer class="text-center p-5 mt-5">
	<div class="container">
		<div class="row">
			<!--Tienda y redes sociales-->
			<div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-4 text-white text-start">
				<h2 class="h3">Smells</h2>
				<span><a class="iconos-footer" href="#"><i class="bi bi-twitter"></i></a></span>
				<span><a class="iconos-footer" href="#"><i class="bi bi-instagram"></i></a></span>
				<span><a class="iconos-footer" href="#"><i class="bi bi-facebook"></i></a></span>
				<span><a class="iconos-footer" href="#"><i class="bi bi-whatsapp"></i></a></span>
				<p class="mt-2"> &copy; copyright <?php echo date('Y');?></p>
			</div>
			<!--Tienda y redes sociales-->

			<!--Navegación footer-->
			<div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-4 text-white text-start">
				<ul class="list-unstyled">
					<li><a class="text-decoration-none nav-footer fw-bold" href="#">Inicio</a></li>
					<li><a class="text-decoration-none nav-footer fw-bold" href="sobre-nosotros.php">Sobre Nosotros</a></li>
					<li><a class="text-decoration-none nav-footer fw-bold" href="#">Iniciar Sesión</a></li>
					<?php if($_SESSION['user_id']){ ?>
						<li class="nav-footer fw-bold"><a class="nav-link" href="carrito.php">Cesta</a></li>
					<?php } ?>
				</ul>
			</div>
			<!--Navegación footer-->

			<!--Categorias-->
			<!-- <div class="col-lg-3 col-md-6 col-12 mb-lg-0 mb-4 text-white text-start">
				<h3 class="fw-bold h6">Categorías</h3>
				<ul class="list-unstyled">
					<li><a class="text-decoration-none nav-footer fw-bold" href="#">Aromas Cítricos</a></li>
					<li><a class="text-decoration-none nav-footer fw-bold" href="#">Aromas Florales</a></li>
					<li><a class="text-decoration-none nav-footer fw-bold" href="#">Aromas Herbales</a></li>
					<li><a class="text-decoration-none nav-footer fw-bold" href="#">Aromas Terrosos</a></li>
				</ul>
			</div> -->
			<!--Categorias-->

			<!--Contacto-->
			<div class="col-lg-2 col-md-6 col-12 mb-lg-0 mb-4 text-white text-start">
				<h3 class="fw-bold h6">Contacto</h3>
				<p class="mb-0">Si tienes alguna duda contáctanos</p>
				<a class="iconos-footer" href="mailto:smells@rayitas.com"><i class="bi bi-envelope"></i></a>
			</div>
			<!--Contacto-->
		</div>
	</div>
</footer>

	<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end align-items-center">
                    <!-- <h2 class="modal-title fs-5" id="modalLogin">Inicia Sesión</h2> -->
                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include("login.php");?>
                </div>
				<div class=" d-flex justify-content-end align-items-center">
                	<span class="m-3">¿Eres administrador de la tienda?<a class="text-decoration-none ingresa" href="admin/login.php"> Ingresa aquí</a></span>
				</div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="modalFinalizarCompra" tabindex="1" aria-labelledby="modalFinalizarCompra" aria-hidden="false">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include("finalizar-compra.php") ?>
                </div>
            </div>
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/jquery.rwdImageMaps.min.js"></script>
	
	
</body>
</html>
<?php mysqli_close($conn);?>








