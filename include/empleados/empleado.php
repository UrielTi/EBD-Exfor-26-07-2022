<?php
include ("../conn/conn.php");
$nombre = $_POST['nombres'];
$consulta = "SELECT id, nombres, nucleo, cargo, proceso, cedula FROM clientes WHERE nombres = '$nombre'";
$result = $conn->query($consulta);
$fila = $result->fetch_array();

$respuesta = new stdClass();
if($result->num_rows > 0){
    $respuesta->nombres = $fila['nombres'];
    $respuesta->cedula = $fila['cedula'];
    $respuesta->nucleo = $fila['nucleo'];
    $respuesta->proceso = $fila['proceso'];
    $respuesta->cargo = $fila['cargo'];
}
// Consultas de cargo, proceso, nucleo las cuales funcionan con id.
// En este proceso se estan estudiando las reasignaciones que se realizan en;
// cargo->cargo1 (23) - proceso->proceso1 (30) y nucleo->nucleo1 (37)
$consultaCargo = "SELECT cargo FROM cargos WHERE id = '".$fila['cargo']."'";
$resultCargo = $conn->query($consultaCargo);
if($resultCargo->num_rows > 0){
    $filaCargo = $resultCargo->fetch_array();
    $respuesta->cargo1 = $filaCargo['cargo'];
}

$consultaProceso = "SELECT proceso FROM proceso WHERE id = '".$fila['proceso']."'";
$resultProceso = $conn->query($consultaProceso);
if($resultProceso->num_rows > 0){
    $filaProceso = $resultProceso->fetch_array();
    $respuesta->proceso1 = $filaProceso['proceso'];
}

$consultaNucleo = "SELECT nucleo FROM nucleos WHERE id = '".$fila['nucleo']."'";
$resultNucleo = $conn->query($consultaNucleo);
if($resultNucleo->num_rows > 0){
    $filaNucleo = $resultNucleo->fetch_array();
    $respuesta->nucleo1 = $filaNucleo['nucleo'];
}

//consulta de tallas
$consultaTallas = "SELECT camisa,pantalon,botas,guayo FROM cliente_tallas WHERE id_empleado = '".$fila['id']."'";
$resultTallas = $conn->query($consultaTallas);
if($resultTallas->num_rows > 0){
    $filaTallas = $resultTallas->fetch_array();
    $respuesta->camisa = $filaTallas['camisa'];
    $respuesta->pantalon = $filaTallas['pantalon'];
    $respuesta->botas = $filaTallas['botas'];
    $respuesta->guayo = $filaTallas['guayo'];
}

echo json_encode($respuesta);
?>