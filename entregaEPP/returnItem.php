<?php include("../include/conn/conn.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("head.php"); ?>
</head>

<body style="background-image: url('./img/background-devoluciones.webp'); background-size: 1280px 720px;">
    <?php
    if (isset(($_GET['action'])) == 'delete') {
        $id = intval($_GET['id']);

        $consultEntrega = mysqli_query($conn, "SELECT * FROM entrega_epp WHERE id='$id' AND estado='0'") or die(mysqli_error($conn));
        if (($rE = mysqli_fetch_assoc($consultEntrega)) != NULL) {
            $id = $rE['id'];
            $id_empleado = $rE['id_empleado'];
            $id_elemento = $rE['id_elemento'];
            $elemento = $rE['elemento'];
            $cantidad = $rE['cantidad'];
            $talla = $rE['talla'];
            $fecha = $rE['fecha'];

            $consultStock = mysqli_query($conn, "SELECT stock, precio FROM epp WHERE id='$id_elemento'") or die(mysqli_error($conn));
            $rS = mysqli_fetch_assoc($consultStock);
            $stock = $rS['stock'];

            $newStock = $stock + $cantidad;
            $newPrecio = $rS['precio'] + ($precio * $cantidad);
            $updateEpp = mysqli_query($conn, "UPDATE epp SET stock='$newStock', precio='$newPrecio' WHERE id='$id_elemento'") or die(mysqli_error($conn));

            $consultEtallas = mysqli_query($conn, "SELECT cantidad FROM elemento_tallas WHERE id_elemento='$id_elemento' AND talla='$talla'") or die(mysqli_error($conn));
            $rEt = mysqli_fetch_assoc($consultEtallas);
            $cant = $rEt['cantidad'];

            $newCant = $cant + $cantidad;
            $updateEtallas = mysqli_query($conn, "UPDATE elemento_tallas SET cantidad='$newCant' WHERE id_elemento='$id_elemento' AND talla='$talla'") or die(mysqli_error($conn));

            $insertReturn = mysqli_query($conn, "INSERT INTO historial_entregas_devueltas (id, id_empleado, id_elemento, elemento, cantidad, talla, fecha)VALUES('$id', '$id_empleado', '$id_elemento', '$elemento', '$cantidad', '$talla', '$fecha')") or die(mysqli_error($conn));

            $deleteItem = mysqli_query($conn, "DELETE FROM entrega_epp WHERE id='$id' AND id_empleado='$id_empleado' AND id_elemento='$id_elemento'") or die(mysqli_error($conn));
        } else {
            $consultEntrega = mysqli_query($conn, "SELECT id_empleado FROM entrega_epp WHERE id='$id'") or die(mysqli_error($conn));
            $rE = mysqli_fetch_assoc($consultEntrega);
            $id_empleado = $rE['id_empleado'];
            echo "<script>alert('Este elemento ya esta diligenciado'); window.location = 'registro.php?id=$id_empleado'</script>";
        }
    }

    ?>
    <center><a type="button" onclick="<?php echo "window.location = 'registro.php?id=$id_empleado'" ?>" class="btn btn-success">Volver</a></center>

</body>

</html>