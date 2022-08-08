<?php
if (isset($_POST['input'])) {
    $nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
    $cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
    $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
    $proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
    $cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
    $cantidad = intval($_POST['cantidad']);
    $elemento = mysqli_real_escape_string($conn, (strip_tags($_POST['elemento'], ENT_QUOTES)));
    $precio = mysqli_real_escape_string($conn, (strip_tags($_POST['total'], ENT_QUOTES)));
    //$fecha = date("Y/m/d");
    $fecha = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha'], ENT_QUOTES)));

    //TALLAS
    $talla = mysqli_real_escape_string($conn, (strip_tags($_POST['talla'], ENT_QUOTES)));

    $consulta = mysqli_query($conn, "SELECT * FROM epp WHERE nombre='$elemento'");
    $result = mysqli_fetch_assoc($consulta);
    $substract = $result['stock'] - $cantidad;
    $id_elemento = $result['id'];

    $consultaTalla = mysqli_query($conn, "SELECT cantidad FROM elemento_tallas WHERE id_elemento='$id_elemento' AND talla='$talla'");
    $resultTalla = mysqli_fetch_assoc($consultaTalla);
    $substractTalla = $resultTalla['cantidad'] - $cantidad;

    if ($result['stock'] < $cantidad) {
        echo "<script>alert('La cantidad solicitada es mayor a la cantidad del producto.'); window.location = 'registro.php'</script>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO entrega_epp(id, nombre, cedula, nucleo, proceso, cargo, cantidad, elemento, talla, precio, fecha)
								VALUES(NULL,'$nombre', '$cedula', '$nucleo', '$proceso', '$cargo', '$cantidad', 
                                '$elemento', '$talla', '$precio','$fecha')") or die(mysqli_error($conn));
        if ($insert) {
            $updateTalla = mysqli_query($conn, "UPDATE elemento_tallas SET 
                                cantidad='$substractTalla' WHERE id_elemento='$id_elemento' AND talla='$talla'");
            $update = mysqli_query($conn, "UPDATE epp SET stock='$substract' WHERE nombre='$elemento'") or die(mysqli_error($conn));
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close"
                                 data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados 
                                 correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button 
                                    type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo 
                                    registrar los datos.</div>';
        }
    }
}
