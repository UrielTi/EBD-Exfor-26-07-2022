<?php
include ("../conn/conn.php");

$nombres = $_POST['nombres'];
$talla = $_POST['talla'];

$consulta = "SELECT id, nombre, precio, stock FROM epp WHERE nombre = '$nombres'";
$result = $conn->query($consulta);
$fila = $result->fetch_array();

$id_elemento=$fila['id'];

$consultaTalla = "SELECT id,cantidad,precio FROM elemento_tallas WHERE id_elemento='$id_elemento' AND talla='$talla'";
$resultTalla = $conn->query($consultaTalla);
$filaTalla = $resultTalla->fetch_array();

$respuesta = new stdClass();
if($result->num_rows > 0){
    $respuesta->id_talla = $filaTalla['id'];
    $respuesta->nombres = $fila['nombre'];
    $respuesta->precio = ($talla == '' || $talla == 'ESCOGE LA TALLA')? $fila['precio'] : $filaTalla['precio'];
    $respuesta->stock = ($talla == '' || $talla == 'ESCOGE LA TALLA')? $fila['stock'] : $filaTalla['cantidad'];
}
echo json_encode($respuesta);
?>