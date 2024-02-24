<?php include("header.php");?>
<main>
    <!--Primera sección mensaje de bienvenida e imagenes promocionales-->
    <section class="seccion-1 p-md-0 p-4 container mb-5 mt-4">
        <div class="contenedor-saludo text-center row m-0 p-0">

            <div class="col-12 mb-3 mt-2 titulo-saludo d-flex align-items-center justify-content-center pt-2">
                <h2 class="me-1" id="saludo-bienvenida"></h2>
                <?php if($_SESSION['user_id']){ ?>
                    <span class="h2"><?php echo $_SESSION['nombre'];?></span>
                <?php } ?>
            </div>
            
            <p class="col-md-6 col-12 mx-md-auto saludo" id="mensaje-bienvenida"></p>
        </div>
        <div class="imagenes-promocionales row mt-4">
            <figure class="col-md-6">
                <img class="w-100" src="assets/img/img-promocional-1.png" alt="varios frascos de aceites esenciales" usemap="#mapa-img">
                <figcaption>
                    <map name="mapa-img" id="mapa-img">
                        <area target="_self" alt="dulce-naranja" title="dulce-naranja" href="ficha.php?id=2" coords="541,24,554,11,576,11,582,25,584,41,584,56,589,68,600,76,625,81,662,83,695,85,729,87,747,91,746,108,726,115,680,113,620,112,598,116,602,139,610,164,608,193,606,213,600,233,575,239,539,239,526,213,526,192,526,165,530,107,534,67" shape="poly">
                        <area target="_self" alt="lavanda" title="lavanda" href="ficha.php?id=6" coords="327,171,350,171,400,172,429,179,428,195,424,212,418,226,413,253,415,279,440,300,451,330,457,359,458,382,458,409,460,436,459,470,455,490,425,507,416,529,416,564,412,585,384,593,346,586,317,561,310,509,312,423,311,324,338,291" shape="poly">
                        <area target="_self" alt="romero" title="romero" href="ficha.php?id=12" coords="533,264,669,264,670,290,672,316,673,353,689,365,772,374,765,399,719,404,657,409,583,406,532,388" shape="poly">
                        <area target="_self" alt="vetiver" title="vetiver" href="ficha.php?id=16" coords="47,490,51,475,103,473,149,488,157,501,196,500,260,500,294,521,295,554,292,571,234,578,163,567,137,570,109,568,89,560,53,557,48,526" shape="poly">
                        <area target="_self" alt="ylang" title="ylang" href="ficha.php?id=9" coords="444,510,496,508,573,516,579,543,580,581,599,590,656,591,721,597,719,624,605,625,567,636,479,636,429,626,431,581,432,541" shape="poly">
                    </map>
                </figcaption>
            </figure>
            <figure class="col-md-6">
                <img  class="w-100" src="assets/img/img-promocional-2.png" alt="frasco de aceites esenciales sobre tres rocas apiladas" usemap="#mapa-image">
                <figcaption>
                    <map name="mapa-image" id="mapa-image">
                        <area target="_self" alt="dulce-naranja" title="dulce-naranja" href="ficha.php?id=2" coords="375,42,390,27,425,30,435,52,438,88,441,118,477,112,517,104,579,109,652,113,710,115,724,140,694,156,574,163,492,167,454,183,448,245,452,293,427,335,346,315,358,189,354,135" shape="poly">
                    </map>
                </figcaption>
            </figure>
        </div>
    </section>
    <!--Primera sección mensaje de bienvenida e imagenes promocionales-->



    <!--Segunda sección tarjetas de productos y sus filtros (Jorge) -->
    <section class="container seccion-2 mb-5">
        <h2 class="text-center">Descubre nuestros productos</h2>
        <!--En este div, con el id "categorias", van todos los botones para filtrar-->
        <div id="categorias" class="d-flex justify-content-center mb-5 mt-2">
            <!--En los botones se define data-categoria(para utilizar en el JQuery), y el value respectivo para que coincida con las tarjetas correspondientes-->
            <button class="btn boton-filtro border m-2" data-categoria="citricos">Aromas Cítricos</button>
            <button class="btn boton-filtro border m-2" data-categoria="herbales">Aromas Herbales</button>
            <button class="btn boton-filtro border m-2" data-categoria="florales">Aromas Florales</button>
            <button class="btn boton-filtro border m-2" data-categoria="terrosos">Aromas Terrosos</button>
        </div>
        <!--Se define un div con el id "destacados" donde iran todas las tarjetas creadas con JQuery-->
    <div id="destacados" class="row d-flex justify-content-md-around flex-md-row flex-column">
    
    
    </div>
        <div class="d-flex justify-content-center mt-5 justify-content-md-center">
            <button type="submit" style="display:none;" id="vermas" class="ver-mas pe-5 ps-5 pt-2 pb-2">Ver más</button>
        </div>  
    </section>
    <!--Segunda sección tarjetas de productos y sus filtros -->

   

    <!--Tercera sección formulario personalizado-->
    <section class="container-fluid p-5 mb-5 seccion-3-formulario">
        <div>
            <h3 class="text-center mb-2">¿Deseas un producto personalizado?</h3>
            <p class="text-center mb-5">Completa este breve formulario para recibir una recomendación personalizada que permita satisfacer tus necesidades.</p>
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-fluid w-50 d-lg-inline d-none"  src="assets/img/lab1.jpg" alt="Imagen de aceites esenciales">
                </div>
                <form id="p_personalizado" class="col-lg-6 col-md-12" method="post" action="index.php">
                    <!--Opción dolencia o malestar-->
                    <fieldset class="col mb-4">
                        <label class="mb-2" for="malestar">¿Sufres de alguna dolencia o malestar?</label>
                        <select class="form-control" id="malestar" name="malestar">
                            <option value="">Por favor seleccione alguna dolencia o malestar</option>
                        </select>
                    </fieldset>
                    <!--Opción dolencia o malestar-->
                    <!--Opción solución a dolencia (aroma)-->
                    <fieldset class="col mb-4">
                        <label id="label_solucion" class="mb-2" for="solucion_malestar" style="display: none">¿Qué aroma es de tu preferencia?</label>
                        <select class="form-control mb-2" id="solucion_malestar" name="solucion_malestar" style="display: none">
                            <option value="">Por favor seleccione algún aroma</option>
                        </select>
                        <span class="fw-bold" id="descripcion_solucion"></span>
                    </fieldset>
                    <!--Opción solución a dolencia (aroma)-->
                    <!--Opción agregado (crema neutra o aceite portador)-->
                    <fieldset class="col mb-3">
                        <label id="label_agregado" class="mb-2" for="agregado" style="display: none">Selecciona alguna crema o aceite portador para diluir tu esencia</label>
                        <select class="form-control mb-2" id="agregado" name="agregado" style="display: none">
                            <option value="">Por favor seleccione algún aceite portador o crema</option>
                        </select>
                        <span class="fw-bold" id="descripcion_agregado"></span>
                    </fieldset>
                    <!--Opción agregado (crema neutra o aceite portador)-->
                    <div class="col-12 text-center">
                        <input type="hidden" name="cliente" value="<?php echo $_SESSION['user_id'];?>">
                        <input type="hidden" name="precio" id="precio_personalizado" value="">
                        <input type="hidden" name="cantidad" value="1">

                        <!--Modal para confirmar la solicitud del producto-->
                        <?php if($_SESSION['user_id']){ ?>
                            <button type="button" id="contenedor-boton" class="ver-mas pe-5 ps-5 pt-2 pb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:none;">Solicitar Producto</button>
                        <?php } else { ?> 
                            <p>Por favor registrese o inicie sesión para solicitar su producto personalizado.</p>
                        <?php } ?>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="text-end">
                                        <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="fw-bold mb-3">Confirmar Solicitud</h3>
                                        <p>¿Desea confirmar la solicitud de su producto personalizado?</p>
                                        <div class="contenedor-precio m-2 mb-3 col-12">
                                            <span class="fw-bold" id="precio_total"></span>
                                        </div>
                                        <div class="text-center m-2 col-12">
                                            <button  class="ver-mas pe-5 ps-5 pt-2 pb-2" type="submit">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal para confirmar la solicitud del producto-->
                    </div>
                </form>

                <!--Insertar producto personalizado en la tabla de compras-->
                <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        // Obtén los otros datos del formulario y asegúrate de que estén limpios y seguros.
                        $malestar = $_POST['malestar'];
                        $solucion_malestar = $_POST['solucion_malestar'];
                        $agregado = $_POST['agregado'];
                        $nombre = 'Producto Personalizado';
                        $cliente = mysqli_real_escape_string($conn, $_POST['cliente']);
                        $precio = floatval($_POST['precio']); // Convierte a número flotante
                        $cantidad = intval($_POST['cantidad']); // Convierte a número entero

                        // Realiza la inserción en la tabla de compras de forma segura
                        
                        $query = "INSERT INTO `solicitud_producto_personalizado`(`id`, `malestar`, `solucion_malestar`, `agregado`, `nombre`, `cliente`, `precio`, `cantidad`, `fecha`) VALUES (NULL,$malestar,$solucion_malestar,$agregado,'$nombre',$cliente,$precio,$cantidad,NOW())";

                        if ($conn->query($query)) {
                            $response = array('status' => 'success', 'message' => 'Inserción exitosa');
                            //echo json_encode($response);
                        } else {
                            $response = array('status' => 'error', 'message' => 'Error en la inserción: ' . $conn->error);
                            //echo json_encode($response);
                        }

                        //graba en carrito
                         // Realiza la inserción en la base de datos
                        $cliente = $_SESSION['user_id'];
                        $query="INSERT INTO compras (id,cliente,codigo,producto_id,nombre, precio,cantidad,fecha) VALUES (NULL,'$cliente','PP01',23,'$nombre','$precio', 1,NOW())";
                        $conn->query($query); 
                        $ID=$conn->insert_id;
                        
                    }
                ?>
                <!--Insertar producto personalizado en la tabla de compras-->
            </div>
        </div>
    </section>
    <!--Tercera sección formulario personalizado-->
</main>
<?php include("footer.php") ?>