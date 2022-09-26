<?php
if (isset($_GET['action']) == 'delete') {
    $id = intval($_GET['id']);

    $consultEntrega = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE id='$id'") or die(mysqli_error($conn));
    $rE = mysqli_fetch_assoc($consultEntrega);

    $id = $rE['id'];
    $id_empleado = $rE['id_empleado'];
    $id_elemento = $rE['id_elemento'];
    $elemento = $rE['elemento'];
    $cantidad = $rE['cantidad'];
    $talla = $rE['talla'];
    $fecha = $rE['fecha'];

    $consultStock = mysqli_query($conn, "SELECT stock FROM epp WHERE id='$id_elemento'") or die(mysqli_error($conn));
    $rS = mysqli_fetch_assoc($consultStock);
    $stock = $rS['stock'];

    $newStock = $stock + $cantidad;
    $updateEpp = mysqli_query($conn, "UPDATE epp SET stock='$newStock' WHERE id='$id_elemento'") or die(mysqli_error($conn));

    $consultEtallas = mysqli_query($conn, "SELECT cantidad FROM elemento_tallas WHERE id_elemento='$id_elemento' AND talla='$talla'") or die(mysqli_error($conn));
    $rEt = mysqli_fetch_assoc($consultEtallas);
    $cant = $rEt['cantidad'];

    $newCant = $cant + $cantidad;
    $updateEtallas = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$newCant' WHERE id_elemento='$id_elemento' AND talla='$talla'") or die(mysqli_error($conn));

    $insertReturn = mysqli_query($conn, "INSERT INTO historial_entregas_devueltas (id, id_empleado, id_elemento, elemento, cantidad, talla, fecha)VALUES('$id', '$id_empleado', '$id_elemento', '$elemento', '$cantidad', '$talla', '$fecha')") or die(mysqli_error($conn));

    $deleteItem = mysqli_query($conn, "DELETE FROM entrega_epp WHERE id='$id' AND id_empleado='$id_empleado' AND id_elemento='$id_elemento'") or die(mysqli_error($conn));

    if ($deleteItem) {
        echo "<script>alert('Se han actualizado los registros, asegurate de devolver el elemento, Muchas Gracias.'); window.location = 'registro.php?id=$id_empleado'</script>";
    }
}
