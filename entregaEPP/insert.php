<?php
if (isset($_POST['insert'])) {
    $id_empleado = intval($_GET['id']);
    $id_elemento = mysqli_real_escape_string($conn, (strip_tags($_POST['id_elemento'], ENT_QUOTES)));
    $codigo = mysqli_real_escape_string($conn, (strip_tags($_POST['codigoElement'], ENT_QUOTES)));
    $stock = mysqli_real_escape_string($conn, (strip_tags($_POST['stockElement'], ENT_QUOTES)));
    $talla = mysqli_real_escape_string($conn, (strip_tags($_POST['tallaElement'], ENT_QUOTES)));
    $cantTalla = mysqli_real_escape_string($conn, (strip_tags($_POST['cantTalla'], ENT_QUOTES)));
    $cantidadElement = mysqli_real_escape_string($conn, (strip_tags($_POST['cantidadElement'], ENT_QUOTES)));
    $fecha = mysqli_real_escape_string($conn, (strip_tags($_POST['fechaRegistro'], ENT_QUOTES)));
    if ($fecha == '') {
        $fecha = date("Y-m-d"); // Fecha default 2012-05-30 <- Example.
    }

    $consultElemento = mysqli_query($conn, "SELECT nombre FROM epp WHERE codigo='$codigo'") or die(mysqli_error($conn));

    while ($rE = mysqli_fetch_assoc($consultElemento)) {
        if ($cantidadElement <= $cantTalla) {
            $newStock = $stock - $cantidadElement;
            $newCantTalla = $cantTalla - $cantidadElement;
            $elemento = $rE['nombre'];


            $insertEntrega = mysqli_query($conn, "INSERT INTO entrega_epp(id, id_empleado, id_elemento, elemento, cantidad, talla, fecha)VALUES(NULL, '$id_empleado', '$id_elemento', '$elemento', '$cantidadElement', '$talla', '$fecha')") or die(mysqli_error($conn));
            if ($insertEntrega) {
                $updateStock = mysqli_query($conn, "UPDATE epp SET stock='$newStock' WHERE codigo='$codigo'") or die(mysqli_error($conn));
                $updateCantTalla = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$newCantTalla' WHERE id_elemento='$id_elemento' and talla='$talla'") or die(mysqli_error($conn));    
                echo '<div class="alert alert-success alert-dismissable"><center>&nbsp; Se ha registrado correctamente una entrega &nbsp;<button type="button" class="btn btn-outline-success" data-dismiss="alert" aria-hidden="true">Cerrar Ventana &times;</button></center></div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissable">&nbsp; Datos ingresados incorrectos &nbsp;<button type="button" class="btn btn-outline-success" data-dismiss="alert" aria-hidden="true">Volver Intentar &times;</button></div>';
        }
    }
}
