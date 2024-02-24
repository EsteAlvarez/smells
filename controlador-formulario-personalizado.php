<?php
require('conexion.php');

if(isset($_GET['tipo']) && $_GET['tipo']=='malestar'){
	$query="SELECT * FROM `malestar`";
	$resource=$conn->query($query);
	if($total=$resource->num_rows){
		$data=array();
		while ($row = $resource->fetch_assoc()){
			$data[]=$row;
		}
		echo json_encode($data);
	}
}
if(isset($_GET['tipo']) && $_GET['tipo']=='solucion'){
	$query="SELECT * FROM `solucion_malestar` WHERE `malestar_id` = $_POST[malestar_id]";
	$resource=$conn->query($query);
	if($total=$resource->num_rows){
		$data=array();
		while ($row = $resource->fetch_assoc()){
			$data[]=$row;
		}
		echo json_encode($data);
	}
}
if(isset($_GET['tipo']) && $_GET['tipo'] == 'agregado') {
    $query = "SELECT * FROM `agregado_solucion_malestar`";
    $resource = $conn->query($query);
    if ($total = $resource->num_rows) {
        $data = array();
        while ($row = $resource->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
?>

