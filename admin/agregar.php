<?php include('header.php');
    if(!$_SESSION['admin_id']){
        $_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        header("Location: index.php");
    }
?>
    <main>
        <!--Migas de pan-->
        <nav class="container p-0 mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none migas" href="index.php">Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">Agregar producto</span></li>
            </ol>
        </nav>
        <!--Migas de pan-->

        <!--Sección formulario para agregar producto-->
        <section class="mt-5 container">
            <h2 class="mb-3">Agregar Producto</h2>
            <form class="row" id="agregarProducto" name="agregar" method="post" action="index.php">
                <div class="col-md-6">
                <label for="nombre_cientifico" class="form-label mb-1">Nombre Científico</label>
                    <input type="text" name="nombre_cientifico" id="nombre_cientifico" class="form-control mb-4">
                    <label for="nombre" class="form-label mb-1">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control mb-4">
                    <label for="categoria" class="form-label mb-1">Categoria</label>
                    <input type="text" name="categoria" id="categoria" class="form-control mb-4">
                    <label for="precio" class="form-label mb-1">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control mb-4">
                    <label for="codigo" class="form-label mb-1">Primer Código</label>
                    <input type="text" maxlength="5" name="codigo" id="codigo" class="form-control mb-4">
                    <label for="codigo_sec" class="form-label mb-1">Segundo Código</label>
                    <input type="text" name="codigo_sec" id="codigo_sec" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                    <label for="codigo_ter" class="form-label mb-1">Tercer Código</label>
                    <input type="text" name="codigo_ter" id="codigo_ter" class="form-control mb-4">
                    <label for="codigo_cuar" class="form-label mb-1">Cuarto Código</label>
                    <input type="text" name="codigo_cuar" id="codigo_cuar" class="form-control mb-4">        
                    <label for="stock" class="form-label mb-1">Número de unidades disponibles</label>
                    <input type="number" name="stock" id="stock" class="form-control mb-4">
                    <label for="disponibilidad" class="form-label mb-1">Disponibilidad</label>
                    <select name="disponibilidad" id="disponibilidad" class="form-select mb-4">
                        <option value="">Seleccione disponibilidad</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>    
                    <label for="promocion" class="form-label mb-1">Promoción</label>
                    <select name="promocion" id="promocion" class="form-select mb-4">
                        <option value="">Seleccione promoción</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <label for="descripcion" class="form-label mb-1">Descripción</label>
                    <textarea name="descripcion" id="descripcion" 
                        class="form-control "></textarea>
                <div class="text-center">
                    <button type="submit" name="agregar" id="agregar" value="agregar" class="ver-mas pe-5 ps-5 pt-2 pb-2 mt-5">Agregar Producto</button>
                </div>
            </form>
        </section>
        <!--Sección formulario para agregar producto-->
    </main>
<?php include('footer.php') ?>