<?php
include("../include/conn/conn.php");

$codigo = $_POST['codigo'];

$element = new stdClass();

$consultaElement = mysqli_query($conn, "SELECT id, stock FROM epp WHERE codigo = '$codigo'") or die(mysqli_error($conn));

if ($resultElement = mysqli_fetch_assoc($consultaElement)) {
    $id_elemento = $resultElement['id'];
    $element->stock = $resultElement['stock'];

    $consultaTalla = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento'") or die(mysqli_error($conn));
    if ($resultTalla = mysqli_fetch_assoc($consultaTalla)) {
        $element->talla = $resultTalla['talla'];
    } else {
        $element->talla = 'Error';
    }
} else {
    $element->stock = 'Error';
}

echo json_encode($element);