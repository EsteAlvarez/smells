<?php include('header.php');?>
<main class="container">
    <!--Migas de pan-->
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">Finalizar Compra</span></li>
        </ol>
    </nav>
    <!--Migas de pan-->

    <div class="row mb-5 mt-4">
        <!--Formulario de datos de pago-->
        <section class="col-md-6">
            <h2 class="col-12 fw-bold mb-5">Datos de Pago</h2>
            <form action="" method="post">
                <fieldset class="mb-3">
                    <label class="form-label" for="nombre">Ingrese su nombre completo</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                </fieldset>
                
                <fieldset class="mb-3">
                    <label class="form-label" for="n_tarjeta">Ingrese el número de tarjeta</label>
                    <input class="form-control" type="number" name="numero_tarjeta" id="n_tarjeta">
                </fieldset>

                <fieldset class="mb-3 d-flex">
                    <div class="col-6">
                        <label class="form-label" for="t_valida">Tarjeta válida hasta</label>
                        <input class="form-control" type="date" name="tarjeta_valida" id="t_valida">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="codigo_seguridad">CVV</label>
                        <input class="form-control" type="number" name="codigo_seguridad" id="codigo_seguridad">
                    </div>
                </fieldset>

                <fieldset class="mb-3">
                    <label class="form-label" for="direccion">Ingrese la dirección de envío</label>
                    <input class="form-control" type="text" name="direccion" id="direccion">
                </fieldset>

                <fieldset class="mb-3">
                    <label class="form-label" for="notas">Notas adicionales (opcional)</label>
                    <textarea class="form-control" name="notas" id="notas" placeholder="Por favor ingrese algún detalle adicional al pedido..."></textarea>
                </fieldset>
                
            </form>
        </section>
        <!--Formulario de datos de pago-->

        <!--Ficha de detalles-->
        <section class="col-md-5 offset-md-1 ficha-detalles-pago border p-3">
            <h2 class="fw-bold">Detalles</h2>
            <p>Las compras realizadas antes de las 12:00 se despachan durante el mismo día </p>

            <!--Métodos de envío-->
            <div class="mt-5">
                <h3>Métodos de envío</h3>
                <span class="d-flex align-items-center"><span class="fs-2 me-3"><i class="bi bi-truck"></i></span> Envios gratis por compras sobre $16.000</span>
            </div>
            <!--Métodos de envío-->

            <!--Medios de pago-->
            <div class="mt-5">
                <h3>Medios de pago</h3>
                <p>Tarjetas de crédito</p>
                <span class="fs-2"><i class="bi bi-credit-card-2-front"></i> <i class="bi bi-credit-card"></i></span>
            </div>
            <!--Medios de pago-->

            <!--boton-->
            <div class="col-12 text-center mt-5">
                    <button class="boton p-2 fw-bold" type="submit" name="finalizar" data-bs-toggle="modal" data-bs-target="#modalFinalizarCompra">Realizar Compra</button> 
            </div>
            <!--boton-->
            
        </section>
        <!--Ficha de detalles-->

    </div>
    
</main>
<?php include('footer.php');?>