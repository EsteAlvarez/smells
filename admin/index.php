<?php
    include("header.php");

    if(!$_SESSION['admin_id']){
        $_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        header("Location: index.php");
    }
    
    if(isset($_POST['agregar']) && $_POST['agregar']=="agregar") {
       $query="INSERT INTO `productos` (`id`, `nombre_cientifico`,`nombre`, `codigo`, `codigo_sec`, `codigo_ter`, `codigo_cuar`, `categoria`, `descripcion`, `precio`, `disponibilidad`, `stock`, `promocion`, `fecha`) VALUES (NULL, '$_POST[nombre_cientifico]', '$_POST[nombre]', '$_POST[codigo]', '$_POST[codigo_sec]', '$_POST[codigo_ter]', '$_POST[codigo_cuar]', '$_POST[categoria]', '$_POST[descripcion]', '$_POST[precio]', '$_POST[disponibilidad]', '$_POST[stock]', '$_POST[promocion]', NOW());";
        $conn->query($query);
        $ID=$conn->insert_id;
    }
    
    if(isset($_POST['modificar']) && $_POST['modificar']=="modificar"){
        $query="UPDATE productos SET nombre = '$_POST[nombre]', codigo = '$_POST[codigo]', codigo_sec = '$_POST[codigo_sec]', codigo_ter = '$_POST[codigo_ter]', codigo_cuar = '$_POST[codigo_cuar]', categoria = '$_POST[categoria]', descripcion = '$_POST[descripcion]', precio = '$_POST[precio]', disponibilidad = '$_POST[disponibilidad]', stock = '$_POST[stock]', promocion = '$_POST[promocion]' WHERE id = '$_POST[id]'";
        $conn->query($query);
        $ID=$conn->insert_id;
    }

    if(isset($_GET['idElm']) && $_GET['idElm']<>""){
        $query="DELETE FROM productos WHERE id='$_GET[idElm]'";
        $conn->query($query);
    }

    // variables que limitan mi consulta
    $max=6;
    $pag=0;
    // si la vairable pag esta definida por la url
    if(isset($_GET['pag']) && $_GET['pag'] <>""){
        $pag=$_GET['pag'];
    }
    $inicio=$pag * $max;
    // definimos nuestra consulta para que nos traiga lo que necesitamos
    $query=" SELECT id, nombre_cientifico, nombre, codigo, descripcion, precio, stock FROM productos WHERE nombre LIKE '%$busqueda%' ORDER BY fecha DESC";
    $query_limit= $query ." LIMIT $inicio,$max";
    $resource = $conn->query($query_limit);
    // si esta definido por la variable total
    if (isset($_GET['total'])) {
        $total = $_GET['total'];
    // si no esta definida
    } else {
        $resource_total = $conn -> query($query);
        $total = $resource_total->num_rows;
    }
    $total_pag = ceil($total/$max)-1;
?>
    <main class="container">
        <!--Volver al inicio de la tienda-->
        <nav class="navbar mt-4 d-flex flex-column align-items-start">
            <a class="navbar-brand" href="logout.php"><i class="bi bi-arrow-left-circle"></i> Volver al Inicio</a>
        </nav>
        <!--Volver al inicio de la tienda-->

        <!--Agregar producto-->
        <div class="mt-3">
            <a href="agregar.php" class="ver-mas pe-5 ps-5 pt-2 pb-2"><i class="bi bi-bag-plus"></i> Agregar Productos</a>
        </div>
        <!--Agregar producto-->

        <!--Tabla de productos-->
        <section class="row p-0 mt-5 mb-5">
            <h2 class="mb-4">Tabla de Productos</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-sm align-middle">
                    <thead>
                        <tr>
                            <th class="px-5 pb-4">Nombre</th>
                            <th class="px-5 pb-4">Código</th>
                            <th class="px-5 pb-4">Precio</th>
                            <th class="px-5 pb-4">Descripción</th>
                            <th class="px-5 pb-4">Unidades Disponibles</th>
                            <th class="px-5 pb-4">Modificar</th>
                            <th class="px-5 pb-4">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $resource->fetch_assoc()){ ?>
                            <tr>
                                <td class="px-5"><?php echo $row['nombre'];?></td>
                                <td class="px-5"><?php echo $row['codigo'];?></td>
                                <td class="px-5">$<?php echo $row['precio'];?></td>
                                <td class="px-5"><?php echo $row['descripcion'];?></td>
                                <td class="px-5"><?php echo $row['stock'];?> Unidades Disponibles</td>
                                <td class="text-center p-5 fs-4"><a href="modificar.php?id=<?php echo $row['id'];?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td class="text-center p-5 eliminar fs-4"><a href="index.php?idElm=<?php echo $row['id'];?>"><i class="bi bi-trash3"></i></a></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!--Tabla de productos-->

        <!--Paginas-->
        <div class="mb-5">
            <ul class="pagination justify-content-end">
                <?php if($pag-1 >= 0){ ?>
                    <li class="page-item previous">
                        <a href="index.php?pag=<?php echo $pag -1?>&total=<?php echo $total?>" class="page-link text-black"><i class="bi bi-arrow-left-square"></i></a>
                    </li>
                <?php }; ?> 
                    <li class="page-item">
                        <a class="page-link text-black"><?php echo ($inicio + 1) ?> a <?php echo min($inicio + $max, $total) ?> de <?php echo $total ?></a>
                    </li>
                <?php if($pag +1 <= $total_pag){ ?>
                    <li class="page-item next">
                        <a href="index.php?pag=<?php echo $pag +1?>&total=<?php echo $total?>" class="page-link text-black"><i class="bi bi-arrow-right-square"></i></a>
                    </li>
                <?php }; ?> 
            </ul>
        </div>
        <!--Paginas-->
    </main>
<?php include("footer.php");?>