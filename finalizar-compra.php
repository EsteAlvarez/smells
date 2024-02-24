<?php
require("conexion.php");
if (!isset($_SESSION))
    session_start();

    //consulta para enviar el mail
    $query="SELECT * FROM clientes WHERE id='$_SESSION[user_id]'";
    $resource=$conn->query($query);
    $row=$resource->fetch_assoc();
    
    //cuerpo del mail
    $cuerpo="El usuario ".$row['nombre']." ha realizado una compra en el sitio web:
    Nombre: ".$row['nombre']."
    Email: ".$row['email']."
    Teléfono: ".$row['telefono']."
    Región: ".$row['region']."
    Comuna: ".$row['comuna']."
    Dirección de entrega: ".$row['direccion']."
    _______________________________________________
    ";

    //cabecera del mail
    $cabecera = "From: ".$row['nombre']."<contacto_rayitas@crismaldonadom.laboratoriodiseno.cl>\n";
    $cabecera .= "Reply-To: ".$row['email']."\n";
    $cabecera .= "Cc: ".$row['email']."\n";

    //destinatario del mail
    $destinatario="cris.maldonadom@duocuc.cl";

    //asunto del mail
    $asunto="Venta de rayitas desde el sitio WEB";

    //la función mail envia el email con lo construido en las variables anteriores
    mail("$destinatario", "$asunto", "$cuerpo", "$cabecera");

?>
<div class="container px-3">
    <div class="row m-4">
        <div class="col-12">
            <h2 class="fw-bold text-center">Compra Realizada con Éxito</h2>
        </div>
        <div class="container">
            <div id="finalizado" class="row">
            </div>
            <p id="totalPrecio" class="fw-bold " style="font-size: 18px;"></p>
        </div>
    </div>
</div>