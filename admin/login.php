<?php
include("header.php");
if (!isset($_SESSION))
    session_start();

	if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['clave']) && $_POST['clave']<>"") ) {
		$query="SELECT * FROM administrador WHERE 1 AND usuario='$_POST[usuario]' AND clave='$_POST[clave]'";
		$resource=$conn->query($query);

		if($t=$resource->num_rows) {
			$row=$resource->fetch_assoc();
			$_SESSION['admin_id']=$row['id'];
			$_SESSION['nombre']=$row['nombre'];
			$_SESSION['email']=$row['email'];
			$_SESSION['telefono']=$row['telefono'];

			header("Location: index.php");
		} else {
			$error = "Usuario/clave incorrectos";
		}
	}
?>

<main class="container mt-5">
        <div class="row p-0">
            <div class="col-12 mb-3"><h1><strong>Panel de administración de productos</strong></h1></div>
            <form name="login" method="post" action="login.php">
                <div class="mb-4">
                    <label for="usuario" class="col-form-label">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control rounded">
                </div>
                <div class="mb-4">
                    <label for="clave_admin" class="col-form-label">Clave</label>
                    <input type="password" name="clave" id="clave_admin" class="form-control rounded">
                </div>
                <div class="text-center">
                    <button type="submit" name="login" id="login" class="ver-mas pe-5 ps-5 pt-2 pb-2 mt-3 mb-5">Iniciar Sesión</button>
                </div>
                <?php if($error){ ?>
                    <div class="container text-center">
                        <span><?php echo $error;?></span>
                    </div>
                <?php } ?>
            </form>
        </div>
</main>
<?php include('footer.php') ?>