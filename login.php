<?php
require("conexion.php");
if (!isset($_SESSION))
    session_start();

if (isset($_POST['usuario']) && $_POST['usuario'] <> "" && isset($_POST['clave']) && $_POST['clave'] <> "") {
    $query = "SELECT * FROM `clientes` WHERE `usuario` LIKE '$_POST[usuario]' AND `clave` = '$_POST[clave]'";
    $resource = $conn->query($query);

    if ($t = $resource->num_rows) {
        $row = $resource->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefono'] = $row['telefono'];
        $_SESSION['region'] = $row['region'];
        $_SESSION['comuna'] = $row['comuna'];
        $_SESSION['direccion'] = $row['direccion'];

        header("Location: index.php");
    } else {
        $error='<script>alert("Usuario/Clave no registrados");window.location.href="index.php"</script>';
    }
}
?>
<section class="container">
    <div class="row p-1">
        <div class="col-md-8 col-12 mx-auto">
            <h2 class="fw-bold text-center mb-5">Iniciar Sesión</h2>
            <?php if($error){ ?>
                <div class="mt-4">
                    <span><?php echo $error;?></span>
                </div>
            <?php } ?>
            <form  name="login" method="post" action="login.php" class="col-12 col-md-12">
                <fieldset>
                    <label for="usuario_login" class="col-12 col-lg-6 form-label">Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario_login"
                        class="text-black col-md-12 col-12 border-top-0 border-end-0 border-start-0 border-bottom-1 mb-md-5 mb-5 form-control">
                </fieldset>
                <fieldset>
                    <label for="clave_login" class="col-12 col-lg-6 form-label">Clave</label>
                    <input type="password" name="clave" id="clave_login"  class="text-black col-md-12 col-12 border-top-0 border-end-0 border-start-0 border-bottom-1 mb-md-5 mb-5 form-control">
                </fieldset>
                <div class="d-flex justify-content-center align-items-center flex-lg-row flex-column">
                    <button type="submit" value="login" name="login" id="login" class="ver-mas pe-5 ps-5 pt-2 pb-2 m-3">Iniciar Sesión</button>
                    <a class="m-3 ver-mas pe-5 ps-5 pt-2 pb-2" href="registro.php">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
</section>