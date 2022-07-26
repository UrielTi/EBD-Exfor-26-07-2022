<?php
include ("../conn/conn.php");
$cedula = $_POST['cedulas'];
$consulta = "SELECT cedula FROM clientes WHERE cedula=$cedula";
$result = $conn->query($consulta);
$fila = $result->fetch_array();

$respuesta = new stdClass();
if($result->num_rows > 0){
    $respuesta->cedula = "<script>alert('La cedula ya esta registrada en el sistema');</script>";
}

echo json_encode($respuesta);
?>