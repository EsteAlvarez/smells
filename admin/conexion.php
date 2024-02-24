<?php
    $hostname = "localhost";
    $username = "estealvarez_aromas";
    $password = "*proyecto_aromaterapia#"; 
    $database = "estealvarez_aromas"; 
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn ->connect_error) {
        die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
    }
?>