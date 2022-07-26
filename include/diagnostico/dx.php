<?php
include "../conn/conn.php";
$dx = $_POST['dx'];
if (isset($dx)){
	$consulta = "SELECT id, diagnostico FROM dx WHERE id = '$dx'";
	$result = $conn->query($consulta);
	
	$respuesta = new stdClass();

	if($result->num_rows > 0){
		$fila = $result->fetch_array();
		$respuesta->dx = $fila['id'];
		$respuesta->diagnostico = $fila['diagnostico'];
	}
	
	/* Codifica el resultado del array en JSON. */
	echo json_encode($respuesta);
 
}
?>