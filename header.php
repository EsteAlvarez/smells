<?php
    require("conexion.php");
    if(!isset($_SESSION))session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smells Aromas</title>
    <meta name="description" content="Smells es Lider en Aromatización, tenemos olores personalizados dependiendo de tus necesidades ">
    <meta name="keywords" content="aromatizacion,aromas,esencias,fragancias y aromas">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <!-- Header -->
    <header class="bg-white">
        <nav class="navbar py-2 navbar-expand-lg m-0 p-0">
            <div class="container-fluid px-5 m-0 p-0">
                <div>
                    <a class="navbar-brand" href="index.php">
                    <img class="logo" src="assets/img/logo-smells.png" alt="Logo" >
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list navbar-toggler border-0"></i>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre-nosotros.php">Sobre nosotros</a>
                        </li>
                        <?php if($_SESSION['user_id']){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="registro.php">Registrarse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#modalLogin" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar sesión</a>
                            </li>
                        <?php }?>
                        <?php if($_SESSION['user_id']){ ?>
                            <li class="nav-item">
                            <a class="nav-link" href="carrito.php">Cesta</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

