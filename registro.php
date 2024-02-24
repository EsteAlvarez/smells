<?php

error_reporting(-1);

    include("header.php");
    $region = array(
        ''=>'Seleccione su Región',
        'I Región'=>'Arica y Parinacota',
        'II'=>'Tarapacá',
        'III'=>'Antofagasta',
        'IV'=>'Atacama',
        'V'=>'Coquimbo',
        'VI'=>'Valparaíso',
        'Metropolitana'=>'Región Metropolitana',
        'VII'=>'O\'Higgins',
        'VIII'=>'Maule',
        'IX'=>'Ñuble',
        'X'=>'Biobío',
        'XI'=>'La Araucanía',
        'XII'=>'Los Ríos',
        'XIII'=>'Los Lagos',
        'XIV'=>'Aysén',
        'XV'=>'Magallanes',
    );
    if(isset($_POST['registrar']) && $_POST['registrar']=="registrar") {
        $query="INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `email`, `telefono`, `region`, `comuna`, `direccion`, `usuario`, `clave`) VALUES (NULL, '$_POST[nombre]', '$_POST[apellido]', '$_POST[email]', '$_POST[telefono]', '$_POST[region]', '$_POST[comuna]', '$_POST[direccion]', '$_POST[usuario]', '$_POST[clave]')";
        $conn->query($query);
        $ID=$conn->insert_id;

        "error:".$ID;
        //header("Location: index.php");
    };
?>
    <main>
        <!--Migas de pan-->
        <nav class="container mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none migas" href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">Registrarse</span></li>
            </ol>
        </nav>
        <!--Migas de pan-->

        <!--Formulario de registro-->
        <section class="container mt-5 mb-5">
            <h2 class="fw-bold mb-3">Regístrate en nuestra tienda</h2>
            <form class="row" id="registro" name="registro" method="post" action="registro.php">
                <div class="col-md-6 col-12">
                    <label for="nombre" class="form-label mb-1">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" class="form-control mb-4">
                    <label for="apellido" class="form-label mb-1">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" class="form-control mb-4">
                    <label for="email" class="form-label mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Ej: email123@gmail.com" class="form-control mb-4">
                    <label for="telefono" class="form-label mb-1">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" placeholder="Ingrese su número telefónico" class="form-control mb-4">
                </div>
                <div class="col-md-6 col-12">
                    <label for="region" class="form-label mb-1">Región</label>
                    <select name="region" id="region" class="form-control mb-4">
                        <?php foreach($region as $sigla=>$regiones){ ?>
                            <option value="<?php echo $sigla;?>">
                            <?php echo $regiones;?></option>
                        <?php } ?>
                    </select>
                    <label for="comuna" class="form-label mb-1">Comuna</label>
                    <input type="text" name="comuna" id="comuna" placeholder="Ingrese su comuna" class="form-control mb-4">
                    <label for="direccion" class="form-label mb-1">Dirección</label>
                    <input type="text" name="direccion" id="direccion" placeholder="Ingrese su dirección" class="form-control mb-4">
                    <label for="usuario" class="form-label mb-1">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Cree un nombre de usuario" class="form-control mb-4">
                </div>
                <div class="col-12 col-md-6">
                    <label for="clave" class="form-label mb-1">Clave</label>
                    <input type="password" name="clave" id="clave" placeholder="Cree su clave de usuario" class="form-control mb-4">
                </div>
                <div class="text-center mt-4">
                    <button type="submit" name="registrar" id="registrar" value="registrar" class="ver-mas pe-5 ps-5 pt-2 pb-2">Registrarse</button>
                </div>
            </form>
            <div class="col-12 d-flex justify-content-center mt-4">
                <span>¿Ya tienes una cuenta?</span>
                <a class="text-decoration-none ms-2" href="#modalLogin" data-bs-toggle="modal" data-bs-target="#modalLogin">Inicia sesión ahora</a>
            </div>
        </section>
        <!--Formulario de registro-->
    </main>

<?php include("footer.php") ?>