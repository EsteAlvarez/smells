<?php include('header.php');

    if(isset($_GET['id']) && !empty($_GET['id'])) { //verificamos si el id está presente en la URL
        $query="SELECT * FROM productos WHERE id=$_GET[id]";
        $resource = $conn->query($query); 
        $total = $resource->num_rows;
        $row = $resource->fetch_assoc();
    }
?>
    <main>
        <!--Migas de pan-->
        <nav class="container p-0 mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none migas" href="index.php">Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">Modificar producto</span></li>
            </ol>
        </nav>
        <!--Migas de pan-->

        <!--Sección formulario para modificar producto-->
        <section class="container mt-5">
                <h2 class="mb-3">Modificar Producto</h2>
                <form class="row" id="modificarProducto" name="modificar" method="post" action="index.php">
                    <input name="id" type="hidden" id="id" value="<?php echo $row['id'];?>"/>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label mb-1">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" class="form-control mb-4">        
                        <label for="categoria" class="form-label mb-1">Categoria</label>
                        <input type="text" name="categoria" id="categoria" value="<?php echo $row['categoria']; ?>" class="form-control mb-4">         
                        <label for="precio" class="form-label mb-1">Precio </label>
                        <input type="number" name="precio" id="precio" value="<?php echo $row['precio']; ?>" class="form-control mb-4">   
                        <label for="codigo" class="form-label mb-1">Código</label>
                        <input type="text" name="codigo" id="codigo" value="<?php echo $row['codigo']; ?>" class="form-control mb-4">        
                        <label for="codigo_sec" class="form-label mb-1">Código Segundo</label>
                        <input type="text" name="codigo_sec" id="codigo_sec" value="<?php echo $row['codigo_sec']; ?>" class="form-control mb-4">
                    </div>
                    <div class="col-md-6">
                        <label for="codigo_ter" class="form-label mb-1">Código Tercero</label>
                        <input type="text" name="codigo_ter" id="codigo_ter" value="<?php echo $row['codigo_ter']; ?>" class="form-control mb-4">   
                        <label for="codigo_cuar" class="form-label mb-1">Código Cuarto</label>
                        <input type="text" name="codigo_cuar" id="codigo_cuar" value="<?php echo $row['codigo_cuar']; ?>" class="form-control mb-4">      
                        <label for="stock" class="form-label mb-1">Número de unidades disponibles</label>
                        <input type="number" name="stock" id="stock" value="<?php echo $row['stock']; ?>" class="form-control mb-4">        
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
                            class="form-control"><?php echo $row['descripcion']; ?></textarea>
                    <div class="text-center">
                            <button type="submit" name="modificar" id="modificar" value="modificar" class="ver-mas pe-5 ps-5 pt-2 pb-2 mt-5">Modificar Producto</button>
                    </div>
                </form>
        </section>
        <!--Sección formulario para modificar producto-->
    </main>
<?php include('footer.php');?>