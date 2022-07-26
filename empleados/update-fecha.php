<?php
include "../include/conn/conn.php";
if (isset($_POST['update-fecha'])) {
    $id            = intval($_POST['id']);
    $estado  = mysqli_real_escape_string($conn, (strip_tags($_POST['estado'], ENT_QUOTES)));
    $fecha_ingreso  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_ingreso'], ENT_QUOTES)));
    $fecha_salida  = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_salida'], ENT_QUOTES)));
    if ($fecha_salida == '') {
        $fecha_salida = '0101-01-01';
    }
    $update_fecha = mysqli_query($conn, "UPDATE clientes SET estado='$estado', fecha_ingreso='$fecha_ingreso', fecha_salida='$fecha_salida' WHERE id='$id'") or die(mysqli_error($conn));
    if ($update_fecha) {
        echo "<script>alert('Los datos han sido actualizados!'); window.location = 'editar_fecha_estado.php'</script>";
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'editar_fecha_estado.php'</script>";
    }
}
