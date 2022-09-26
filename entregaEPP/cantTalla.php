<?php
include("../include/conn/conn.php");

$talla = $_POST['talla'];
$id = $_POST['id'];

$cant = new stdClass();

$consultaCant = mysqli_query($conn, "SELECT cantidad FROM elemento_tallas WHERE id_elemento='$id' and talla='$talla'") or die(mysqli_error($conn));
while ($resultCant = mysqli_fetch_assoc($consultaCant)) {
    $cant->cant = $resultCant['cantidad'];
}

echo json_encode($cant);