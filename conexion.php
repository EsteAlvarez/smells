<?php
    $hostname = "localhost";
    $username = "smells";
    $password = "smells123"; 
    $database = "smells"; 
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn ->connect_error) {
        die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
    }
?>