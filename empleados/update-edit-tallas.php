<?php
include "../include/conn/conn.php";
if (isset($_POST['update'])) {
    $id    = intval($_POST['id']);
    $nombres = mysqli_real_escape_string($conn, (strip_tags($_POST['nombres'], ENT_QUOTES)));
    $cedula = mysqli_real_escape_string($conn, (strip_tags($_POST['cedula'], ENT_QUOTES)));
    $cargo = mysqli_real_escape_string($conn, (strip_tags($_POST['cargo'], ENT_QUOTES)));
    $nucleo = mysqli_real_escape_string($conn, (strip_tags($_POST['nucleo'], ENT_QUOTES)));
    $proceso = mysqli_real_escape_string($conn, (strip_tags($_POST['proceso'], ENT_QUOTES)));
    $camisa = mysqli_real_escape_string($conn, (strip_tags($_POST['camisa'], ENT_QUOTES)));
    $pantalon = mysqli_real_escape_string($conn, (strip_tags($_POST['pantalon'], ENT_QUOTES)));
    $botas = mysqli_real_escape_string($conn, (strip_tags($_POST['botas'], ENT_QUOTES)));
    $guayo = mysqli_real_escape_string($conn, (strip_tags($_POST['guayo'], ENT_QUOTES)));

    $update = mysqli_query($conn, "UPDATE cliente_tallas SET nombres='$nombres', cedula='$cedula', cargo='$cargo', nucleo='$nucleo', proceso='$proceso', camisa='$camisa', pantalon='$pantalon', botas='$botas', guayo='$guayo' WHERE id='$id'") or die(mysqli_error($conn));
    if ($update) {
        echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
    }
}
