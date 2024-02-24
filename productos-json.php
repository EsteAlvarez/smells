<?php
require('conexion.php');


//aquí se trae por JSON todos los datos de la base de datos para mostrar después en el index
if(isset($_GET['a']) && $_GET['a']=='lista'){
	$query='SELECT * FROM `productos`';
	$resource = $conn->query($query); 
	$total = $resource->num_rows;
	$data=array();
	while ($row = $resource->fetch_assoc()){
		$data[]=$row;
	}
	//echo "<pre>",print_r($data,1),"</pre>";
	echo json_encode($data);
}

if(isset($_GET['a']) && $_GET['a']=='ficha'){
	$query="SELECT * FROM `productos` WHERE `id` = $_POST[producto_id]";
	$resource = $conn->query($query); 
	$total = $resource->num_rows;
	$row = $resource->fetch_assoc();
	//echo "<pre>",print_r($data,1),"</pre>";
	echo json_encode($row);
}
?>