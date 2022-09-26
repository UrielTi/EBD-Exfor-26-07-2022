<?php
include("../include/conn/conn.php");

$codigo = $_POST['codigo'];

$element = new stdClass();

$consultaElement = mysqli_query($conn, "SELECT id, stock FROM epp WHERE codigo = '$codigo'") or die(mysqli_error($conn));

while ($resultElement = mysqli_fetch_assoc($consultaElement)) {
    $id_elemento = $resultElement['id'];
    $element->id = $id_elemento;
    $element->stock = $resultElement['stock'];

    $consultaTalla = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento'") or die(mysqli_error($conn));

    $count = mysqli_num_rows($consultaTalla);
    $element->count = $count;
    

    $consultTallaU = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='U'") or die(mysqli_error($conn));
    while ($rTU = mysqli_fetch_assoc($consultTallaU)) {
        $element->TU = $rTU['talla'];
    }

    $consultTallaS = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='S'") or die(mysqli_error($conn));
    while ($rTS = mysqli_fetch_assoc($consultTallaS)) {
        $element->TS = $rTS['talla'];
    }

    $consultTallaM = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='M'") or die(mysqli_error($conn));
    while ($rTM = mysqli_fetch_assoc($consultTallaM)) {
        $element->TM = $rTM['talla'];
    }

    $consultTallaL = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='L'") or die(mysqli_error($conn));
    while ($rTL = mysqli_fetch_assoc($consultTallaL)) {
        $element->TL = $rTL['talla'];
    }

    $consultTallaXL = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='XL'") or die(mysqli_error($conn));
    while ($rTXL = mysqli_fetch_assoc($consultTallaXL)) {
        $element->TXL = $rTXL['talla'];
    }

    $consultTallaXXL = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='XXL'") or die(mysqli_error($conn));
    while ($rTXXL = mysqli_fetch_assoc($consultTallaXXL)) {
        $element->TXXL = $rTXXL['talla'];
    }

    $consultTalla28 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='28'") or die(mysqli_error($conn));
    while ($rT28 = mysqli_fetch_assoc($consultTalla28)) {
        $element->T28 = $rT28['talla'];
    }

    $consultTalla29 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='29'") or die(mysqli_error($conn));
    while ($rT29 = mysqli_fetch_assoc($consultTalla29)) {
        $element->T29 = $rT29['talla'];
    }

    $consultTalla30 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='30'") or die(mysqli_error($conn));
    while ($rT30 = mysqli_fetch_assoc($consultTalla30)) {
        $element->T30 = $rT30['talla'];
    }

    $consultTalla31 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='31'") or die(mysqli_error($conn));
    while ($rT31 = mysqli_fetch_assoc($consultTalla31)) {
        $element->T31 = $rT31['talla'];
    }

    $consultTalla32 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='32'") or die(mysqli_error($conn));
    while ($rT32 = mysqli_fetch_assoc($consultTalla32)) {
        $element->T32 = $rT32['talla'];
    }

    $consultTalla33 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='33'") or die(mysqli_error($conn));
    while ($rT33 = mysqli_fetch_assoc($consultTalla33)) {
        $element->T33 = $rT33['talla'];
    }

    $consultTalla34 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='34'") or die(mysqli_error($conn));
    while ($rT34 = mysqli_fetch_assoc($consultTalla34)) {
        $element->T34 = $rT34['talla'];
    }

    $consultTalla35 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='35'") or die(mysqli_error($conn));
    while ($rT35 = mysqli_fetch_assoc($consultTalla35)) {
        $element->T35 = $rT35['talla'];
    }

    $consultTalla36 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='36'") or die(mysqli_error($conn));
    while ($rT36 = mysqli_fetch_assoc($consultTalla36)) {
        $element->T36 = $rT36['talla'];
    }

    $consultTalla37 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='37'") or die(mysqli_error($conn));
    while ($rT37 = mysqli_fetch_assoc($consultTalla37)) {
        $element->T37 = $rT37['talla'];
    }

    $consultTalla38 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='38'") or die(mysqli_error($conn));
    while ($rT38 = mysqli_fetch_assoc($consultTalla38)) {
        $element->T38 = $rT38['talla'];
    }

    $consultTalla39 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='39'") or die(mysqli_error($conn));
    while ($rT39 = mysqli_fetch_assoc($consultTalla39)) {
        $element->T39 = $rT39['talla'];
    }

    $consultTalla40 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='40'") or die(mysqli_error($conn));
    while ($rT40 = mysqli_fetch_assoc($consultTalla40)) {
        $element->T40 = $rT40['talla'];
    }

    $consultTalla41 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='41'") or die(mysqli_error($conn));
    while ($rT41 = mysqli_fetch_assoc($consultTalla41)) {
        $element->T41 = $rT41['talla'];
    }

    $consultTalla42 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='42'") or die(mysqli_error($conn));
    while ($rT42 = mysqli_fetch_assoc($consultTalla42)) {
        $element->T42 = $rT42['talla'];
    }

    $consultTalla43 = mysqli_query($conn, "SELECT talla FROM elemento_tallas WHERE id_elemento='$id_elemento' and talla='43'") or die(mysqli_error($conn));
    while ($rT43 = mysqli_fetch_assoc($consultTalla43)) {
        $element->T43 = $rT43['talla'];
    }
}

echo json_encode($element);